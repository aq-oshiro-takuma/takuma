<?php
$parent = explode(' ', trim(fgets(STDIN)));

$inputLine = trim(fgets(STDIN));

$children = [];
for ($i = 0; $i < $inputLine; $i++) {
    $children[$i] = explode(' ', trim(fgets(STDIN)));
}

$judg = ['High', 'Low'];
$answer = [];
for ($i = 0; $i < $inputLine; $i++) {
    if ($children[$i][0] < $parent[0]) {
        $answer[$i] = $judg[0];
        continue;
    }
    if ($children[$i][0] > $parent[0]) {
        $answer[$i] = $judg[1];
        continue;
    }

    if($children[$i][1] > $parent[1]){
        $answer[$i] = $judg[0];
        continue;
    }
    $answer[$i] = $judg[1];
}

for ($i = 0; $i < $inputLine; $i++) {
    echo $answer[$i] . PHP_EOL;
}
