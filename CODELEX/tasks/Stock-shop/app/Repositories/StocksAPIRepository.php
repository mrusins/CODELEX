<?php

namespace App\Repositories;


class StocksAPIRepository
{

    private string $token =''; //TODO add your private token

    public function getNIOCurrentPrice()
    {
        $url = "https://finnhub.io/api/v1/quote?symbol=$this->token";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        return $data['c'];

    }

    public function searchStock(string $apiName): array
    {
        $url = "https://finnhub.io/api/v1/quote?symbol=" . $apiName . "&token=$this->token";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        return $data;
    }

}