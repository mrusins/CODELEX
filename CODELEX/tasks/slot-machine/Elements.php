<?php

class Elements
{
    private array $allElements;
    private array $tableArray;
    private int $winSum = 0;
    private int $magic = 0;

    function __construct(array $allElements, array $tableArray)
    {
        $this->allElements = $allElements;
        $this->tableArray = $tableArray;
        $this->winSum;
        $this->magic;
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
        } elseif ($this->tableArray[1] == $this->tableArray[4] && $this->tableArray[1] == $this->tableArray[7]) {
            echo 'SUPER MAGIC HAPPENING' . PHP_EOL;
            $this->magic = 777;
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

    public function getMagic(): int
    {
        return $this->magic;
    }
}
