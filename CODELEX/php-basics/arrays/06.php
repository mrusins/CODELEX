<?php
//system('clear');
$allWords = ['cat', 'dog', 'mouse', 'psihofazatron', 'greta'];
$random = rand(0, 3);
$chosedWord = [];
$table = [];
$misses = [];

function chooseWord(array $allWords, int $random, array $chosedWord):array
{
    $tempArray = [];
    for ($i = 0; $i < strlen($allWords[$random]); $i++) {
        array_push($tempArray, $allWords[$random][$i]);
    }
    $chosedWord = $tempArray;
    return $chosedWord;
}
$chosedWord = chooseWord($allWords, $random, $chosedWord);

function drawTable($word, $table)
{
    $tempArray = [];
    for ($i = 0; $i < count($word); $i++) {
        array_push($tempArray, "-");
    }
    $table = $tempArray;
    return $table;
}

$table = drawTable($chosedWord, $table);
echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL . 'Word: ' . implode(" ", $table) . PHP_EOL . "misses: " . PHP_EOL;

function checkForLettersInWord($chosedWord, $letter, $table)
{
    $tempArray = $table;
    for ($i = 0; $i < count($chosedWord); $i++) {
        if ($chosedWord[$i] === $letter) {
            $tempArray[$i] = $letter;
        }
    }
    $table = $tempArray;
    return $table;
}

function checkMisses($letter, $word, $misses)
{
    $localArray = $misses;
    if (array_search($letter, $word) === false) {
        array_push($localArray, $letter);
    }
    $misses = $localArray;
    return $misses;
}

do {
    $letter = readline("Enter:");
    $misses = checkMisses($letter, $chosedWord, $misses);
//    system('clear');
    $table = checkForLettersInWord($chosedWord, $letter, $table);
    echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL . 'Word: ' . implode(" ", $table) . PHP_EOL;
    echo 'misses: ' . implode(" ", $misses) . PHP_EOL;
} while ($table != $chosedWord);
echo "BINGO!" . PHP_EOL;
