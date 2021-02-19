<?php

$max = 110;
$brIndex = [];
$stack = [];
for ($j = 0; $j < 11; $j++){
    array_push($brIndex, $max/10*$j);
}
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
    if (array_search($j, $brIndex) !== false) {
        echo $stack[$j] . PHP_EOL;
    } else {
        echo $stack[$j] . " ";
    }
}
