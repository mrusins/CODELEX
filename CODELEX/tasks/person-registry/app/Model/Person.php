<?php

namespace App\Model;

class Person
{

    public string $name;
    public string $surname;
    public string $id;
    public string $description;


    public function __construct(string $name, string $surname, string $id, string $description)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
        $this->description = $description;
    }

    public function name():string{
        return $this->name;
    }
    public function surname():string{
        return $this->surname;
    }
    public function id():string{
        return $this->id;
    }
    public function description():string{
        return $this->description;
    }
}