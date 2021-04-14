<?php

namespace App\Services;

use App\Model\Wallet;
use App\Repositories\DBRepository;


class SellStockService
{
    private DBRepository $DBRepository;
    private array $items;
    private bool $isMyStocksEnoughToSell = true;


    public function __construct(DBRepository $DBRepository)
    {

        $this->DBRepository = $DBRepository;
        $this->items = $this->DBRepository->getMyStocks();


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

}