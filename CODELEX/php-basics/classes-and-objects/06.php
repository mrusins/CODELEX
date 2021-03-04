<?php

class Drinkers
{
    private int $surveyed;
    private int $purchased_energy_drinks;
    private int $prefer_citrus_drinks;

    function __construct(int $surveyed, int $purchased_energy_drinks, int $prefer_citrus_drinks)
    {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function setData(int $total, int $energyDrinkers, int $citrus): void
    {

        $this->surveyed = $total;
        $this->purchased_energy_drinks = $energyDrinkers;
        $this->prefer_citrus_drinks = $citrus;
    }

    public function getData(): string
    {

        return "Total number of people surveyed " . $this->surveyed . PHP_EOL . "Approximately "
            . $this->calculateEnergyDrinkers($this->surveyed) . " bought at least one energy drink" . PHP_EOL
            . $this->calculatePreferCitrus(10) . " of those " . "prefer citrus flavored energy drinks."
            . PHP_EOL;

    }

    private function calculateEnergyDrinkers(int $numberSurveyed): string
    {

        return strval($numberSurveyed * $this->purchased_energy_drinks / 100);

    }


    private function calculatePreferCitrus(int $numberSurveyed): string
    {
        return strval($numberSurveyed * $this->purchased_energy_drinks * $this->prefer_citrus_drinks / 100);

    }

}

$citrusLovers = new Drinkers(100, 5, 5);
$citrusLovers->setData(12467, 14, 64);
echo $citrusLovers->getData();



