<?php

class Product
{

    public array $ingredient;

    function __construct(array $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function getProducts(): array
    {
        return $this->ingredient;
    }

    public function addProduct(string $newProduct): void
    {
        array_push($this->ingredient, $newProduct);
    }
}