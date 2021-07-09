<?php
$inputRow = trim(fgets(STDIN));
$inputTitle = trim(fgets(STDIN));
$inputTitle = explode(" ", $inputTitle);

$maxLength = [];
for ($i = 0; $i < $inputRow; $i++) {
    $maxLength[$i] = strlen($inputTitle[$i]);
}

$inputLine = trim(fgets(STDIN));
$inputData = [];
for ($i = 0; $i < $inputLine; $i++) {
    $inputData[$i] = trim(fgets(STDIN));
    $inputData[$i] = explode(" ", $inputData[$i]);
}

for ($i = 0; $i < $inputLine; $i++) {
    for ($j = 0; $j < $inputRow; $j++) {
        $length = strlen($inputData[$i][$j]);
        if ($maxLength[$j] <= $length) {
            $maxLength[$j] = $length;
        }
    }
}

$outputTitle = [];
for ($i = 0; $i < $inputRow; $i++) {
    $outputTitle[$i] = $inputTitle[$i] . str_repeat(' ', $maxLength[$i] - strlen($inputTitle[$i]));
}
$outputTitle = '| ' . implode(' | ', $outputTitle) . ' |';

$outputCut = [];
for ($i = 0; $i < $inputRow; $i++) {
    $outputCut[$i] = str_repeat('-', $maxLength[$i]);
}
$outputCut = '|-' . implode('-|-', $outputCut) . '-|';

$outputData = [];
for ($i = 0; $i < $inputLine; $i++) {
    for ($j = 0; $j < $inputRow; $j++) {
        $outputData[$i][$j] = $inputData[$i][$j] . str_repeat(' ', $maxLength[$j] - strlen($inputData[$i][$j]));
    }
    $outputData[$i] = '| ' . implode(' | ', $outputData[$i]) . ' |';
}

echo $outputTitle . PHP_EOL;
echo $outputCut . PHP_EOL;
for ($i = 0; $i < $inputLine; $i++) {
    echo $outputData[$i] . PHP_EOL;
}