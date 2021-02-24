<?php
print("\033[2J\033[;H");
echo 'Welcome to Piglet!'. PHP_EOL;
$totalPoints = 0;
do{
    $randomNumber = rand(1,9);
    if ($randomNumber == 1){
        exit('You rolled 1!' . PHP_EOL . 'You got 0 points.' . PHP_EOL);
    }
    print("\033[2J\033[;H");
    echo 'Welcome to Piglet'. PHP_EOL;
    echo "You rolled $randomNumber".PHP_EOL;
    $askToPlay = readline('Roll again? y/n: ');
    if ($askToPlay == 'y'){
        $totalPoints += $randomNumber;
    } else if ($askToPlay == 'n') {
        $totalPoints += $randomNumber;
        exit('You got '. $totalPoints . PHP_EOL);
    }

}while ($randomNumber != 1);