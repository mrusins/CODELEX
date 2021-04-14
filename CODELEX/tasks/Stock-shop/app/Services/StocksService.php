<?php

namespace App\Services;


use App\Model\Stock;
use App\Model\Wallet;
use App\Repositories\DBRepository;
use App\Repositories\StocksAPIRepository;
use DateTime;
use DateTimeZone;

class StocksService
{

    private array $searchResults = [];
    private array $actualPricesForAllStocks = [];
    private DBRepository $DBRepository;
    private array $items;
    private bool $isMoneyEnough = true;
    private bool $isMyStocksEnoughToSell = true;

    public function __construct(DBRepository $DBRepository)
    {

        $this->DBRepository = $DBRepository;
        $this->items = $this->DBRepository->getMyStocks();
    }

    public function getMyStocks(): void
    {
        array_push($this->searchResults, $this->DBRepository->getMyStocks());
    }

    public function clearMyStock(): void
    {
        $this->searchResults = [];
    }

    public function getSearchResult(): array
    {
        return $this->searchResults;
    }

    public function addStockFromAPI(): void
    {
        $name = $_POST['stock_name'];
        $actualPrice = floatval($_POST['actual_price']);
        $startingPrice = floatval($_POST['actual_price']);
        $stock = new Stock($name, $actualPrice, 0, $startingPrice, 0);
        $this->DBRepository->addFromAPI($stock);

    }


    public function isMoneyEnoughToBuy(): bool
    {
        return $this->isMoneyEnough;
    }


    public function moneyInWallet(): float
    {
        return round($this->DBRepository->getLastFromWallet()['total'], 2);
    }

    public function getActualPriceForMyStocks(): array
    {
        $api = new StocksAPIRepository();


        foreach ($this->searchResults as $stocks) {
            foreach ($stocks as $stock) {
                $price = $api->searchStock($stock['name']);
                array_push($this->actualPricesForAllStocks, [$stock['id'] => $price['c']]);
                $this->DBRepository->updatePrice(['id' => $stock['id']], ['actual_price' => $price['c']]);
            }
        }
        $api->cache(); //TODO

        return $this->actualPricesForAllStocks;

    }

}