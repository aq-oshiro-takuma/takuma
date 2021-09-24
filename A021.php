<?php
[$height, $width] = explode(' ', getStdin());

$world = [];

$world[0] = str_repeat('.', $width + 2);
for ($i = 1; $i <= $height; $i++) {
    $world[$i] = '.' . getStdin() . '.';
}
$world[$height + 1] = str_repeat('.', $width + 2);

$worldCopy = $world;

$lands = [];
$area = [];
$length = [];
$count = [0, 0];

for ($i = 1; $i <= $height; $i++) {
    for ($j = 1; $j <= $width; $j++) {
        $temp = countLand($i, $j, $count);
        if ($temp[0] > 0) {
            $lands[] = $temp;
            $area[] = $temp[0];
            $length[] = $temp[1];
        }
    }
}

array_multisort($area, SORT_DESC, SORT_NUMERIC, $length, SORT_DESC, SORT_NUMERIC, $lands);

foreach ($lands as $land) {
    echo $land[0] . ' ' . $land[1] . PHP_EOL;
}

/**
 * 標準入力を行う関数
 *
 * @return string
 */
function getStdin(): string
{
    return trim(fgets(STDIN));
}

/**
 * 陸地の面積と海岸線の長さを図る再起関数
 *
 * @param int $x
 * @param int $y
 * @param array $count
 * @return array
 */
function countLand(int $x, int $y, array $count): array
{
    global $worldCopy;
    if ($worldCopy[$x][$y] === '.') {
        $count[1]++;

        global $world;
        if ($worldCopy[$x][$y] !== $world[$x][$y]) {
            $count[1]--;
        }

        return $count;
    } else {
        $worldCopy[$x][$y] = '.';

        $count[0]++;

        return countLand($x, $y - 1, countLand($x - 1, $y, countLand($x, $y + 1, countLand($x + 1, $y, $count))));
    }
}