<?php
$inputWinning = trim(fgets(STDIN));
$inputWinning = explode(' ', $inputWinning);

$inputLine = trim(fgets(STDIN));

$lot = [];
for ($i = 0; $i < $inputLine; $i++) {
    $lot[$i] = trim(fgets(STDIN));
    $lot[$i] = explode(' ', $lot[$i]);
}

$count = array_fill(0, $inputLine, 0);
for ($i = 0; $i < $inputLine; $i++) {
    foreach ($lot[$i] as $match) {
        switch ($match) {
            case $inputWinning[0]:
                $count[$i]++;
                break;
            case $inputWinning[1]:
                $count[$i]++;
                break;
            case $inputWinning[2]:
                $count[$i]++;
                break;
            case $inputWinning[3]:
                $count[$i]++;
                break;
            case $inputWinning[4]:
                $count[$i]++;
                break;
            case $inputWinning[5]:
                $count[$i]++;
                break;
            default:
                break;
        }
    }
}

for ($i = 0; $i < $inputLine; $i++) {
    echo $count[$i] . PHP_EOL;
}