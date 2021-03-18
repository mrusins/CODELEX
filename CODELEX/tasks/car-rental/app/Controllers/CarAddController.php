<?php

namespace App\Controllers;

use App\AddService;


class CarAddController
{

    public function index()
    {

        $add = new AddService();
        $add->add($_POST);

        require_once __DIR__ . '/../view/add.php';
    }

}