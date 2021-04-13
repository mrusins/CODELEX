<?php

namespace App\Repositories;

use App\Model\Stock;
use App\Model\Wallet;

interface DBRepository{
    public function getMyStocks();
    public function buyStocks(array $idNumber, array $plusTotal, array $wallet);
    public function getLastFromWallet();
    public function addFromAPI(Stock $new);
    public function updatePrice(array $idNumber, array $price);


}