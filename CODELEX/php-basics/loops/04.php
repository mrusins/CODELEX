<?php
$arrayAllNumbers = [];
$number = readline('Enter your number to get Fizz or Buzz: ');

for ($i = 1; $i <= $number; $i++) {
    array_push($arrayAllNumbers, $i);
}

for ($i = 1; $i <= count($arrayAllNumbers) - 1; $i++) {
    if ($arrayAllNumbers[$i] % 20 == 0) {
        echo PHP_EOL;
    } elseif ($arrayAllNumbers[$i] % 3 == 0 && $arrayAllNumbers[$i] % 5 == 0) {
        echo 'FizzBuzz ';
    } elseif ($arrayAllNumbers[$i] % 3 == 0) {
        echo 'Fizz ';
    } elseif ($arrayAllNumbers[$i] % 5 == 0) {
        echo 'Buzz ';
    } else {
        echo "$arrayAllNumbers[$i] ";
    }
}

