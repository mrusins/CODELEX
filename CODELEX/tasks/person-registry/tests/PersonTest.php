<?php

namespace Tests;

use App\Model\Person;



use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class PersonTest extends TestCase
{
public function testPerson():void
{
    $person = new Person('Maris', 'Rusins','1234', 'note');
    $this->assertEquals('Maris', $person->name());
    $this->assertEquals('Rusins', $person->surname());
    $this->assertEquals('1234', $person->id());
    $this->assertEquals('note', $person->description());
}

}