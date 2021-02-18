<?php

$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'sheep', 'sheep', 'wolf', 'sheep',];

for ($i = 0; $i < count($animals); $i++) {

    if (isset($animals[$i + 1]) && $animals[$i + 1] === 'wolf' || isset($animals[$i - 1]) && $animals[$i - 1] === 'wolf') {
        echo "OMG, ";
    } else if ($animals[$i] === 'wolf') {
        echo 'HEHE, ';
    } else {
        echo 'sheep, ';
    }

}





