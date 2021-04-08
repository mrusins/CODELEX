<?php

namespace App\Controllers;

use App\Services\AdminPersonService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PersonAdminController
{
    private AdminPersonService $service;

    public function __construct(AdminPersonService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $run = $this->service;
        $run->saveDescription();
        $run->addNewPerson();

//
//        $loader = new FilesystemLoader('templates');
//        $twig = new Environment($loader);
//
//
//        echo $twig->render('admin.twig',['users'=>$run->search()]);




        require_once __DIR__ . '/../View/admin.php';

    }
}