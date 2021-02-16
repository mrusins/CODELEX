<?php
//exercise 1

$arr = [1,2,3,4,5,6,7,8,9,10];
foreach ($arr as $num){
    echo "$num" . "\n";
};

//exercise 2

for($x = 0; $x < count($arr); $x++){
    echo $arr[$x] . " ";
}
echo "\n";
//exercise 3

$x=1;
while ($x <= 10) {
    echo "CODELEX \n";
    $x++;
}

//exercise 3

for($x = 0; $x < count($arr); $x++){
    if ($arr[$x] % 3===0){
        echo $arr[$x];
    }
}
echo "\n";

//exercise 4

$superHumans = new stdClass();

$superHumans -> name[] = 'Greta';
$superHumans -> name[] = 'David';
$superHumans -> surname[] = 'Thunberg';
$superHumans -> surname[] = 'Hasselhoff';
$superHumans -> age[] = 15;
$superHumans -> age[] = 68;
$superHumans -> bd[] = 131103;
$superHumans -> bd[] = 170752;

for ($x = 0; $x <count($superHumans->name); $x++){
    echo 'My name is ' . $superHumans->name[$x].' '.$superHumans->surname[$x]. '. I am '
        .$superHumans->age[$x].' and my birthday is '.$superHumans->bd[$x].".\n";
}
//test