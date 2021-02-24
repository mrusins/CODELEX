<?php
print("\033[2J\033[;H");
$desired = readline('Enter number from 1 - 9: ' . PHP_EOL);
if ($desired < 1 || $desired > 9) {
    exit('Only fom 1 - 9 allowed!' . PHP_EOL);
}
echo 'Desired sum: ' . $desired . PHP_EOL;
do {
    $rand1 = rand(0, 9);
    $rand2 = rand(0, 9);
    $sum = $rand1 + $rand2;
    echo "$rand1 and $rand2 = $sum " . PHP_EOL;
} while ($sum != $desired);