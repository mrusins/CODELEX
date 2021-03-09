<?php

class Flower
{
    public string $name;
    public ?int $amount;
    public ?int $price;
    public ?string $warehouseName;

    public function __construct(string $name, ?int $amount = null, ?int $price = null, ?string $warehouseName = null)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->price = $price;
        $this->warehouseName = $warehouseName;
    }
}