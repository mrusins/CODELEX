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



require_once 'view.php';
?>







