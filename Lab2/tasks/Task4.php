<?php
function my_sin($x) {
    return sin($x);
}

function my_cos($x) {
    return cos($x);
}

function my_tg($x) {
    if (cos($x) == 0) {
        return null;
    }
    return sin($x) / cos($x);
}

function my_pow($x, $y) {
    return pow($x, $y);
}

function my_factorial($n) {
    if ($n < 0) return null;
    if ($n <= 1) return 1;
    $res = 1;
    for ($i = 2; $i <= $n; $i++) {
        $res *= $i;
    }
    return $res;
}
?>