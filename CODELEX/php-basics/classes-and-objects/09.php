<?php

class User
{
    public string $accountName;
    public string $name;
    public float $balance;

    function __construct(string $accountName, string $name, float $balance)
    {
        $this->accountName = $accountName;
        $this->name = $name;
        $this->balance = $balance;
    }
}


class BankAccount
{
    private string $accountName;
    private array $allUsers = [];


    public function addUser(User $user): void
    {
        $this->allUsers[] = $user;
    }

    public function showUserNameAndBalance(string $accountName): string
    {
        foreach ($this->allUsers as $array => $object) {
            if ($object->accountName == $accountName) {
                return $object->name . ', $' . $object->balance . PHP_EOL;
            }
        }
    }
}

$user = new BankAccount();
$user->addUser(new User('ben', 'Benson', 256.9));
$user->addUser(new User('steve', 'Stevie Wonders', -459.56));

echo $user->showUserNameAndBalance('steve');
