<?php

namespace App\Repositories;

interface PersonsRepository{
    public function searchByNameSurname(string $search);
    public function editDescription(array $idNumber, array $newDescription);
    public function userLogs( array $newDescription);
    public function addNewPerson(array $new);
    public function getLastToken();
}