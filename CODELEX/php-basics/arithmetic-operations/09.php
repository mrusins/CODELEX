<?php


$weight = readline('Enter your weight in kg:');
if (is_numeric($weight) != true) {
    die("Enter only numbers!" . PHP_EOL);
}
$height = readline('Enter your height in cm:');
if (is_numeric($height) != true) {
    die("Enter only numbers!" . PHP_EOL);
}

$toPounds = $weight * 2.2;
$toInches = $height * 0.3937;

$BMI = ($toPounds * 703) / ($toInches ** 2);

if ($BMI >= 18.5 && $BMI <= 25) {
    echo "Optimal" . PHP_EOL;
} else if ($BMI > 25) {
    echo "Fat" . PHP_EOL;
} else if ($BMI < 18.5) {
    echo "Please eat" . PHP_EOL;
}


