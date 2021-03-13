<?php

namespace App;

class WarehouseJSON implements WarehouseInterface
{
    public array $allWarehouseItems = [];

    public function setFromWarehouse($jsonFile): void
    {
        $string = file_get_contents($jsonFile);
        $json = json_decode($string);

        foreach ($json as $flower => $value) {
            foreach ($value as $a) {
                array_push($this->allWarehouseItems, new Flower($a->name, $a->amount, $a->price));
            }
        }

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
