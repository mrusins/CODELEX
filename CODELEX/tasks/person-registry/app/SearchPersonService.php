<?php

namespace App;


use App\DataBase\MySQLPersonsRepository;

class SearchPersonService
{
    const SEARCH = 'search';
    private array $post;
    private array $searchResults=[];
    private MySQLPersonsRepository $person;

    public function __construct(array $post)
    {
        $this->post = $post;
        $this->person = new MySQLPersonsRepository();
    }

    public function search():array{
        if(count($this->post)>0){
            array_push($this->searchResults, $this->person->searchByNameSurname($this->post[self::SEARCH]));
        }
        return $this->searchResults;
    }

}