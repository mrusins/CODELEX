<?php

class Machine
{
    private int $startMoney;
    private int $bet;

    function __construct(int $startMoney, int $bet)
    {
        $this->startMoney = $startMoney;
        $this->bet = $bet;
    }

    public function deposite(int $sum): void
    {
        $this->startMoney = $this->startMoney + $sum;
    }

    public function depositeMinusBet(int $sum): void
    {
        $this->startMoney = $this->startMoney - $sum;
    }

    public function bet(int $bet): void
    {
        $this->bet = $bet;
    }

    public function printSumAndBet(): string
    {
        return 'Your deposit: ' . $this->startMoney . ' EUR' . PHP_EOL . 'Your bet: ' . $this->bet . PHP_EOL;
    }

    public function printSum(): string
    {
        return $this->startMoney;
    }
}


class Elements
{
    private array $allElements;
    private array $tableArray;
    private int $winSum = 0;

    function __construct(array $allElements, array $tableArray)
    {
        $this->allElements = $allElements;
        $this->tableArray = $tableArray;
        $this->winSum;
    }

    public function prinAllElements(): string
    {
        return 'Current elements in game are: ' . implode(' ', $this->allElements) . PHP_EOL;
    }

    public function addElement(string $newElement): void
    {
        array_push($this->allElements, $newElement);
    }

    public function clearTableArray(): void
    {
        $this->tableArray = [];  //clear array of table
    }

    public function table(): array
    {

        $count = count($this->allElements);

        for ($i = 0; $i < 9; $i++) {

            $random = rand(0, $count - 1);
            array_push($this->tableArray, $this->allElements[$random]);

        }
        return $this->tableArray;

    }

    public function testTable($x): string
    {
        return $this->tableArray[$x];
    }

    public function printTable(): void
    {
        $this->winSum = 0;

        if ($this->tableArray[0] == $this->tableArray[1] && $this->tableArray[0] == $this->tableArray[2]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 10;
        } elseif ($this->tableArray[3] == $this->tableArray[4] && $this->tableArray[3] == $this->tableArray[5]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 10;
        } elseif ($this->tableArray[6] == $this->tableArray[7] && $this->tableArray[6] == $this->tableArray[8]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 10;
        } elseif ($this->tableArray[0] == $this->tableArray[4] && $this->tableArray[0] == $this->tableArray[8]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 15;
        } elseif ($this->tableArray[2] == $this->tableArray[4] && $this->tableArray[2] == $this->tableArray[6]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 15;
        } elseif ($this->tableArray[0] == $this->tableArray[1] && $this->tableArray[0] == $this->tableArray[2] && $this->tableArray[0] == $this->tableArray[4] && $this->tableArray[0] == $this->tableArray[6]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 20;
        } elseif ($this->tableArray[0] == $this->tableArray[1] && $this->tableArray[0] == $this->tableArray[2] && $this->tableArray[0] == $this->tableArray[4] && $this->tableArray[0] == $this->tableArray[8]) {
            echo 'BINGO' . PHP_EOL;
            $this->winSum = 20;
        }
    }

    public function generateTable(): void
    {
        $this->table();
    }

    public function getWinSum(): int
    {
        return $this->winSum;
    }
}

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

    $elements->generateTable();

    for ($i = 0; $i < 9; $i++) {
        echo $elements->testTable($i) . ' ';
        if (($i + 1) % 3 == 0) {
            echo PHP_EOL;
            usleep(500000);
        }
    }

    if ($machine->printSum() <= 0) {
        exit('THE END' . PHP_EOL);
    }
    $elements->printTable();


    $machine->bet($bet);

    echo $machine->printSumAndBet();
    $spin = strtolower(readline('Enter to spin reels or "b" to change your BET:' . PHP_EOL));
    if ($spin == 'b') {
        $bet = readline('Enter your bet(min 10) :' . PHP_EOL);
    }

    echo $spin . PHP_EOL;

    if ($elements->getWinSum() > 1) {
        $machine->deposite($bet * floor($bet / 10));
    }
    $machine->depositeMinusBet($bet);

    $elements->clearTableArray();


} while ($machine->printSum() > -10);

echo ("THE END") . PHP_EOL;

