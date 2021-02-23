<?php

class Product
{
    public $name;
    public $price;
    public $amount;

    function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    function printProduct()
    {
        return $this->name . ', ' . $this->price . ', ' . $this->amount . PHP_EOL;
    }

    function set_price($newName)
    {
        $this->price = $newName;
    }
}

$tv = new Product('Philips TV', 505.63, 12);
$phone = new Product('iPhone 5s', 999.99, 14);
$printer = new Product('Epson-EB-o4', 440.65, 2);


$printer->set_price(100.22);

echo $tv->printProduct();
echo $phone->printProduct();
echo $printer->printProduct();