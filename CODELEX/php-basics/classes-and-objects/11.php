<?php

class Account
{
    public string $accountName;
    public float $balance;

    function __construct(string $accountName, float $balance)
    {
        $this->accountName = $accountName;
        $this->balance = $balance;
    }
}

class Bank
{

    private array $accounts = [];

    public function addAccount(Account $add): void
    {
        $this->accounts[] = $add;
    }

    public function getAll(): string
    {
        echo PHP_EOL;
        foreach ($this->accounts as $array => $account) {
            echo 'Account: ' . $account->accountName . '  Balance: ' . $account->balance . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function transfer(string $accountFrom, string $accountTo, float $howMuch): void
    {

        foreach ($this->accounts as $array => $account) {
            if ($account->accountName === $accountFrom) {
                $account->balance = $account->balance - $howMuch;
            } elseif ($account->accountName === $accountTo) {
                $account->balance = $account->balance + $howMuch;
            }
        }
    }
}

$bank = new Bank();
$bank->addAccount(new Account('A', 100));
$bank->addAccount(new Account('B', 0));
$bank->addAccount(new Account('C', 0));

$bank->getAll();

$bank->transfer('A', 'B', 50);
$bank->getAll();
$bank->transfer('B', 'C', 25);
$bank->getAll();