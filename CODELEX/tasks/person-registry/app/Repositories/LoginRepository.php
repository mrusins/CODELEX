<?php

namespace App\Repositories;

use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

class LoginRepository
{

    private Mysql $dbConn;

    public function __construct()
    {
        $pdo = new PDOConnector(
            'localhost', // server
            'maris',      // user
            'maris1234',      // password
            'PersonService'   // database
        );
        $pdoConn = $pdo->connect('utf8', []); // charset, options
        $this->dbConn = new Mysql($pdoConn);
    }

    public function getUserLog(int $id)
    {
        return $result = $this->dbConn->
        fetchRow('SELECT * FROM user_log WHERE user_id = '.$id.' ORDER BY id DESC LIMIT 1');
    }




}