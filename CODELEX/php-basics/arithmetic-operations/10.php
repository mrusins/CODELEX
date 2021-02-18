<?php


$choice = readline("\nGeometry calculator: \n
Calculate the Area of a Circle: 1
Calculate the Area of a Rectangle: 2
Calculate the Area of a Triangle: 3
Quit: 4
Enter your choice (1-4):");
if (is_numeric($choice) != true) {
    die("Enter only numbers!" . PHP_EOL);
}
switch ($choice) {
    case "1":
        echo cirkle();
        break;
    case "2":
        echo rectangle();
        break;
    case "3":
        echo triangle();
        break;
    case "4":
        die ("Bye!" . PHP_EOL);
}

function cirkle(): string
{
    $radius = readline('Enter radius:');
    return pi() * $radius ** 2 . PHP_EOL;
}

function rectangle(): string
{
    $a = readline('Enter A:');
    $b = readline('Enter B:');
    return $a * $b . PHP_EOL;
}

function triangle(): string
{
    $b = readline('Enter B:');
    $h = readline('Enter H:');
    return ($b * $h) / 2 . PHP_EOL;
}






