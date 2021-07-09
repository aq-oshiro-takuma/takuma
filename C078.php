<?php
$inputData = trim(fgets(STDIN));
[$date, $buy, $sell] = explode(' ', $inputData);

$profit = 0;
$items = 0;
$cost = [];

for ($i = 0; $i < $date; $i++) {
    $cost[$i] = trim(fgets(STDIN));
}

$tmp = $date - 1;
for ($i = 0; $i < $tmp; $i++) {
    if ($cost[$i] <= $buy) {
        $profit -= $cost[$i];
        $items++;
        continue;
    }
    if ($cost[$i] >= $sell) {
        $profit += $cost[$i] * $items;
        $items = 0;
    }
}
$profit += $cost[$date - 1] * $items;

echo $profit . PHP_EOL;