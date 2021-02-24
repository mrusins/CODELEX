<?php

$min = readline('Enter MIN: ' . PHP_EOL);
$max = readline('Enter MAX: ' . PHP_EOL);

$tempMin = $min;
$tempMax = $max;
for ($i = $min; $i <= $max; $i++) {
    echo PHP_EOL;
    $tempMax--;
    $tempMin++;

    for ($j = $i; $j <= $max; $j++) {
        echo $j;
    }
    for ($j = $min; $j <= $tempMin - 2; $j++) {
        echo $j;
    }
}
echo PHP_EOL;