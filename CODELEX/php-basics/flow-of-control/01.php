<?php
$allNumber = [];
$nr1 = readline('enter 1st: ');
array_push($allNumber, $nr1);
$nr2 = readline('enter 2st: ');
array_push($allNumber, $nr2);
$nr3 = readline('enter 3st: ');
array_push($allNumber, $nr3);

rsort($allNumber);
echo $allNumber[0] . PHP_EOL;


