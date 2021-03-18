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
            array_push($this->all, new Car($post['id'], $post['model'], $post['odometer'], $post['fuel'], $post['price'], $post['status'],));
            $newJsonString = json_encode($this->all);
            file_put_contents('app/garage/garage.json', $newJsonString);
        }

    }
}