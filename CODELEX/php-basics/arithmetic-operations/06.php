<?php

$max = 110;

$stack = [];
for ($i = 0; $i < $max; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        $stack[] = "CozaLoza";
    } else if ($i % 5 == 0) {
        $stack[] = "Loza";
    } else if ($i % 3 == 0) {
        $stack[] = "Coza";
    } else {
        $stack[] = $i;
    }
}


for ($j = 0; $j < count($stack); $j++) {


    if ($j == 11 || $j == 22 || $j == 33 || $j == 44 || $j == 55 || $j == 66 || $j == 77 || $j == 88 || $j == 99 || $j == 110) {
        echo $stack[$j] . PHP_EOL;
    } else {
        echo $stack[$j] . " ";
    }

}
