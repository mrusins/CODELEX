<?php


$array2 = [];
$array = [];

function generateArrays(&$array, &$array2, $arrayLenght)
{
    for ($i = 0; $i < $arrayLenght; $i++) {
        $random = rand(1, 100);
        array_push($array, $random);
        array_push($array2, $random);
    }

    return $array;
}
generateArrays($array, $array2,10);
echo 'Array1: ' . implode(" ", $array) . PHP_EOL;



function changeLast($array2): array
{
    array_pop($array2);
    array_push($array2, -7);
    return $array2;
}
changeLast($array2);

echo 'Array2: ' . implode(" ", changeLast($array2)) . PHP_EOL;