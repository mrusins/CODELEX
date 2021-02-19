<?php


$array2 = [];

function generateArrays(int $arrayLenght): array
{
    $array = [];
    global $array2;
    for ($i = 0; $i < $arrayLenght; $i++) {
        $random = rand(1, 100);
        array_push($array, $random);
        array_push($array2, $random);
    }

    return $array;
}

echo 'Array1: ' . implode(" ", generateArrays(10)) . PHP_EOL;


function changeLast($array2): array
{
    array_pop($array2);
    array_push($array2, -7);
    return $array2;
}

echo 'Array2: ' . implode(" ", changeLast($array2)) . PHP_EOL;