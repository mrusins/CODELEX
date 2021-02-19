<?php

$x = 10;
$y = '10';
$str = 'hello';
$y = 1;
$z = 100;
$plateNumber = 'LO2235';
$number = "15";

//exercise 1
if ($x == $y) {
    echo "number is the same \n";
};
if ($x === $y) {
    echo ":) \n";
} else {
    echo "type not the same \n";
};

//exercise 2

if ($x >= 1 && $x <= 100) {
    echo "yes, $x is between 1 and 100 \n";
};

//exercise 3

if ($str == 'hello') {
    echo "world \n";
};

//exercise 4

if ($x > 0 && $x < 100 && 100 / $x == 10) {
    echo "yes, number is 10 \n";
};

//exercise 5

if ($x > $y && $x < $z) {
    echo "correct \n";
}

//exercise 6

switch ($plateNumber) {
    case "LO2235":
        echo "Bingo, you must to change oil in gearbox only for 400 EUR \n";
        break;
    default:
        echo "Keep to save money! :) \n";
}

//exercise 7

switch ($number) {
    case $number <= 50:
        echo "low \n";
        break;
    case $number > 50 && $number < 100:
        echo "medium \n";
        break;
    case $number >= 100:
        echo "high \n";
        break;
    default:
        echo "You forgot to enter your number";
}