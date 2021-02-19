
<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];
echo "Original numeric array: " . PHP_EOL;
$unsortedNumbers = count($numbers);
for($x = 0; $x < $unsortedNumbers; $x++) {
    echo $numbers[$x];
    echo ', ';
}
echo PHP_EOL;
echo "Sorted numeric array: " . PHP_EOL;

sort($numbers);

$sortedNumbers = count($numbers);
for($x = 0; $x < $sortedNumbers; $x++) {
    echo $numbers[$x];
    echo ', ';
}
echo PHP_EOL;


$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

echo "Original words array: " . PHP_EOL;
$unsortedNumbers = count($words);
for($x = 0; $x < $unsortedNumbers; $x++) {
    echo $words[$x];
    echo ', ';
}
echo PHP_EOL;
echo "Sorted words array: " . PHP_EOL;

sort($words);

$sortedNumbers = count($words);
for($x = 0; $x < $sortedNumbers; $x++) {
    echo $words[$x];
    echo ', ';
}
