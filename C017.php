<?php
$parent = trim(fgets(STDIN));
$parent = explode(' ', $parent);

$inputLine = trim(fgets(STDIN));

$children = [];
for ($i = 0; $i < $inputLine; $i++) {
    $children[$i] = trim(fgets(STDIN));
    $children[$i] = explode(' ', $children[$i]);
}

$judg = ['High', 'Low'];
$answer = [];
for ($i = 0; $i < $inputLine; $i++) {
    if ($children[$i][0] < $parent[0]) {
        $answer[$i] = $judg[0];
    } elseif ($children[$i][0] == $parent[0]) {
        if ($children[$i][1] > $parent[1]) {
            $answer[$i] = $judg[0];
        } else {
            $answer[$i] = $judg[1];
        }
    } else {
        $answer[$i] = $judg[1];
    }
}

for ($i = 0; $i < $inputLine; $i++) {
    echo $answer[$i] . PHP_EOL;
}
