<?php

class FuelGauge
{
    private $current;

    function __construct(int $current)
    {
        $this->current = $current;
    }

    function currentFuealAmount(): string
    {
        return 'Current fuel amount: ' . $this->current . PHP_EOL;
    }

    function decreaseFuelAmount(int $milage): void
    {
        $this->current -= $milage / 10;
        if ($this->current <= 0) {
            exit('Fuel tank is empty' . PHP_EOL);
        }

    }

    function puttingFuel(int $newCurrent) //TODO can't figure out why string throws error
    {
        $this->current += $newCurrent;
        if ($this->current > 70) {
            $this->current = 70;
            return PHP_EOL . PHP_EOL . PHP_EOL . 'FUEL TANK IS FULL!' . PHP_EOL;
        }
    }
}

class Odometer
{
    private $current;

    function __construct(int $current)
    {

        $this->current = $current;
    }

    function currentOdometer(): string
    {
        return 'Current odometer: ' . $this->current . PHP_EOL;
    }

    function driveOdometer(int $lastDrive): void
    {
        $this->current += $lastDrive;
        if ($this->current > 999999) {
            $this->current = ($lastDrive - (999999 - $this->current)) / 2 - 1;
        }
    }
}

$carFuel = new FuelGauge(0);
$carOdo = new Odometer(999980);
print("\033[2J\033[;H");
echo $carFuel->currentFuealAmount();

$addFuel = readline('Enter fuel in liters: ');
echo $carFuel->puttingFuel($addFuel);

do {
    echo $carFuel->currentFuealAmount();
    echo $carOdo->currentOdometer();
    $addMilage = readline('Enter milage: ');
    $i = $addMilage;
    $carFuel->puttingFuel(0);
    $carOdo->driveOdometer($addMilage);
    $carFuel->decreaseFuelAmount($addMilage);
    echo PHP_EOL . PHP_EOL . PHP_EOL;
} while ($i > 0);



