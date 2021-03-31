<?php

namespace App\Controllers;

use App\Services\SearchPersonService;



class PersonSearchController
{
    private SearchPersonService $service;

    public function __construct(SearchPersonService $service){
        $this->service=$service;
    }

    public function index()
    {
        $run = $this->service;
        $run->search();
        require_once __DIR__ . '/../View/main.php';
    }
}