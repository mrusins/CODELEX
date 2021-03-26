<?php

namespace Tests;

use App\Animal;

use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{
    public function test(){

        $dog = new Animal('mia');
        $this->assertEquals('mia', $dog->name());

        $cat = new Animal('frika');
        $this->assertEquals('frika', $cat->name());

    }
}