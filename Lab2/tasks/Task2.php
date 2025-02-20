<?php
function printDuplicates($arr) {
    $counts = array_count_values($arr);
    $duplicates = [];
    foreach ($counts as $value => $count) {
        if ($count > 1) {
            $duplicates[] = $value;
        }
    }
    return $duplicates;
}

function generatePetName($syllables, $length = 3) {
    $name = '';
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, count($syllables) - 1);
        $name .= $syllables[$randomIndex];
    }
    return ucfirst($name);
}

function createArray() {
    $length = rand(3, 7);
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $arr[] = rand(10, 20);
    }
    return $arr;
}

function mergeAndProcessArrays($arr1, $arr2) {
    $merged = array_merge($arr1, $arr2);
    $unique = array_unique($merged);
    sort($unique);
    return $unique;
}

function sortAssociative(&$arr, $by = 'name') {
    if ($by === 'name') {
        ksort($arr);
    } elseif ($by === 'age') {
        asort($arr);
    }
}
?>