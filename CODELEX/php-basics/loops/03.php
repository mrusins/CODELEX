<?php

$word1 = readline('Enter first:');
$word2 = readline('Enter second:');
$wordLengthSum = 30-abs(strlen($word1)+strlen(@$word2));

echo $word1;
for($i = 0; $i < $wordLengthSum; $i++) {
    echo '.';
}
echo $word2 . PHP_EOL;
