<?php

$patterSize = 7;
$pattern = '////';
$treePattern = '****';
$pattern2 = '\\\\\\\\';

for ($i = 0; $i < $patterSize; $i++) {
    for ($j = 0; $j < 1; $j++) {
        echo str_repeat($pattern, ($patterSize - $i) - 1) . str_repeat($treePattern, $i * 2);
        echo str_repeat($pattern2, ($patterSize - $i) - 1) . PHP_EOL;

    }
}