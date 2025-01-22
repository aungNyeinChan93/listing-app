<?php


function recursive ($total, $index = 0, $value = 0) {
    if ($total <= $index) {
        return $value;
    }
    return recursive($total, $index + 1, $value + $index);
};

$test = recursive(10);
echo $test;

function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5);



