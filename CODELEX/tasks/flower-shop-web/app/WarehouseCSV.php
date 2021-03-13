<?php
namespace App;


class WarehouseCSV implements WarehouseInterface
{
    public array $allWarehouseItems = [];

    public function setFromWarehouse($CSVFile)
    {
        $the_big_array = [];

        if (($h = fopen("{$CSVFile}", "r")) !== FALSE)
        {
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
            {
                $the_big_array[] = $data;
            }
            fclose($h);
        }

        foreach ($the_big_array as $flower=>$value){

            array_push($this->allWarehouseItems, new Flower($value[0],$value[1],$value[2]));
        }
    return $this->allWarehouseItems;
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