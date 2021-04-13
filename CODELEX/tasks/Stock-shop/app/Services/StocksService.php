<?php

namespace App\Services;


use App\Model\Stock;
use App\Model\Wallet;
use App\Repositories\DBRepository;
use App\Repositories\StocksAPIRepository;

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

    public function buyStocks(int $id, int $count): void
    {
        $moneyInWallet = $this->DBRepository->getLastFromWallet()['total'];
        $buy = null;
        $sell = null;
        $totalAfterBuy = 0;
        $actualPrice = 0;
        foreach ($this->items as $item) {
            if ($item['id'] == $id) {
                $totalAfterBuy = $count + $item['total'];
                $wallet = new Wallet($item['actual_price'], null);
                $buy = $wallet->buy() * $count;
                $sell = $wallet->sell() * $count;
                $item['starting_price'] > $moneyInWallet ? $this->isMoneyEnough = false : false;

                $moneyInWallet = $moneyInWallet - $buy;
                $actualPrice = $item['actual_price'];
            }
        }
        $this->isMoneyEnough == true ? $this->DBRepository->buyStocks(['id' => $id], //TODO
            ['starting_price' => $actualPrice, 'total' => $totalAfterBuy], ['total' => $moneyInWallet, 'buy' => $buy, 'sell' => $sell]) : false;

    }

    public function sellStocks(int $id, int $count): void  //TODO total minus sell
    {
        $moneyInWallet = $this->DBRepository->getLastFromWallet()['total'];
        $buy = null;
        $sell = null;
        $totalAfterSell = 0;
        foreach ($this->items as $item) {
            if ($item['id'] == $id) {
                $totalAfterSell = $item['total'] - $count;
                $wallet = new Wallet(null, $item['starting_price']);
                $buy = $wallet->buy() * $count;
                $sell = $wallet->sell() * $count;
                $moneyInWallet = $moneyInWallet + $sell;
                $item['total'] + $count <= 0 ? $this->isMyStocksEnoughToSell = false : true;

            }
        }
        $this->isMyStocksEnoughToSell == true ? $this->DBRepository->sellStocks(['id' => $id], ['total' => $totalAfterSell],
            ['total' => $moneyInWallet, 'buy' => $buy, 'sell' => $sell]) : false;
    }

    public function isMoneyEnoughToBuy(): bool
    {
        return $this->isMoneyEnough;
    }

    public function isStocksEnoughToSell(): bool
    {
        return $this->isMyStocksEnoughToSell;
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
                array_push($this->actualPricesForAllStocks, [$stock['id'] => $price['c']]); //TODO dzest
                $this->DBRepository->updatePrice(['id' => $stock['id']], ['actual_price' => $price['c']]);
            }
        }

        return $this->actualPricesForAllStocks;

    }

}