<?php

//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

$number1 = readline('Enter first integer:');
if (is_numeric($number1) != true) {
    die("Enter only numbers!" . PHP_EOL);
}
$number2 = readline('Enter second integer:');
if (is_numeric($number2) != true) {
    die("Enter only numbers!" . PHP_EOL);
}

if ($number1 == 15 || $number2 == 15 || $number1 - $number2 == 15 || $number2 - $number1 == 15 || $number1 + $number2 == 15) {
    echo "true" . PHP_EOL;
}

