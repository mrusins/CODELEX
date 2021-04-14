<?php

namespace App\Services;

use App\Model\Wallet;
use App\Repositories\DBRepository;
use DateTime;
use DateTimeZone;

class BuyStockService
{
    private DBRepository $DBRepository;
    private array $items;
    private bool $isMoneyEnough = true;


    public function __construct(DBRepository $DBRepository)
    {

        $this->DBRepository = $DBRepository;
        $this->items = $this->DBRepository->getMyStocks();


    }
    private function getTime():string{
        $tz = 'Europe/Riga';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        return $dt->format('d.m.Y, H:i:s');
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
            ['starting_price' => $actualPrice, 'total' => $totalAfterBuy, 'created_at'=>$this->getTime()], ['total' => $moneyInWallet, 'buy' => $buy, 'sell' => $sell]) : false;

    }

}