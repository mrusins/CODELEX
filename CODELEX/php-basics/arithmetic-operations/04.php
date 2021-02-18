<?php

//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
// Take note that it is the same as factorial of N.

$number1 = readline('Enter 1:');
if (is_numeric($number1) != true) {
    die("Enter only numbers!" . PHP_EOL);
}
$number2 = readline('Enter 10:');
if (is_numeric($number2) != true) {
    die("Enter only numbers!" . PHP_EOL);
}

function calculateSum(int $num1, int $num2): int
{
    $totalSum = $num1;
    for ($i = $num1; $i < $num2; $i++) {
        $totalSum = $totalSum * ($i + 1);

    }
    return $totalSum;
}

echo calculateSum($number1, $number2) . PHP_EOL;