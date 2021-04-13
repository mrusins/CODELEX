<?php

namespace App\Controllers;

use App\Services\APICurrentToDB;
use App\Services\StocksService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class StocksController
{
    private StocksService $service;
    private APICurrentToDB $apiToDB;


    public function __construct(StocksService $service)
    {
        $this->service = $service;
        $this->apiToDB = new APICurrentToDB();
    }

    public function updateMyStocks(): string
    {
        $postSearch = '';
        $loader = new FilesystemLoader('templates');
        $twig = new Environment($loader, ['debug' => true,]);
        $run = $this->service;

        if (isset($_POST['actual_price']) && $_POST['actual_price'] > 0) {
            $this->service->addStockFromAPI();
        }
        if (isset($_POST['id'])) {
            $_POST['id'] > 0 && isset($_POST['buy']) && $_POST['buy'] > 0 && $this->service->isMoneyEnoughToBuy() !== false ?
                $run->buyStocks($_POST['id'], $_POST['buy']) : false;
            $_POST['id'] > 0 && isset($_POST['sell']) && $_POST['sell'] > 0 ? $run->sellStocks($_POST['id'], $_POST['sell']) : false;
        }
        if (isset($_POST['search'])) {
            $postSearch = $_POST['search'];
        }
        $run->getMyStocks();
        if (isset($_POST['update_price'])) {
            $run->getMyStocks();
            $run->getActualPriceForMyStocks();
            $run->clearMyStock();
            $run->getMyStocks();
        }

        return $twig->render('index.twig', ['users' => $run->getSearchResult(),
            'checkForMoney' => $this->service->isMoneyEnoughToBuy(), 'search' => $this->apiToDB->searchInApi(),
            'stock_name' => $postSearch, 'wallet' => $this->service->moneyInWallet()]);
    }
}