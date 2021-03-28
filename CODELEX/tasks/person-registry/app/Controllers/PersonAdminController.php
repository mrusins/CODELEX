<?php

namespace App\Controllers;

use App\AdminPersonService;

class PersonAdminController
{
    public function index()
    {
        $run = new AdminPersonService($_POST);
        $run->saveDescription();
        require_once __DIR__ . '/../View/admin.php';

    }
}