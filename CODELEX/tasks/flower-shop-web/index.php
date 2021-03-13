<html>
<body>
<h1>Flowers</h1>

<?php

require_once 'vendor/autoload.php';

use App\FromAllWarehouses;
use App\WarehouseAbnormal;
use App\WarehouseNormal;
use App\WarehouseJSON;
use App\WarehouseCSV;
use App\WarehouseInterface;

$flowersInStock = ['', 'red JSON', 'JSON', 'tulips', 'CSVFlower3', 'chamomile', 'CSVFlower2', 'roses', 'flowerX', 'flowerZ', 'flowerS', 'flowerY'];

$nr5 = new WarehouseJSON();
$nr5->setFromWarehouse("app/storage/flowers.json");

$nr6 = new WarehouseCSV();
$nr6->setFromWarehouse("app/storage/flowers2.csv");

$nr1 = new WarehouseNormal();
$nr1->setFromWarehouse(new \App\Flower('roses', 100, 100));
$nr1->setFromWarehouse(new \App\Flower('tulips', 50, 60));

$nr4 = new WarehouseAbnormal();
$nr4->setFromWarehouse(['flowerX', 'price 1.2', '120pcs']);
$nr4->setFromWarehouse(['flowerY', 'dirty Sanchess', '33pcs']);
$nr4->setFromWarehouse(['flowerZ', null, '86pcs']);
$nr4->setFromWarehouse(['flowerS', 'null2.2', '13']);

$allItems = new FromAllWarehouses();
$allItems->setToTotal(array_merge($nr1->getFromWarehouse($flowersInStock), $nr4->getFromWarehouse($flowersInStock),
    $nr5->getFromWarehouse($flowersInStock), $nr6->getFromWarehouse($flowersInStock)));
echo "<br>
<table>
  <tr>
    <th>Name</th>
    <th>Amount</th>
    <th>Price</th>
  </tr>";

foreach ($allItems->getFromTotal() as $item => $flower) {
    $finalPrice = $flower->price * 1.8 / 100;
    $finalPriceDiscount = round($finalPrice - ($finalPrice / 100 * 20), 2);
    echo "
              <tr>
    <td>$flower->name</td>
    <td>$flower->amount</td>
    <td>$finalPriceDiscount</td>
    </tr>
            ";
}
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
</body>
</html>





