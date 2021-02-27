<?php

require_once 'Machine.php';
require_once 'Elements.php';


//########## - GAME LOGIC - ##############

print("\033[2J\033[;H");
$machine = new Machine(0, 0);
$elements = new Elements(['X', 'C', 'O', '7', '#'], []);
$elements->addElement('M');   // TODO ADD NEW ELEMENT
echo $elements->prinAllElements() . PHP_EOL;


$startMoney = readline('Enter your deposit(min 100) :' . PHP_EOL);
if ($startMoney < 100) {
    exit("You must add 100 EUR or mere" . PHP_EOL);
}

$bet = readline('Enter your bet(min 10) :');
if ($bet < 10) {
    exit("You must add 10 EUR or mere" . PHP_EOL);
}
$machine->deposite($startMoney);


do {
    print("\033[2J\033[;H");
    echo $machine->printSumAndBet();
    $elements->generateTable();

    for ($i = 0; $i < 9; $i++) {
        echo $elements->testTable($i) . ' ';
        if (($i + 1) % 3 == 0) {
            echo PHP_EOL;
            usleep(500000);
        }
    }

    if ($machine->printSum() <= 0) {
        exit('Your deposit is 0!' . PHP_EOL);
    }
    $elements->printTable();


    $machine->bet($bet);


    $spin = strtolower(readline('Enter to spin reels or "b" to change your BET:' . PHP_EOL));
    if ($spin == 'b') {
        $bet = readline('Enter your bet(min 10) :' . PHP_EOL);
    }

    echo $spin . PHP_EOL;

    if ($elements->getWinSum() > 1) {
        $machine->deposite($bet * floor($bet / 10));
    }

    if ($elements->getMagic() == 777) { //TODO must to finish

        for ($i = 0; $i < 5; $i++) {

            print("\033[2J\033[;H");
            echo 'SUPER MAGIC HAPPENING' . PHP_EOL;

            $elements->generateTable();

            for ($i = 0; $i < 9; $i++) {
                echo $elements->testTable($i) . ' ';
                if (($i + 1) % 3 == 0) {
                    echo PHP_EOL;
                    usleep(500000);
                }
            }

            echo $i . PHP_EOL;

            $elements->printTable();


            $machine->bet($bet);

            echo $machine->printSumAndBet();

            echo $spin . PHP_EOL;

            if ($elements->getWinSum() > 1) {
                $machine->deposite($bet * floor($bet / 10));
            }

        }

    }

    $machine->depositeMinusBet($bet);

    $elements->clearTableArray();


} while ($machine->printSum() > -10);

