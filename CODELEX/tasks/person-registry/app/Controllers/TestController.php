<?php

namespace App\Controllers;

use App\Services\SearchPersonService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class TestController
{
    public array $test = [['name'=>'a'],['name'=>'b']];
    private SearchPersonService $service;

    public function __construct(SearchPersonService $service){
        $this->service=$service;
    }

    public function index()
    {
        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $run = $this->service;
        $run->search();

        echo $twig->render('index.twig',['users'=>$run->getSearchResult()]);
    }
}