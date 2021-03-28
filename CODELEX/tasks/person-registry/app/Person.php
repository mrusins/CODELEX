<?php

namespace App;

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

}