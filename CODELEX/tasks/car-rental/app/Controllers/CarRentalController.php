<?php
namespace App\Controllers;
use App\RentService;

class CarRentalController
{
public function index()
{
    $run = new RentService($_POST);

    $run->dbService();


    require_once __DIR__ . '/../view/main.php';

}


}