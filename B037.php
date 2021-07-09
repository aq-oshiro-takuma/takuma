<?php
[$month, $day] = explode(' ', getStdin());
$date = sprintf('%02d%02d', $month, $day);
$date = array($date[0], $date[1], $date[2], $date[3]);//文字列を配列にする方法がわからなかったため強引な策
$a = explode(' ', getStdin());
$b = explode(' ', getStdin());
$m = explode(' ', getStdin());

$card = [];
for ($i = 0; $i < 4; $i++) {
    $card[0][$i] = 0;
}//最初の４枚のカードは０固定

for ($i = 1; $i < 10000; $i++) {//一万回回せば必ず出てくる使用
    for ($j = 0; $j < 4; $j++) {
        $card[$i][$j] = randomCreator($card[$i - 1][$j], $a[$j], $b[$j], $m[$j]);
    }

    $result = compareNumber($card[$i], $date);
    if ($result === true) {
        $answer = $i;
        break;
    }
}
echo $answer, PHP_EOL;

/**
 * @return string
 * 標準入力
 */
function getStdin(): string
{
    return trim(fgets(STDIN));
}

/**
 * @param int $prevCard
 * @param int $a
 * @param int $b
 * @param int $m
 * @return int
 * 疑似乱数で乱数を得る関数
 */
function randomCreator(int $prevCard, int $a, int $b, int $m): int
{
    return ($a * $prevCard + $b) % $m;
}

/**
 * @param array $card
 * @param array $date
 * @return bool
 * 引かれたカードの組み合わせが日付になるか比較する関数
 */
function compareNumber(array $card, array $date): bool
{
    $sum = 0;
    foreach ($card as $keyCard => $numCard) {
        foreach ($date as $keyDate => $numDate) {
            if ($numDate == ($numCard) % 10) {
                unset($date[$keyDate]);
                unset($card[$keyCard]);
                $sum++;
                break;
            }
        }
    }
    if ($sum == 4) {
        return true;
    }
    return false;
}