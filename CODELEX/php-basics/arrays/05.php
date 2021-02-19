<?php

//TODO: add diagonal winner
//TODO: must check move only in empty place

$table = [['-', ' ', '-'], [' ', '-', ' '], ['-', ' ', '-']];

function drawTable($table)
{
    for ($i = 0; $i < count($table); $i++) {
        echo implode("|", $table[$i]) . PHP_EOL;
    }
}
$thereIsWinner = 0;
function isThereWinner(&$thereIsWinner, $table)
{
    for ($i = 0; $i <= 2; $i++) {
        if (count(array_unique($table[$i])) === 1) {
            $thereIsWinner = 1;
            exit('Winner horizontal!' . PHP_EOL);
        } else if ($table[0][$i] == '0' && $table[1][$i] == '0' && $table[2][$i] == '0' || $table[0][$i] == 'X' && $table[1][$i] == 'X' && $table[2][$i] == 'X') {
            $thereIsWinner = 1;
            exit('Winner vertical!' . PHP_EOL);;
        }
    }
}
do {
    $player1Message = 'Player 1 enter 1, 2 or 3:';
    $player2Message = 'Player 2 enter 1, 2 or 3:';
    $moveX1 = readline("$player1Message");
    $moveY1 = readline("$player1Message");
    $table[$moveX1 - 1][$moveY1 - 1] = "0";
    system('clear');
    drawTable($table);
    isThereWinner($thereIsWinner, $table);
    $moveX2 = readline("$player2Message");
    $moveY2 = readline("$player2Message");
    $table[$moveX2 - 1][$moveY2 - 1] = "X";
    system('clear');
    drawTable($table);
    isThereWinner($thereIsWinner,$table);

} while ($thereIsWinner != 1);



