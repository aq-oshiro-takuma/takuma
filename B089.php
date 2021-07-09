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
    for ($startY = 0; $startY < $row; $startY++) {
        for ($startX = 0; $startX < $row; $startX++) {
            $result = slantingCompare($word[$i], $string, $startY, $startX);
            if ($result === 1) {
                $answer[$i] = $startX + 1 . ' ' . $startY + 1;
                break;
            }
        }
    }
}

for ($i = 0; $i < $wordNumber; $i++) {
    echo $answer[$i], PHP_EOL;
}

/**
 * @return string
 * 標準入力を行う関数
 */
function getStdin(): string
{
    return trim(fgets(STDIN));
}

/**
 * @param string $word
 * @param array $string
 * @param int $x
 * @param int $y
 * @return int
 * $x,$yをスタート位置としその地点から斜め右下に読み進めたとき、$wordと同じ文字列になれば１を返す関数
 */
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