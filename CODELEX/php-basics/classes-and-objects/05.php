<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function setDate(int $newMonth, int $newDay, int $newYear): void
    {
        $this->month = $newMonth;
        $this->day = $newDay;
        $this->year = $newYear;
    }

    public function getDate(): string
    {
        return 'Date: ' . $this->day . '/' . $this->month . '/' . $this->year . PHP_EOL;
    }
}

$date = new Date(10, 30, 2021);

$date->setDate(11, 11, 2021);

echo $date->getDate();