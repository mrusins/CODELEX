<?php

namespace App\Services;



use App\Repositories\DBRepository;
use App\Repositories\MySQLRepository;
use App\Repositories\StocksAPIRepository;

class APICurrentToDB
{

    private StocksAPIRepository $api;
    private MySQLRepository $db;
    public function __construct(){
        $this->api = new StocksAPIRepository();
        $this->db = new MySQLRepository();
    }

    public function searchInApi(){
        if(isset($_POST['search'])&& strlen($_POST['search'])>0){
            return $this->api->searchStock($_POST['search']);
        }
    }


}
