<?php

$enterWord = strtoupper(readline('Enter your text: ' . PHP_EOL));

$word = str_split($enterWord);

for ($i = 0; $i < count($word); $i++) {

    switch ($word[$i]) {
        case "A":
            echo "2 ";
            break;
        case "B":
            echo "2 ";
            break;
        case "C":
            echo "2 ";
            break;
        case "D":
            echo "3 ";
            break;
        case "E":
            echo "3 ";
            break;
        case "F":
            echo "3 ";
            break;
        case "G":
            echo "4 ";
            break;
        case "H":
            echo "4 ";
            break;
        case "I":
            echo "4 ";
            break;
        case "J":
            echo "5 ";
            break;
        case "K":
            echo "5 ";
            break;
        case "L":
            echo "5 ";
            break;
        case "M":
            echo "6 ";
            break;
        case "N":
            echo "6 ";
            break;
        case "O":
            echo "6 ";
            break;
        case "P":
            echo "7 ";
            break;
        case "Q":
            echo "7 ";
            break;
        case "R":
            echo "7 ";
            break;
        case "S":
            echo "7 ";
            break;
        case "T":
            echo "8 ";
            break;
        case "U":
            echo "8 ";
            break;
        case "V":
            echo "8 ";
            break;
        case "W":
            echo "9 ";
            break;
        case "X":
            echo "9 ";
            break;
        case "Y":
            echo "9 ";
            break;
        case "Z":
            echo "9 ";
        case " ":
            echo "_ ";

    }

}

echo PHP_EOL;


for ($i = 0; $i < count($word); $i++) {

    if ($word[$i] === 'A' || $word[$i] === 'B' || $word[$i] === 'C') {
        echo '2 ';
    } elseif ($word[$i] === 'D' || $word[$i] === 'E' || $word[$i] === 'F') {
        echo '3 ';
    } elseif ($word[$i] === 'G' || $word[$i] === 'H' || $word[$i] === 'I') {
        echo '4 ';
    } elseif ($word[$i] === 'J' || $word[$i] === 'K' || $word[$i] === 'L') {
        echo '5 ';
    } elseif ($word[$i] === 'M' || $word[$i] === 'N' || $word[$i] === 'O') {
        echo '6 ';
    } elseif ($word[$i] === 'P' || $word[$i] === 'Q' || $word[$i] === 'R' || $word[$i] === 'S') {
        echo '7 ';
    } elseif ($word[$i] === 'T' || $word[$i] === 'U' || $word[$i] === 'V') {
        echo '8 ';
    } elseif ($word[$i] === 'W' || $word[$i] === 'X' || $word[$i] === 'Y' || $word[$i] === 'Z') {
        echo '9 ';
    } elseif ($word[$i] === ' ') {
        echo '- ';
    }


}