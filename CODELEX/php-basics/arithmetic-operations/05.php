<?php


$number = readline('I am thinking of a number between 1-100.  Try to guess it.:');
if (is_numeric($number) != true) {
    die("Enter only numbers!" . PHP_EOL);
}
$min = 0;
$max = 100;
$randomNumber = rand($min, $max);

function guessRandom(int $number, int $random): string
{
    if ($number < $random) {
        return "too low";
    } else if ($number > $random) {
        return "too high";
    } else if ($number == $random) {
        return "Bingo";
    }
}

echo "random number is $randomNumber " . PHP_EOL;
echo guessRandom($number, $randomNumber) . PHP_EOL;
