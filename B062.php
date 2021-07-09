<?php
$inputSeconds = getStdin();
[$height, $width] = explode(' ', getStdin());

$place = [];
$cleanPlace = [];
for ($i = 0; $i < $height; $i++) {
    $place[] = getStdin();

    $cleanPlace[] = array_fill(0, $width, 0);
}//入力と初期化

$sum = 0;
$direction = 0;
$nextCleanPlace = [];
$nextCleanPlace[0] = [0, 0];
for ($i = 0; $i < $inputSeconds; $i++) {
    $x = $nextCleanPlace[$i][0];
    $y = $nextCleanPlace[$i][1];
    $cleanPlace[$x][$y] = 1;

    if ($place[$x][$y] === '#') {
        $sum++;
    }//ここまでが掃除した部屋の処理

    $direction = impact($cleanPlace, $x, $y, $height, $width, $direction);
    $nextCleanPlace[$i + 1] = decideNext($nextCleanPlace[$i], $direction);
    //次の部屋がどこかの処理
}

echo $sum, PHP_EOL;

/**
 * @return string
 *標準入力
 */
function getStdin(): string
{
    return trim(fgets(STDIN));
}

/**
 * @param array $cleanPlace
 * @param int $x
 * @param int $y
 * @param int $height
 * @param int $width
 * @param int $direction
 * @return int
 * 次の掃除場所が壁やすでに掃除した場所と衝突した場合、方向転換する関数
 */
function impact(array $cleanPlace, int $x, int $y, int $height, int $width, int $direction): int
{
    $direction = $direction % 4;
    switch ($direction) {
        case 0:
            $y++;
            break;
        case 1:
            $x++;
            break;
        case 2:
            $y--;
            break;
        case 3:
            $x--;
    }
    if ($x < 0 || $x >= $height || $y < 0 || $y >= $width) {
        return $direction + 1;
    }

    if ($cleanPlace[$x][$y] === 1) {
        return $direction + 1;
    }
    return $direction;
}

/**
 * @param array $prevCleanPlace
 * @param int $direction
 * @return array
 * 次の掃除場所がどこか調べる関数
 */
function decideNext(array $prevCleanPlace, int $direction): array
{
    $direction = $direction % 4;
    switch ($direction) {
        case 0:
            return [$prevCleanPlace[0], $prevCleanPlace[1] + 1];
        case 1:
            return [$prevCleanPlace[0] + 1, $prevCleanPlace[1]];
        case 2:
            return [$prevCleanPlace[0], $prevCleanPlace[1] - 1];
        case 3:
            return [$prevCleanPlace[0] - 1, $prevCleanPlace[1]];
    }
}