<?php
$inputData = trim(fgets(STDIN));
[$date, $buy, $sell] = explode(' ', $inputData);

$profit = 0;
$items = 0;
$cost = [];

for ($i = 0; $i < $date; $i++) {
    $cost[$i] = trim(fgets(STDIN));
}

for ($i = 0; $i < $date - 1; $i++) {
    if ($cost[$i] <= $buy){
        $profit -=$cost[$i];
        $items++;
    }elseif ($cost[$i] >= $sell) {
        $profit +=$cost[$i]*$items;
        $items = 0;
    }
}
$profit +=$cost[$date-1]*$items;

echo $profit . PHP_EOL;