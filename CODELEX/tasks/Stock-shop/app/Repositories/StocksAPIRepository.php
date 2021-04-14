<?php

namespace App\Repositories;

use App\Repositories\MySQLPersonsRepository;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\Common\Cache\MemcachedCache;

class StocksAPIRepository
{


    private string $token =''; //TODO add your private token
    private MySQLPersonsRepository $sql;

    private array $temp=[];

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
        $this->temp = $data;
        return $data;
    }

    public function cache(){
        $cache = new FilesystemCache('app/Repositories/cache');
       $cache->save('11', [[1,2],[3,4]],  10);

    }

}