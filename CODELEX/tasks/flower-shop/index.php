<?php
require_once 'Flower.php';
require_once 'FromAllWarehouses.php';
require_once 'WarehouseInterface.php';
require_once 'WarehouseNormal.php';
require_once 'WarehouseAbnormal.php';
require_once 'Basket.php';
$flowersInStock = ['', 'lilies', 'dahlia', 'tulips', 'gladioli', 'chamomile', 'orchids', 'roses', 'flowerX', 'flowerZ', 'flowerS', 'flowerY'];

$nr1 = new WarehouseNormal();
$nr1->setFromWarehouse(new Flower('roses', 100, 100));
$nr1->setFromWarehouse(new Flower('tulips', 50, 60));

$nr2 = new WarehouseNormal();
$nr2->setFromWarehouse(new Flower('orchids', 40, 500));
$nr2->setFromWarehouse(new Flower('lilies', 80, 200));

$nr3 = new WarehouseNormal();
$nr3->setFromWarehouse(new Flower('dahlia', 50, 150));
$nr3->setFromWarehouse(new Flower('gladioli', 60, 180));
$nr3->setFromWarehouse(new Flower('chamomile', 120, 20));

$nr4 = new WarehouseAbnormal();
$nr4->setFromWarehouse(['flowerX', 'price 1.2', '120pcs']);
$nr4->setFromWarehouse(['flowerY', 'dirty Sanchess', '33pcs']);
$nr4->setFromWarehouse(['flowerZ', null, '86pcs']);
$nr4->setFromWarehouse(['flowerS', 'null2.2', '13']);

$allItems = new FromAllWarehouses();
$allItems->setToTotal(array_merge($nr1->getFromWarehouse($flowersInStock), $nr2->getFromWarehouse($flowersInStock),
    $nr3->getFromWarehouse($flowersInStock), $nr4->getFromWarehouse($flowersInStock)));
echo "Choose 1 if you are a woman\n";
echo "Choose 2 if you are a man\n";
do {
    $command = readline();
    $index = 1;
    switch ($command) {
        case 0:
            echo "Bye!" . PHP_EOL;
            die;
        case 1:
            foreach ($allItems->getFromTotal() as $item => $flower) {
                $finalPrice = $flower->price * 1.8 / 100;
                $finalPriceDiscount = round($finalPrice - ($finalPrice / 100 * 20), 2);
                echo '[' . $index . ']' . '- ' . $flower->name . ' ' . $flower->amount . ' pcs total. Price with 20% discount: EUR ' . $finalPriceDiscount . PHP_EOL;
                $index++;
            }
            echo PHP_EOL;
            break;
        case 2:
            foreach ($allItems->getFromTotal() as $item => $flower) {
                echo '[' . $index . ']' . '- ' . $flower->name . ' ' . $flower->amount . ' pcs total. Price: EUR ' . round($flower->price * 1.8 / 100, 2) . PHP_EOL;
                $index++;
            }
            echo PHP_EOL;
            break;
        default:
            echo "Sorry, I don't understand you..";
    }
} while ($command != 'x');





