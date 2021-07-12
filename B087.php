<?php
[$height, $width, $keta] = explode(' ', trim(fgets(STDIN)));

$pixel = [];
for ($i = 0; $i < $height; $i++) {
    $pixel[$i] = trim(fgets(STDIN));
}

$max = 0;

$loopWidth = $width - $keta + 1;
for ($i = 0; $i < $height; $i++) {
    for ($j = 0; $j < $loopWidth; $j++) {
        $compare = $pixel[$i][$j];
        for ($k = 1; $k < $keta; $k++) {
            $compare = $compare . $pixel[$i][$j + $k];
        }
        if ($max < $compare) {
            $max = $compare;
        }
    }
}

$loopHeigth = $height - $keta + 1;
for ($i = 0; $i < $width; $i++) {
    for ($j = 0; $j < $loopHeigth; $j++) {
        $compare = $pixel[$j][$i];
        for ($k = 1; $k < $keta; $k++) {
            $compare = $compare . $pixel[$j + $k][$i];
        }
        if ($max < $compare) {
            $max = $compare;
        }
    }
}

echo $max . PHP_EOL;