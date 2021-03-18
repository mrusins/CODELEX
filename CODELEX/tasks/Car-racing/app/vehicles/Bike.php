<?php
namespace Vehicles;


class Bike implements VehicleInterface
{
    public string $id;
    public int $minSpeed;
    public int $maxSpeed;
    public int $crashRating;

    public function __construct(string $id, int $minSpeed, int $maxSpeed, int $crashRating){
        $this->id=$id;
        $this->minSpeed=$minSpeed;
        $this->maxSpeed=$maxSpeed;
        $this->crashRating=$crashRating;

    }
    public function id():string{
        return 'B_'.$this->id;
    }

}