<?php
$inputWinning = explode(' ', trim(fgets(STDIN)));

$inputLine = trim(fgets(STDIN));

$lot = [];
for ($i = 0; $i < $inputLine; $i++) {
    $lot[$i] = explode(' ', trim(fgets(STDIN)));
}

$count = array_fill(0, $inputLine, 0);
for ($i = 0; $i < $inputLine; $i++) {
    foreach ($lot[$i] as $match) {
        switch ($match) {
            case $inputWinning[0]:
            case $inputWinning[1]:
            case $inputWinning[2]:
            case $inputWinning[3]:
            case $inputWinning[4]:
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