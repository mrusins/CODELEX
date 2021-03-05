<?php

class ProductCollection
{

    public array $products = [];

    public function getProducts(): array
    {
        return $this->products;
    }

    public function addProduct(Product $newProduct): void
    {
        array_push($this->products, $newProduct);
    }
}