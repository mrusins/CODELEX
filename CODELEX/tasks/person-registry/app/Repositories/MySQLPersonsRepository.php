<?php

namespace App\Repositories;

use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

class MySQLPersonsRepository implements PersonsRepository
{

    private Mysql $dbConn;

    public function __construct()
    {
        $pdo = new PDOConnector(
            'localhost', // server
            'maris',      // user
            '',      // password
            'PersonService'   // database
        );
        $pdoConn = $pdo->connect('utf8', []); // charset, options
        $this->dbConn = new Mysql($pdoConn);
    }

    public function searchByNameSurname(string $search)  //if null returned -> fatal error
    {

        return $result = $this->dbConn->
        fetchRowMany('SELECT id, name, surname, id_number,age,adress, description FROM persons
WHERE name = :name OR surname = :name OR id_number = :name OR age = :name OR adress = :name', ['name' => $search]);

    }

    public function editDescription(array $idNumber, array $newDescription): void
    {
        $this->dbConn->update('persons', $idNumber, $newDescription);

    }
    public function userLogs( array $newDescription): void
    {
        $this->dbConn->insert('user_log', $newDescription);

    }

    public function addNewPerson(array $new): void
    {
        $this->dbConn->insert('persons', $new);

    }
    public function getLastToken(): array
    {
        return $this->dbConn->
        fetchRow('SELECT token FROM user_log where id=(select max(id) from user_log);');

    }

}