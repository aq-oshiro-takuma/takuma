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


function getStdin(): string
{
    return trim(fgets(STDIN));
}//標準入力

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
}//壁や掃除した場所に衝突する場合方向転換する関数

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
}//次の掃除場所がどこか調べる関数