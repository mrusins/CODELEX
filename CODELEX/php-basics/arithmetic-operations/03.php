<?php

//Write a program to produce the sum of 1, 2, 3, ..., to 100. Store 1 and 100 in variables lower bound and upper bound,
// so that we can change their values easily.
// Also compute and display the average.

$number1 = readline('Enter first integer:');
if (is_numeric($number1) != true) {
    die("Enter only numbers!".PHP_EOL);
}
$number2 = readline('Enter second integer:');
if (is_numeric($number2) != true) {
    die("Enter only numbers!".PHP_EOL);
}

function calculateSum(int $num1, int $num2): int
{
    $totalSum = 0;
    for ($i = $num1; $i <= $num2; $i++) {
        $totalSum = $totalSum + $i;

    }
    return $totalSum;
}

echo calculateSum($number1, $number2) . PHP_EOL;




function calcAverage(int $num1, int $num2):int
{
    $totalSum = 0;
    for ($i = $num1; $i <= $num2; $i++) {
        $totalSum = $totalSum + $i;
    }
    $count = $totalSum /($num2 - $num1);
    $formatted = sprintf("%0.2f", $count);
   return $formatted;

}
echo calcAverage($number1, $number2) . PHP_EOL;