<?php
$allNumber = [100, 200, -400, 300, 10000];

$total = 0;
for ($i = 0; $i < count($allNumber); $i++) {
    if ($allNumber[$i] > 0) {
        $total += $allNumber[$i];
    }
}

echo strlen((string)$total) . PHP_EOL;