<?php

namespace App\Services;


use App\Repositories\MySQLPersonsRepository;
use App\Repositories\PersonsRepository;

class SearchPersonService
{
    const SEARCH = 'search';
    private array $searchResults=[];
    private PersonsRepository $personRepository;

    public function __construct(PersonsRepository $personRepository)
    {

        $this->personRepository=$personRepository;
    }

    public function search():array{
        if(count($_POST)>0){
            array_push($this->searchResults, $this->personRepository->searchByNameSurname($_POST[self::SEARCH]));
        }
        return $this->searchResults;
    }

}