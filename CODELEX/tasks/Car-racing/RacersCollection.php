<?php

class RacersCollection
{
    public array $racers;

    public function setRacer( $racer):void{
        $this->racers[] = $racer;
    }

    public function getAllRacers():array{

        return $this->racers;
    }



}