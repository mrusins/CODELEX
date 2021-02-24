<?php


for ($j = 1; $j <= 5; $j++) {

    $answer = $j;
    for ($i = 2; $i <= $j; $i++) {
        $answer = $answer * $j;

    }

    echo $answer . " ";

}


