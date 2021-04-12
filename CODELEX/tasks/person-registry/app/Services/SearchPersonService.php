<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class SearchPersonService
{
    const SESSION_TIME = 10;
    const SEARCH = 'search';
    private array $searchResults = [];
    private string $loginName = '';
    private string $token = '';
    private PersonsRepository $personRepository;

    public function __construct(PersonsRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function search(): void
    {
        if (key($_POST) == 'search') {
            array_push($this->searchResults, $this->personRepository->searchByNameSurname($_POST[self::SEARCH]));
        }
    }

    public function getSearchResult(): array
    {
        return $this->searchResults;
    }

    public function authorize(): string
    {
        if (isset($_POST['authorize'])) {
            $this->token = bin2hex(random_bytes(16));
            $unsetTime = $_SESSION['unset'] = time() + self::SESSION_TIME;
            $result = $this->personRepository->searchByNameSurname($_POST['authorize']);
            $_SESSION['token'] = $this->token;
            $this->personRepository->userLogs(['unset_time' => $unsetTime,
                'token' => $this->token]);

            if (isset($result) && $this->token == $this->personRepository->getLastToken()['token']) {
                $this->loginName = $this->personRepository->searchByNameSurname($_POST['authorize'])[0]['name'];
                $id = $this->personRepository->searchByNameSurname($_POST['authorize'])[0]['id'];
                $_SESSION['name'] = $this->loginName;
                $_SESSION['id'] = $id;
                $token = bin2hex(random_bytes(16));
                $unsetTime = $_SESSION['unset'] = time() + self::SESSION_TIME;
                $this->personRepository->userLogs(['unset_time' => $unsetTime, 'user_id' => $id,
                    'token' => $token]);
            }
        }
        if (isset($_SESSION['name'])) {
            return $_SESSION['name'];
        }
        return false;
    }
    public function getToken():string{
        return $this->personRepository->getLastToken()['token'];
    }


}