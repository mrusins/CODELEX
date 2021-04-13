<?php

namespace App\Repositories;

use App\Model\Stock;
use App\Model\Wallet;
use Simplon\Mysql\PDOConnector;
use Simplon\Mysql\Mysql;

class MySQLRepository implements DBRepository
{
    private Mysql $dbConn;

    public function __construct()
    {

        $pdo = new PDOConnector(
            'localhost', // server
            'maris',      // user
            '',      // password
            'Stocks'   // database
        );
        $pdoConn = $pdo->connect('utf8', []); // charset, options
        $this->dbConn = new Mysql($pdoConn);
    }

    public function getMyStocks()  //if null returned -> fatal error
    {
        return $result = $this->dbConn->
        fetchRowMany('SELECT * FROM Stocks');

    }
    public function getLastFromWallet():array
    {
        return $result = $this->dbConn->
        fetchRow('SELECT total FROM Wallet where id=(select max(id) from Wallet);');
    }
    public function buyStocks(array $idNumber, array $plusTotal, array $wallet): void
    {
        $this->dbConn->update('Stocks', $idNumber, $plusTotal);
        $this->dbConn->insert('Wallet', $wallet);
    }
    public function sellStocks(array $idNumber, array $minusTotal, array $wallet): void
    {
        $this->dbConn->update('Stocks', $idNumber, $minusTotal);
        $this->dbConn->insert('Wallet', $wallet);
    }


    public function updatePrice(array $idNumber, array $price): void
    {
        $this->dbConn->update('Stocks', $idNumber, $price);

    }

    public function addCurrentPrice(array $new): void
    {
        $this->dbConn->insert('Stocks', $new);

    }
    public function addFromAPI(Stock $new): void
    {
        $this->dbConn->insert('Stocks', ['name'=>$new->name,'actual_price'=>$new->actualPrice,'starting_price'=>$new->startingPrice,
            'final_price'=>$new->finalPrice,'total'=>$new->total]);

    }

}