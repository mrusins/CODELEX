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

    public function testPerson(): void
    {
        $person = new Person('Maris', 'Rusins', '1234', 'note');
        $this->assertEquals('Maris', $person->name());
        $this->assertEquals('Rusins', $person->surname());
        $this->assertEquals('1234', $person->id());
        $this->assertEquals('note', $person->description());
    }

    public function testIDNumber(): void
    {
        $this->assertEquals(true, $this->valid->validateIDNumber('12345'));
        $this->assertEquals(true, $this->valid->validateIDNumber('1234'));
        $this->assertEquals(true, $this->valid->validateIDNumber('12-45'));
        $this->assertEquals(false, $this->valid->validateIDNumber('abcd'));
        $this->assertEquals(false, $this->valid->validateIDNumber('a12-2'));
        $this->assertEquals(false, $this->valid->validateIDNumber('aa-11'));
        $this->assertEquals(false, $this->valid->validateIDNumber('$%^&*'));
    }

    public function testName(): void
    {
        $this->assertEquals(true, $this->valid->validateName('abc'));
        $this->assertEquals(true, $this->valid->validateName('AbcD'));
        $this->assertEquals(true, $this->valid->validateName('Abcd Abcd'));
        $this->assertEquals(false, $this->valid->validateName('Bc'));
        $this->assertEquals(false, $this->valid->validateName('Bc1'));
        $this->assertEquals(false, $this->valid->validateName('&*^*'));
        $this->assertEquals(false, $this->valid->validateName('Ab2b'));
    }

    public function testFirstUpper(): void
    {
        $this->assertEquals('Maris', $this->valid->validateFirstUpper('maris'));
        $this->assertEquals('Maris Andris', $this->valid->validateFirstUpper('mAriS ANDRIS'));
        $this->assertEquals('Maris', $this->valid->validateFirstUpper('mARIS'));
    }
}