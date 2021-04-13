<?php

namespace App\Model;

class Wallet
{

    public ?float $buy=null;
    public ?float $sell=null;

    public function __construct( ?float $buy, ?float $sell)
    {
        $this->buy = $buy;
        $this->sell = $sell;
    }
    public function buy(){
        return $this->buy;
    }
    public function sell(){
        return $this->sell;
    }

}