<?php

namespace App;

class Car
{
    public int $id;
    public string $model;
    public int $odometer;
    public string $fuel;
    public int $price;
    public string $status;

    public function __construct(int $id, string $model, int $odometer, string $fuel, int $price, string $status)
    {
        $this->id = $id;
        $this->model = $model;
        $this->odometer = $odometer;
        $this->fuel = $fuel;
        $this->price = $price;
        $this->status = $status;

    }

}