<?php

namespace App\Controllers;

use App\Services\SearchPersonService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class PersonSearchController
{
    private SearchPersonService $service;

    public function __construct(SearchPersonService $service)
    {
        $this->service = $service;
    }

    public function search(): void
    {
        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader);
        $run = $this->service;
        $run->search();

        echo $twig->render('login.twig', ['users' => $run->getSearchResult(), 'authorize' => $run->authorize(),
            'token' => $run->getToken(), 'getToken' => $run->isTokenInGet()]);
    }


}