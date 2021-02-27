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