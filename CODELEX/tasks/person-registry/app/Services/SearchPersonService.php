<?php

namespace App\Services;


use App\Repositories\MySQLRepository;
use App\Repositories\PersonsRepository;

class SearchPersonService
{
    const SESSION_TIME = 10;
    const SEARCH = 'search';
    const SEARCH_SURNAME = 'searchSurname';
    private array $searchResults=[];
    private array $authorize=[];
    private string $loginName='';



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

    public function authorize():string{
        if (isset($_POST['authorize'])){
            $result = $this->personRepository->searchByNameSurname($_POST['authorize']);
            if(isset($result)) {
                $this->loginName = $this->personRepository->searchByNameSurname($_POST['authorize'])[0]['name'];

                $id = $this->personRepository->searchByNameSurname($_POST['authorize'])[0]['id'];

                $_SESSION['name']=$this->loginName;
                $_SESSION['id'] = $id;
                $token = bin2hex(random_bytes(16));
                $unsetTime = $_SESSION['unset'] = time() + self::SESSION_TIME;
                $this->personRepository->userLogs(['id'=>$id],['unset_time'=>$unsetTime, 'user_id'=> $id,
                    'token'=>$token] );
            }
        }
        if(isset($_SESSION['name'])){
            return $_SESSION['name'];
        }
        return false;
    }


}