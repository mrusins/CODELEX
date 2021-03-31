<?php

namespace App\Services;


use App\Repositories\MySQLPersonsRepository;
use App\Repositories\PersonsRepository;

class SearchPersonService
{
    const SEARCH = 'search';
    const SEARCH_SURNAME = 'searchSurname';
    private array $searchResults=[];
    private PersonsRepository $personRepository;

    public function __construct(PersonsRepository $personRepository)
    {

        $this->personRepository=$personRepository;
    }

    public function search():void{
        if(key($_POST)=='search'){
            array_push($this->searchResults, $this->personRepository->searchByNameSurname($_POST[self::SEARCH]));
        }

    }
    public function getSearchResult():array{
        return $this->searchResults;
    }


}