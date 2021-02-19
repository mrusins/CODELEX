<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];
$total = 0;
for($i = 0; $i<count($numbers); $i++){
    $total +=$numbers[$i];
}
echo $total / count($numbers);

