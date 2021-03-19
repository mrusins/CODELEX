<?php

namespace App;


class AddService
{
    private array $all;

    public function __construct()
    {
        $allCars = new CarCollection();
        $allCars->setCars();
        $this->all = $allCars->getCars();

    }

    public function add($post)
    {
        if (isset($post['model'])) {
            $allCars = new CarCollection();
            $allCars->setCars();
            $id = $this->findLargestId() + 1;
            array_push($this->all, new Car($id, $post['model'], $post['odometer'], $post['fuel'], $post['price'], $post['status'],));
            $newJsonString = json_encode($this->all);
            file_put_contents('app/garage/garage.json', $newJsonString);
        }

    }

    public function printAllCarsToDelete(): array
    {

        return $this->all;
    }

    private function findLargestId(): int
    {
        $largest = 0;
        foreach ($this->all as $item => $value) {
            if ($value->id > $largest) {
                $largest = $value->id;
            }
        }
        return $largest;
    }

}