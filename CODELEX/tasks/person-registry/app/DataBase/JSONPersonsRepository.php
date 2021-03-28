<?php

namespace App;


use App\DataBase\PersonsRepository;

class JSONPersonsRepository implements PersonsRepository
{
    private array $allPersons = [];

    public function __construct(){
        $string = file_get_contents( 'persons.json');
        $data = json_decode($string);

        foreach ($data as $key => $value) {

            array_push($this->allPersons, new Person($value->name, $value->surname, $value->id, $value->description));
        }

    }
    public function searchByNameSurname(string $search)
    {

    }

    public function editDescription(array $idNumber, array $newDescription): void
    {

    }

    public function addNewPerson(array $new): void
    {

    }

    public function getPersons(): array
    {
        return $this->allPersons;
    }

    public function saveToJson(): void
    {
        $jsonUpdate = json_encode($this->allPersons);
        file_put_contents('persons.json', $jsonUpdate);
    }


}