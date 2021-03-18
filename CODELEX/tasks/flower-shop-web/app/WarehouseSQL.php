<?php

namespace App;


class WarehouseSQL implements WarehouseInterface
{
    public array $allWarehouseItems = [];


    public function setFromWarehouse(): void
    {
        $conn = mysqli_connect('localhost', 'maris', 'maris12345', 'WarehouseSQL');
        if (!$conn) {
            echo "Error DB connect: " . mysqli_connect_error();
        }
        $sql = 'SELECT name, amount, price FROM flowers';
        $result = mysqli_query($conn, $sql);
        $flowers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($flowers as $flower => ['name' => $name, 'amount' => $amount, 'price' => $price]) {
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