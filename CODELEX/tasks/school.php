<?php

class Children
{
    private string $name;
    private int $yearOfBirth;
    private int $group ;

    function __construct(string $name, int $yearOfBirth)
    {
        $this->name = $name;
        $this->yearOfBirth = $yearOfBirth;
        $this->setClass($this->calculateGroup());

    }

    function setClass(int $newGroup)
    {

        $this->group = $newGroup;
    }

    private function calculateGroup(): int
    {

        $howOld = 2021 - $this->yearOfBirth;
        for ($i = 1; $i <= 12; $i++) {
            if ($howOld - 7 === $i) {
                return $i;
            }
        }
    }

    function printInfo(): string
    {

        $howOld = 2021 - $this->yearOfBirth;
        return $this->name . ', ' . $howOld . ' gadi, mācās ' . $this->group . '. klasē'.PHP_EOL;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

}

$andris = new Children('Andris', 2013);
$janis = new Children('Janis', 2011);
$ivars = new Children('Ivars', 2012);
$maija = new Children('Maija', 2008);
$muris = new Children('Muris', 2007);
$dzeris = new Children('Dzeris', 2006);

$andris ->setName('Maris');
$andris ->setClass(10);

echo $andris->printInfo();
echo $dzeris->printInfo();

