<?php

class WarehouseAbnormal implements WarehouseInterface
{
    public array $allWarehouseItems = [];

    public function setFromWarehouse(array $item): void
    {
        $name = $item[0];
        $amount = (int)preg_replace('/\D/', '', $item[2]);
        $price = (float)filter_var($item[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) * 100;

        if (gettype($name) == 'string' && gettype($amount) == 'integer' && gettype($price) == 'double' && $amount > 0 && $price > 0) {
            array_push($this->allWarehouseItems, new Flower($name, $amount, $price));
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
