<?php

$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'sheep', 'sheep', 'wolf', 'sheep',];

for ($i = 0; $i < count($animals) - 1; $i++) {

    if ($animals[$i + 1] === 'wolf') {
        echo "OMG, ";
    } else if ($animals[$i] === 'wolf') {
        echo 'HEHE, ';
    } else {
        echo 'sheep, ';
    }

}

if (end($animals) == 'wolf') {
    echo 'HEHE,';
} else if (end($animals) == 'sheep') {
    echo 'sheep ';
}



