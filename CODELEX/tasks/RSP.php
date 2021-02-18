<?php

$options = ['r', 'p', 's', 'x'];
$computerChoice = rand(0, 2);

$choice = strtolower(readline("
Rock: r
Paper: p
Scissors: s
Exit: x

Enter your choice (r, p, s or x for exit):"));
if (!in_array($choice, $options)) {
    die("Enter only r, p, s or x!" . PHP_EOL);
}
switch ($choice) {
    case "r":
        if ($computerChoice === 0) {
            echo 'tie' . PHP_EOL;
        } else if ($computerChoice === 1) {
            echo "PC won" . PHP_EOL;
        } else {
            echo "You won" . PHP_EOL;
        }
        break;

    case "p":
        if ($computerChoice === 1) {
            echo 'tie' . PHP_EOL;
        } else if ($computerChoice === 2) {
            echo "PC won" . PHP_EOL;
        } else {
            echo "You won" . PHP_EOL;
        }
        break;
    case "s":
        if ($computerChoice === 2) {
            echo 'tie' . PHP_EOL;
        } else if ($computerChoice === 0) {
            echo "PC won" . PHP_EOL;
        } else {
            echo "You won" . PHP_EOL;
        }
        break;
    case "x":
        die ("Bye!" . PHP_EOL);
}