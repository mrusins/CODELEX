<?php

class SavingsAccount
{
    private float $rate = 0;
    private int $howLongOpen = 0;
    private array $account = [];
    private array $earned = [];
    private array $withdraw = [];

    public function setStartingBalance(int $starting): void
    {
        array_push($this->account, $starting);
    }

    public function setRate(float $percentage): void
    {
        $this->rate = $percentage / 12;
    }

    public function setHowLongOpen(int $inMonths): void
    {
        $this->howLongOpen = $inMonths;
    }

    public function setMonthDeposite(int $monthDeposite): void
    {
        array_push($this->account, $monthDeposite);
    }

    public function setWithdraw(int $withdraw): void
    {
        array_push($this->account, $withdraw);
        array_push($this->withdraw, $withdraw * -1);
    }

    public function getAccount(): int
    {
        return array_sum($this->account);
    }

    public function getWithdraw(): int
    {
        return array_sum($this->withdraw);
    }

    public function getMothlyInterest(): float
    {
        return round(array_sum($this->earned), 2);
    }

    public function calculateMonthlyInterest(): void
    {
        $total = (array_sum($this->account)) / 100 * ($this->rate);
        array_push($this->earned, $total);
    }

    public function getEndingBalance(): float
    {
        return round(array_sum($this->account) + array_sum($this->earned), 2);
    }

}

$money = new SavingsAccount();

$enterStartBilance = readline('How much money is in the account? : ' . PHP_EOL);
$money->setStartingBalance($enterStartBilance);
$percentage = readline('Enter the annual interest rate: ' . PHP_EOL);
$money->setRate($percentage);
$enterHowLongOpened = readline('Enter how long: ' . PHP_EOL);
$money->setHowLongOpen($enterHowLongOpened);
$countMonths = 1;

do {
    $monthDeposite = readline('Enter amount deposite for month ' . $countMonths . ': ' . PHP_EOL);
    $money->setMonthDeposite($monthDeposite);

    $monthWithdraw = readline('Enter amount withdraw for ' . $countMonths . ': ' . PHP_EOL);
    $money->setWithdraw(-1 * $monthWithdraw);

    $money->calculateMonthlyInterest();

    $countMonths++;
} while ($countMonths <= $enterHowLongOpened);


echo '##########################' . PHP_EOL;
echo 'Total deposited: $' . $money->getAccount() . PHP_EOL;
echo 'Total withdrawn: $' . $money->getWithdraw() . PHP_EOL;
echo 'Interest earned: $' . $money->getMothlyInterest() . PHP_EOL;
echo 'Ending balance: $' . $money->getEndingBalance() . PHP_EOL;
