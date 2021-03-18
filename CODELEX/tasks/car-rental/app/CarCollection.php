<?php

namespace App;


class CarCollection
{
    private array $allCars = [];

    public function setCars(): void
    {
        $string = file_get_contents('app/garage/garage.json');
        $data = json_decode($string);

        foreach ($data as $key => $value) {

            array_push($this->allCars, new Car($value->id, $value->model,
                $value->odometer, $value->fuel, $value->price, $value->status));
        }
    }

    public function getCars(): array
    {
        return $this->allCars;
    }

    public function seveToJson(): void
    {
        $newJsonString = json_encode($this->allCars);
        file_put_contents('app/garage/garage.json', $newJsonString);
    }


}
