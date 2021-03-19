<?php

namespace App\Controllers;

use App\AddService;
use App\DeleteService;
use App\ToFromServiceService;


class CarAddController
{

    public function index()
    {

        $add = new AddService();
        $add->add($_POST);
        $delete = new DeleteService();
        $delete->deleteCar($_POST);
        $service = new ToFromServiceService();
        $service->toFromService($_POST);

        require_once __DIR__ . '/../view/add.php';
    }

}