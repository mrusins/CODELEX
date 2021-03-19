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
        if (count($post) > 1) {
            $allCars = new CarCollection();
            $allCars->setCars();
            $id = count($allCars->getCars()) + 1;
            array_push($this->all, new Car($id, $post['model'], $post['odometer'], $post['fuel'], $post['price'], $post['status'],));
            $newJsonString = json_encode($this->all);
            file_put_contents('app/garage/garage.json', $newJsonString);
        }

    }

    public function allCars(): array
    {

        return $this->all;
    }

    public function deleteCar(array $post)
    {
        $i = 1;
        if (key($post) == 'delete') {
            foreach ($this->all as $item => $value) {
                if ($post['delete'] == $i) {
                    unset($this->all[$i - 1]);
                    $newJsonString = json_encode($this->all);
                    file_put_contents('app/garage/garage.json', $newJsonString);
                }
                $i++;
            }
        }
    }
}