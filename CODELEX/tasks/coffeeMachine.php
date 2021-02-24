<?php
print("\033[2J\033[;H");
$wallet = [1 => 10, 2 => 10, 10 => 10, 20 => 10, 50 => 10, 100 => 10, 200 => 10];
$onlyNominals = [];
$priceOfChoosedDrink = 0;
$sumOfInsertedCoins = 0;
$totalinWallet = 0;
$arrayOfChange = [];
$menu = ['Coffee' => 200, 'Tea' => 120, 'Hot Water' => 60];

function countTotal(array $wallet, array &$onlyNominals, int &$totalinWallet): int
{
    $sum = 0;
    foreach ($wallet as $key => $value) {
        $sum += $key * $value;
        array_push($onlyNominals, $key);
    }
    $totalinWallet = $sum;
    return $sum;
}

countTotal($wallet, $onlyNominals, $totalinWallet);

function isMoneyEnought(array $menu, int $totalinWallet): void
{
    foreach ($menu as $name => $price) {
        if ($totalinWallet < $price) {
            exit('Not enough money in your wallet!' . PHP_EOL);
        }
    }

}

isMoneyEnought($menu, $totalinWallet);

function walletInventorization(array $wallet): void
{
    $index = 0;
    foreach ($wallet as $nominal => $count) {
        $index++;
        echo "[$index] nominal EUR " . $nominal / 100 . " quantity " . $count . PHP_EOL;
    }
}

    function printMenu(array $menu, int &$priceOfChoosedDrink): void
    {
        $index = 0;
        foreach ($menu as $key => $value) {
            $index++;
            echo "[$index] " . $key . " EUR " . $value / 100 . PHP_EOL;
        }

    $choice = readline('Enter: ');
    if ($choice != '1' && $choice != '2' && $choice != '3') {
        exit('Wrong choice!' . PHP_EOL);
    } elseif ($choice == 1) {
        $priceOfChoosedDrink = $menu['Coffee'];
    } elseif ($choice == 2) {
        $priceOfChoosedDrink = $menu['Tea'];
    } elseif ($choice == 3) {
        $priceOfChoosedDrink = $menu['Hot Water'];
    }

}

echo 'In your wallet is ' . 'EUR ' . ($totalinWallet / 100) . PHP_EOL;
printMenu($menu, $priceOfChoosedDrink);
var_dump($totalinWallet);


function insertCoins(array &$wallet, int &$sumOfInsertedCoins, int $incertedCoin, array $onlyNominals): void
{
    //TODO: must find shorter solution
//    $localCount = 0;
//    foreach($wallet as $key => $value){
//        if ($incertedCoin == $localCount ){
//            $wallet["$value"] --;
//            $paidForChoosedDrink += $key;
//        }
//        $localCount++;
//}
    if ($incertedCoin == 1 && $wallet['1'] > 0) {
        $wallet['1']--;
        $sumOfInsertedCoins += $onlyNominals[0];
    } elseif ($incertedCoin == 2 && $wallet['2'] > 0) {
        $wallet['2']--;
        $sumOfInsertedCoins += $onlyNominals[1];
    } elseif ($incertedCoin == 3 && $wallet['10'] > 0) {
        $wallet['10']--;
        $sumOfInsertedCoins += $onlyNominals[2];
    } elseif ($incertedCoin == 4 && $wallet['20'] > 0) {
        $wallet['20']--;
        $sumOfInsertedCoins += $onlyNominals[3];
    } elseif ($incertedCoin == 5 && $wallet['50'] > 0) {
        $wallet['50']--;
        $sumOfInsertedCoins += $onlyNominals[4];
    } elseif ($incertedCoin == 6 && $wallet['100'] > 0) {
        $wallet['100']--;
        $sumOfInsertedCoins += $onlyNominals[5];
    } elseif ($incertedCoin == 7 && $wallet['200'] > 0) {
        $wallet['200']--;
        $sumOfInsertedCoins += $onlyNominals[6];
    }
}

function receiveChange(array $onlyNominals, int $change)
{
    $arrayOfChange = [];
    while ($change > 0) {
        for ($i = 0; $i < count($onlyNominals); $i++) {
            if (isset($onlyNominals[$i - 1]) && $onlyNominals[$i - 1] <= $change && $onlyNominals[$i] >= $change) {
                array_push($arrayOfChange, $onlyNominals[$i - 1]);
                $change = $change - $onlyNominals[$i - 1];
            } elseif ($change >= $onlyNominals[6]) {
                array_push($arrayOfChange, $onlyNominals[6]);
                $change = $change - $onlyNominals[6];
            }
        }
    }
    var_dump($change);
    echo 'Take your change: ' . implode(', ', $arrayOfChange);


}

do {
    print("\033[2J\033[;H");
    echo 'In your wallet is ' . 'EUR ' . countTotal($wallet, $onlyNominals, $totalinWallet) / 100 . PHP_EOL . 'Total of inserted: EUR ' . ($sumOfInsertedCoins / 100) . PHP_EOL;

    walletInventorization($wallet);
    $incertedCoin = readline('Enter: ');
    insertCoins($wallet, $sumOfInsertedCoins, $incertedCoin, $onlyNominals);

} while ($sumOfInsertedCoins < $priceOfChoosedDrink);
print("\033[2J\033[;H");

$change = $sumOfInsertedCoins - $priceOfChoosedDrink;

echo 'Enjoy your drink' . PHP_EOL . 'Your change is: EUR ' . ($change / 100) . PHP_EOL .
    'You still have EUR ' . (countTotal($wallet, $onlyNominals, $totalinWallet) + $change) / 100 . PHP_EOL;


while ($change > 0) {
    for ($i = 0; $i < count($onlyNominals); $i++) {
        if (isset($onlyNominals[$i - 1]) && $onlyNominals[$i - 1] <= $change && $onlyNominals[$i] >= $change) {
            array_push($arrayOfChange, $onlyNominals[$i - 1]);
            $change = $change - $onlyNominals[$i - 1];
        } elseif ($change >= $onlyNominals[6]) {
            array_push($arrayOfChange, $onlyNominals[6]);
            $change = $change - $onlyNominals[6];
        }
    }
}
echo 'Take your change: ' . implode(' || ', $arrayOfChange) . PHP_EOL;


