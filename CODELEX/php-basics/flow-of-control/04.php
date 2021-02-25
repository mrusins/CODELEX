<?php

$weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

$dayNumber = [5, 6, 7, 1, 2, 3, 4];
$a = 0;


for ($i = 0; $i < count($dayNumber); $i++) {

    switch ($dayNumber[$i]) {
        case "1":
            echo "$weekDays[0] ";
            break;
        case "2":
            echo "$weekDays[1] ";
            break;
        case "3":
            echo "$weekDays[2] ";
            break;
        case "4":
            echo "$weekDays[3] ";
            break;
        case "5":
            echo "$weekDays[4] ";
            break;
        case "6":
            echo "$weekDays[5] ";
            break;
        case "7":
            echo "$weekDays[6] ";
            break;
    }

}
echo PHP_EOL;

for ($i = 0; $i < count($dayNumber); $i++) {

    if ($dayNumber[$i] === 1) {
        echo "$weekDays[0] ";
    } elseif ($dayNumber[$i] === 2) {
        echo "$weekDays[1] ";
    } elseif ($dayNumber[$i] === 3) {
        echo "$weekDays[2] ";
    } elseif ($dayNumber[$i] === 4) {
        echo "$weekDays[3] ";
    } elseif ($dayNumber[$i] === 5) {
        echo "$weekDays[4] ";
    } elseif ($dayNumber[$i] === 6) {
        echo "$weekDays[5] ";
    } elseif ($dayNumber[$i] === 7) {
        echo "$weekDays[6] ";
    }

}