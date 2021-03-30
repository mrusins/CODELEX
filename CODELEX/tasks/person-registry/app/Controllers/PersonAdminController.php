<?php

namespace App\Controllers;

use App\Services\AdminPersonService;

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

        require_once __DIR__ . '/../View/admin.php';

    }
}