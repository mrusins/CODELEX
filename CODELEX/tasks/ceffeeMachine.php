<?php
print("\033[2J\033[;H");
$test = 0;
$wallet = [1 => 10, 2 => 10, 10 => 10, 20 => 10, 50 => 10, 100 => 10, 200 => 10];
$onlyNominals = [];
$priceOfChoosedDrink = 0;
$paidForChoosedDrink = 0;
$menu = ['Coffee' => 200, 'Tea' => 120, 'Hot Water' => 60];


function countTotal(array $wallet, array &$onlyNominals): int
{
    $sum = 0;
    foreach ($wallet as $key => $value) {
        $sum += $key * $value;
        array_push($onlyNominals,$key );
    }
    return $sum;
}

function walletInventorization (array $wallet): void{
    $index = 0;
    foreach ($wallet as $nominal => $count){
        $index++;
        echo "[$index] nominal EUR " . $nominal/100 . " quantity " . $count . PHP_EOL;
    }
}

function printMenu (array $menu, int &$priceOfChoosedDrink): void{
    $index = 0;
    foreach ($menu as $key => $value){
        $index++;
        echo "[$index] " . $key . " EUR " . $value/100 . PHP_EOL;
    }
    $choice = readline('Enter: ');
    if ($choice == 1){
        $priceOfChoosedDrink = $menu['Coffee'];
    } if ($choice == 2){
        $priceOfChoosedDrink = $menu['Tea'];
    } if ($choice == 3){
        $priceOfChoosedDrink = $menu['Hot Water'];
    }

}
printMenu($menu, $priceOfChoosedDrink);


print("\033[2J\033[;H");


var_dump($priceOfChoosedDrink);

function insertCoins (&$wallet, &$paidForChoosedDrink, $incertedCoin, $onlyNominals)
{
    if ($incertedCoin == 1) {
        $wallet['1']--;
        $paidForChoosedDrink += $onlyNominals[0];
    } elseif ($incertedCoin == 2) {
        $wallet['2']--;
        $paidForChoosedDrink += $onlyNominals[1];
    } elseif ($incertedCoin == 3) {
        $wallet['10']--;
        $paidForChoosedDrink += $onlyNominals[2];
    } elseif ($incertedCoin == 4) {
        $wallet['20']--;
        $paidForChoosedDrink += $onlyNominals[3];
    } elseif ($incertedCoin == 5) {
        $wallet['50']--;
        $paidForChoosedDrink += $onlyNominals[4];
    } elseif ($incertedCoin == 6) {
        $wallet['100']--;
        $paidForChoosedDrink += $onlyNominals[5];
    } elseif ($incertedCoin == 7) {
        $wallet['200']--;
        $paidForChoosedDrink += $onlyNominals[6];
    }
}
do {
    print("\033[2J\033[;H");
    echo 'In your wallet is '. 'EUR ' . countTotal($wallet, $onlyNominals)/100  . PHP_EOL;
    walletInventorization ($wallet);
    $incertedCoin = readline('Enter: ');
    insertCoins ($wallet, $paidForChoosedDrink, $incertedCoin, $onlyNominals);

} while ($paidForChoosedDrink < $priceOfChoosedDrink);
print("\033[2J\033[;H");

$change = $paidForChoosedDrink - $priceOfChoosedDrink;

echo 'Enjoy your drink' . PHP_EOL . 'Your change is: EUR ' . ($change/100) . PHP_EOL .
    'You still have EUR ' . (countTotal($wallet, $onlyNominals)+$change)/100 . PHP_EOL;


