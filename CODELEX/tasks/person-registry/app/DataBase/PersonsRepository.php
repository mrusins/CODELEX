<?php

namespace App\DataBase;

interface PersonsRepository{
    public function searchByNameSurname(string $search);
    public function editDescription(array $idNumber, array $newDescription);
    public function addNewPerson(array $new);
}