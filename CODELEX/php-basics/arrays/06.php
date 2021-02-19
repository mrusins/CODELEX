<?php
system('clear');
$allWords = ['cat', 'dog', 'mouse', 'psihofazatron', 'trololo'];
$random = rand(0, 3);
$chosedWord = [];
$table = [];
$misses = [];
function chooseWord($allWords, $random)
{
    global $chosedWord;
    for ($i = 0; $i < strlen($allWords[$random]); $i++) {
        array_push($chosedWord, $allWords[$random][$i]);

    }
}

chooseWord($allWords, $random);

function drawTable($word)
{
    global $table;
    for ($i = 0; $i < count($word); $i++) {
        array_push($table, "-");
    }
    return $table;
}

drawTable($chosedWord);
echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL . 'Word: ' .   implode(" ", $table) . PHP_EOL;

function checkForLettersInWord($word, $letter, $table)
{
    global $table;
    for ($i = 0; $i < count($word); $i++) {
        if ($word[$i] === $letter) {
            $table[$i] = $letter;
        }
    }
}

function checkMisses($letter, $word)
{
    global $misses;
    if (array_search($letter, $word) === false) {
        array_push($misses, $letter);
    }
}

do {

    $letter = readline("Enter:");
    checkMisses($letter, $chosedWord);
    system('clear');
    checkForLettersInWord($chosedWord, $letter, $table);
    echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL . 'Word: ' .  implode(" ", $table) . PHP_EOL;
    echo 'misses: ' . implode(" ", $misses) . PHP_EOL;

} while ($table != $chosedWord);
echo "BINGO!" . PHP_EOL;
