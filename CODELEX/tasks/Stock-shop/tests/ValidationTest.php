<?php

namespace Tests;

use App\Model\Person;


use App\services\Validation\Validation;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    private Validation $valid;

    protected function setUp(): void
    {
        $this->valid = new Validation();
    }

    public function testName(): void
    {
        $this->assertEquals(true, $this->valid->validateName('abc'));

    }

}