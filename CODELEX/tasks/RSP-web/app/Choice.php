<?php

namespace App;

class Choice
{
    public string $symbol;
    public array $power;

    public function __construct(string $symbol, array $power)
    {
        $this->symbol = $symbol;
        $this->power = $power;

    }
}