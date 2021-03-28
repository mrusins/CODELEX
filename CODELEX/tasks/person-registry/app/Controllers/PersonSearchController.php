<?php

namespace App\Controllers;

use App\SearchPersonService;
use App\DataBase\DBInterface;


class PersonSearchController
{
    public function index()
    {
        $run = new SearchPersonService($_POST);
        require_once __DIR__ . '/../View/main.php';
    }
}