<?php

$number = readline('Enter number:');
if (is_numeric($number) != true) {
    die("Enter only numbers!" . PHP_EOL);
}

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

if (in_array($number, $numbers) == 'true') {
    echo "is in array" . PHP_EOL;
}


