<?php
$arr = [1,2,3];
$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];
$person2 = new stdClass();
$person2->name = "John2";
$person2->surname = "Doe2";
$person2->age = 5;


$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];


//exercise 1

echo array_sum($arr) ;
echo "\n";

//exercise 2

var_dump($person['name']);

var_dump($person['surname']);

var_dump($person['age']);


//exercise 3

var_dump($person2->name);

var_dump($person2->surname);

var_dump($person2->age);


//exercise 4

echo $items[0][1]['name'] . ' ' . $items[0][1]['surname'] . ' ' . $items[0][1]['age'];
echo "\n";

//exercise 5


echo  $items[0][0]['name'] . ' & ' . $items[0][1]['name'] . ' ' . $items[0][1]['surname']. "'s";