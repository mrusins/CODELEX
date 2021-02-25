<?php

class Product
{
    private string $name;
    private int $price;
    private int $amount;

    function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    function printProduct(): string
    {
        return $this->name . ', ' . $this->price . ', ' . $this->amount . PHP_EOL;
    }

    function set_price(string $newName): void
    {
        $this->price = $newName;
    }
    function set_amount(string $newAmount): void
    {
        $this->amount = $newAmount;
    }
}

$tv = new Product('Philips TV', 505.63, 12);
$phone = new Product('iPhone 5s', 999.99, 14);
$printer = new Product('Epson-EB-o4', 440.65, 2);


$printer->set_price(100.22);
$printer->set_amount(22);

echo $tv->printProduct();
echo $phone->printProduct();
echo $printer->printProduct();