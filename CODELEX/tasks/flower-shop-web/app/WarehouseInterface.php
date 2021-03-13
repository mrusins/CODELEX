<?php
namespace App;

interface WarehouseInterface
{
    public function getFromWarehouse(array $stock): array;
}