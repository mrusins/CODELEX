<?php

namespace App\Services;

use App\Repositories\PersonsRepository;
use App\Model\Person;
use App\services\Validation\Validation;

class AdminPersonService
{
    private PersonsRepository $personRepository;
    private array $searchResults = [];
    private Validation $validate;

    public function __construct(PersonsRepository $personRepository)
    {
        $this->personRepository = $personRepository;
        $this->validate = new Validation();

    }

    public function isIDValid(): bool
    {
        return key($_POST) == 'newUser' && $this->validate->validateIDNumber($_POST['id']) == true ? true
            : (key($_POST) == 'newUser' ? false : true);
    }

    public function isNameValid(): bool
    {
        return key($_POST) == 'newUser' && $this->validate->validateName($_POST['fname']) == true ? true
            : (key($_POST) == 'newUser' ? false : true);
    }


    public function addNewPerson()
    {
        if (key($_POST) == 'newUser' && $this->isIDValid() == true && $this->isNameValid() == true) {

            $name = $this->validate->validateFirstUpper($_POST['fname']);
            $surname = $this->validate->validateFirstUpper($_POST['lname']);
            $id = str_replace('-', '', $_POST['id']);
            $description = $_POST['description'];

            $newPerson = new Person($name, $surname, $id, $description);

            $new = ['name' => $newPerson->name(), 'surname' => $newPerson->surname(),
                'id_number' => $newPerson->id(), 'description' => $newPerson->description()];

            $this->personRepository->addNewPerson($new);
        }
    }

    public function search(): array
    {
        if (count($_POST) > 0 && key($_POST) == 'id') {
            array_push($this->searchResults, $this->personRepository->searchByNameSurname($_POST['id']));
        }
        return $this->searchResults;
    }

    public function saveDescription(): void
    {
        if (key($_POST) == 'newDescription') {
            $this->personRepository->editDescription(['id_number' => $_POST['id']], ['description' => $_POST['newDescription']]);
        }
    }


}