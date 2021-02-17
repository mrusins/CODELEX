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
function getProductName(array $list):void{
    for($i = 0; $i<count($list);$i++){
        echo $list[$i]['name'].":".$i."\n";
    }
}
echo "\n\n";
$productNr = readline(getProductName($list). "\nEnter a product Nr: ");
if ($productNr >= count($list)) {
    die("Wrong ID, try again \n");
}
$quantity = readline('Enter a quantity: ');


function countInBasket(array $list, int $productNr, int $quantity): string
{
    return 'In your cart is ' . $quantity . ' of ' . $list[$productNr]['name'] . ' with total sum ' . $list[$productNr]['price'] * $quantity . "EUR\n";
}

echo countInBasket($list, $productNr, $quantity);