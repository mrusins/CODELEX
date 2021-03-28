<?php

namespace App\DataBase;

use App\DataBase\DBInterface;
use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

class MySQLPersonsRepository implements PersonsRepository
{

    private Mysql $dbConn;

    public function __construct()
    {
        $pdo = new PDOConnector(
            'localhost', // server
            '',      // user
            '',      // password
            'PersonService'   // database
        );
        $pdoConn = $pdo->connect('utf8', []); // charset, options
        $this->dbConn = new Mysql($pdoConn);
    }

    public function searchByNameSurname(string $search)  //if null returned -> fatal error
    {

        return $result = $this->dbConn->fetchRowMany('SELECT name, surname, id_number, description FROM persons WHERE name = :name OR surname = :name OR id_number = :name', ['name' => $search]);

    }

    public function editDescription(array $idNumber, array $newDescription): void
    {
        $this->dbConn->update('persons', $idNumber, $newDescription);

    }

    public function addNewPerson(array $new): void
    {
        $this->dbConn->insert('persons', $new);

    }

}