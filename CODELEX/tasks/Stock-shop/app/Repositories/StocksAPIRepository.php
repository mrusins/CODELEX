<?php

namespace App\Repositories;


class StocksAPIRepository
{

    public function getNIOCurrentPrice()
    {
        $url = 'https://finnhub.io/api/v1/quote?symbol=NIO&token=c1mnur237fkpnsp61f6g';
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        return $data['c'];
    }

    public function searchStock(string $apiName): array
    {
        $url = "https://finnhub.io/api/v1/quote?symbol=" . $apiName . "&token=c1mnur237fkpnsp61f6g";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        return $data;
    }

}