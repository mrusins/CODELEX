<?php

class FuelGauge
{
    public $current;
    function __construct( int $current)
    {
        $this->current = $current;
    }

    function currentFuealAmount()
    {
        return 'Current fuel amount: ' . $this->current . PHP_EOL;
    }

    function decreaseFuelAmount ($milage){
        $this->current -= $milage/10;
    }

    function puttingFuel($newCurrent)
    {
        $this->current += $newCurrent;
        if ($this->current > 70) {
            $this->current = 70;
            echo PHP_EOL . PHP_EOL . PHP_EOL . 'FUEL TANK IS FULL!' . PHP_EOL;
        }
    }
}

class Odometer
{
    public $current;
    function __construct( int $current){

        $this->current = $current;
    }
    function currentOdometer(){
        return 'Current odometer: ' . $this->current . PHP_EOL;
    }

    function driveOdometer($lasDrive){
        $this->current += $lasDrive;
        if ($this->current > 999999){
            $this->current = ($lasDrive - (999999 - $this->current))/2-1;
        }
    }
}
$car = new FuelGauge( 0);
$car2 = new Odometer(999999);
print("\033[2J\033[;H");
echo $car->currentFuealAmount();

$addFuel = readline('Enter fuel in liters: ');
$car->puttingFuel($addFuel);

do{
    echo $car->currentFuealAmount();
    echo $car2->currentOdometer();
    $addMilage = readline('Enter milage: ');
    $i = $addMilage;
    $car->puttingFuel(0);
    $car2->driveOdometer($addMilage);
    $car ->decreaseFuelAmount($addMilage);
    echo PHP_EOL . PHP_EOL . PHP_EOL;
} while( $i > 0);



