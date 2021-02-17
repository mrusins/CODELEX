<?php
echo "Exercise 1 \n";

//Create a function that accepts any string and returns the same value with added "codelex"
// by the end of it. Print this value out.

function addCodelex(string $str):string
{
    return $str . " CODELEX \n";
}

echo addCodelex('I am learning to code in');

echo "Exercise 2 \n";

//Create a function that accepts 2 integer arguments.
// First argument is a base value and the second one is a value its been multiplied by.
// For example, given argument 10 and 5 prints out 50

function multiple(int $x,int $y):string
{
    return $x * $y . "\n";
}

echo multiple(5, 10);

echo "Exercise 3 \n";

//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.
$personToCheck = new stdClass();
$personToCheck->name = 'Greta';
$personToCheck->surname = 'Thunberg';
$personToCheck->age = 17;
function checkIfOld(int $x,string $y,string $z):string
{
    if ($x >= 18) {
        return $y . ' ' . $z . ", grab few beers, girl \n";
    }
    return $y . ' ' . $z . ", go back and save planet Earth \n";
}

checkIfOld($personToCheck->age, $personToCheck->name, $personToCheck->surname);

echo "Exercise 4 \n";

//Create a array of objects that uses the function of exercise 3
// but in loop printing out if the person has reached age of 18.

$persons = [
    $person1 = new stdClass(),
    $person2 = new stdClass(),
];

$person1->name = 'Greta';
$person1->surname = 'Thunberg';
$person1->age = 17;

$person2->name = 'David';
$person2->surname = 'Hasselhoff';
$person2->age = 100;

function checkAge(array $per): string
{
    for ($x = 0; $x < count($per); $x++) {
        if ($per[$x]->age >= 18) {
            return $per[$x]->name . ", grab your beer \n";
        }
    }
}

echo checkAge($persons);

echo "Exercise 5 \n";

//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight.
// Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
// Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$itemsInBasket = [
    [
        'name' => 'bananas',
        'weight' => 5
    ],
    [
        'name' => 'apples',
        'weight' => 10
    ]
];
$shippingCosts = [
    'lowWeight' => 1,
    'highWeight' => 2
];
foreach ($itemsInBasket as $x) {
    if ($x['weight'] <= 9) {
        echo $x['name'] . ' shipping costs will be ' . $shippingCosts['lowWeight'] . "EUR\n";
    } else {
        echo $x['name'] . ' shipping costs will be ' . $shippingCosts['highWeight'] . "EUR\n";
    }
}

echo "Exercise 6 \n";

//Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
// Create a for loop that iterates non-associative array using php in-built
//function that determines count of elements in the array. Create a function that doubles the integer number.
// Within the loop using php in-built function print out the double of the number value (using your custom function).

$arrForExe6 = [2, 3, 4, 5.6, 'hello'];


function double($elements)
{
    for ($x = 0; $x < count($elements); $x++) {
        if (is_integer($elements[$x])) {
            echo 'integer from array in double = ' . $elements[$x] * 2 . "\n";
        }
    }
    for ($x = 0; $x < count($elements); $x++) {
        if (is_numeric($elements[$x])) {
            echo 'number from array in double = ' . $elements[$x] * 2 . "\n";
        }
    }

}

double($arrForExe6);
