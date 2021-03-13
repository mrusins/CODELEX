<?php

namespace App;

class WarehouseNormal implements WarehouseInterface
{
    public array $allWarehouseItems;

    public function setFromWarehouse(Flower $item): void
    {
        $this->allWarehouseItems[] = $item;
    }

    public function getFromWarehouse(array $stock): array
    {
        $tempArray = [];
        foreach ($this->allWarehouseItems as $item) {

            if (array_search($item->name, $stock)) {
                array_push($tempArray, $item);

            }
        }
        return $tempArray;
    }
}