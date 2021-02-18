<?php

//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise.
// The program shall always print “bye!” before exiting.

$number1 = readline('Enter number:');
if (is_numeric($number1) != true) {
    die("Enter only numbers!" . PHP_EOL);
}


if ($number1 % 2 == 0) {
    echo "Even number" . PHP_EOL;
} else {
    echo "Odd number" . PHP_EOL;
};
exit("Bye!" . PHP_EOL);

