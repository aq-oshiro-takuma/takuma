<?php
$inputData = trim(fgets(STDIN));
[$grass, $rabbit, $jump] = explode(" ", $inputData);
$weed = array_fill(0, $grass, 0);

for ($i = 0; $i < $rabbit; $i++) {
    $rabbitNumber[$i] = trim(fgets(STDIN)) - 1;
    $weed[$rabbitNumber[$i]] = 1;
}

for ($i = 0; $i < $jump; $i++) {
    for ($j = 0; $j < $rabbit; $j++) {
        for ($k = 1; $k < $grass; $k++) {
            $target = ($rabbitNumber[$j] + $k) % $grass;
            echo $target . PHP_EOL;
            if ($weed[$target] === 0) {
                $weed[$target] = 1;
                $weed[$rabbitNumber[$j]] = 0;
                break;
            }
        }
        $rabbitNumber[$j] = $target;
    }
}

for ($i = 0; $i < $rabbit; $i++) {
    echo $rabbitNumber[$i] + 1 . PHP_EOL;
}
