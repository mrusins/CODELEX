<?php

namespace App;

use App\DataBase\MySQLPersonsRepository;

class AdminPersonService
{

    private array $post;
    private array $searchResults = [];
    private MySQLPersonsRepository $person;


    public function __construct(array $post)
    {
        $this->person = new MySQLPersonsRepository();
        $this->post = $post;
    }


    public function addNewPerson(): bool
    {
        if (key($this->post) == 'newUser' && (strlen($this->post['id']) == 4 ||
                strlen($this->post['id']) == 5) && preg_match("/^[0-9-]+$/i", $this->post['id'])) {
            $new = ['name' => $this->post['fname'], 'surname' => $this->post['lname'], 'id_number' => $this->post['id'], 'description' => $this->post['description']];
            $this->person->addNewPerson($new);
        } elseif (key($this->post) == 'newUser') {
            return true;
        }
        return false;
    }

    public function search(): array
    {
        if (count($this->post) > 0 && key($this->post) == 'id') {
            array_push($this->searchResults, $this->person->searchByNameSurname($this->post['id']));
        }
        return $this->searchResults;
    }

    public function saveDescription(): void
    {
        if (key($this->post) == 'newDescription') {

            $this->person->editDescription(['id_number' => $this->post['id']], ['description' => $this->post['newDescription']]);
        }

    }
}