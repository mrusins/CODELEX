<?php

namespace App\Model;

class Stock
{

    public string $name;
    public float $actualPrice;
    public float $startingPrice;
    public float $finalPrice;
    public int $total;



    public function __construct(string $name,float $actualPrice, float $startingPrice, float $finalPrice, int $total)
    {
        $this->name = $name;
        $this->actualPrice = $actualPrice;
        $this->startingPrice = $startingPrice;
        $this->finalPrice = $finalPrice;
        $this->total = $total;

    }

    public function name():string{
        return $this->name;
    }
    public function actualPrice():float{
        return $this->actualPrice;
    }
    public function StartingPrice():float{
        return $this->startingPrice;
    }
    public function finalPrice():float{
        return $this->finalPrice;
    }
    public function total():int{
        return $this->total;
    }

}