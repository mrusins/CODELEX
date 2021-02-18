<?php

$list = [
    [
        'name' => 'tanks',
        'price' => 100
    ],
    [
        'name' => 'niere',
        'price' => 200
    ],
    [
        'name' => 'sinepes',
        'price' => 5
    ],
    [
        'name' => 'sveiciens',
        'price' => 0.5
    ],
    [
        'name' => 'alus',
        'price' => 1
    ],
    [
        'name' => 'muca',
        'price' => 65
    ],
];
function getProductName(array $list): void
{
    for ($i = 0; $i < count($list); $i++) {
        echo $list[$i]['name'] . ":" . $i . PHP_EOL;
    }
}

PHP_EOL;
$productNr = readline(getProductName($list) . PHP_EOL . "Enter a product Nr: ");
if ($productNr >= count($list)) {
    die("Wrong ID, try again" . PHP_EOL);
}
$quantity = readline('Enter a quantity: ');
if (is_numeric($quantity) != true) {
    die("Enter only numbers!" . PHP_EOL);
}


function countInBasket(array $list, int $productNr, int $quantity): string
{
    return 'In your cart is ' . $quantity . ' of ' . $list[$productNr]['name'] . ' with total sum ' . $list[$productNr]['price'] * $quantity . "EUR" . PHP_EOL;
}

echo countInBasket($list, $productNr, $quantity);