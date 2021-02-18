<?php

$employee = [
    $employee1 = new stdClass(),
    $employee2 = new stdClass(),
    $employee3 = new stdClass(),
    $employee4 = new stdClass(),
    $employee5 = new stdClass(),
];

$employee1->basePay = 7.5;
$employee1->hours = 35;
$employee1->name = "Mark";

$employee2->basePay = 9;
$employee2->hours = 66;
$employee2->name = "Maya";

$employee3->basePay = 10;
$employee3->hours = 50;
$employee3->name = "John";

$employee4->basePay = 10;
$employee4->hours = 30;
$employee4->name = "Elan";

$employee5->basePay = 10;
$employee5->hours = 50;
$employee5->name = "Maris";


for ($i = 0; $i < count($employee); $i++) {

    $total = $employee[$i]->hours * $employee[$i]->basePay;

    $extra = (($employee[$i]->hours - 40) * $employee[$i]->basePay) * 1.5;

    $totalAndExtra = $total + $extra;


    if ($employee[$i]->basePay < 8.0) {
        echo "too low salary for " . $employee[$i]->name . PHP_EOL;
    } else if ($employee[$i]->hours > 60) {
        echo "too many hours for " . $employee[$i]->name . PHP_EOL;
    } else if ($employee[$i]->hours <= 40) {
        echo $employee[$i]->name . ", your salary for this week is " . $total . PHP_EOL;
    } else if ($employee[$i]->hours > 40) {
        echo $employee[$i]->name . ", your salary for this week is " . $totalAndExtra . PHP_EOL;
    }
}


