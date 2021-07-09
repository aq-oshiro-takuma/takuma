<?php
[$row, $wordNumber] = explode(' ', getStdin());

$string = [];
for ($i = 0; $i < $row; $i++) {
    $string[$i] = getStdin();
}

$word = [];
for ($i = 0; $i < $wordNumber; $i++) {
    $word[$i] = getStdin();
}

for ($i = 0; $i < $wordNumber; $i++) {
    for ($j = 0; $j < $row; $j++) {
        for ($k = 0; $k < $row; $k++) {
            $result = slantingCompare($word[$i], $string, $j, $k);
            if ($result === 1) {
                $answer[$i] = $k + 1 . ' ' . $j + 1;
                break;
            }
        }
    }
}

for ($i = 0; $i < $wordNumber; $i++) {
    echo $answer[$i], PHP_EOL;
}


function getStdin(): string
{
    return trim(fgets(STDIN));
}

function slantingCompare(string $word, array $string, int $x, int $y): int
{
    $len = strlen($word);
    for ($i = 0; $i < $len; $i++) {
        if ($word[$i] !== $string[$x + $i][$y + $i]) {
            return 0;
        }
    }
    return 1;
}