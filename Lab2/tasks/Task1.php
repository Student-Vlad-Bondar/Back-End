<?php
function replaceCharacters($text, $find, $replace) {
    return str_replace($find, $replace, $text);
}

function sortCities($citiesString) {
    $citiesArray = explode(' ', $citiesString);
    sort($citiesArray, SORT_STRING);
    return implode(' ', $citiesArray);
}

function getFileNameWithoutExt($path) {
    return pathinfo($path, PATHINFO_FILENAME);
}

function daysBetweenDates($date1, $date2) {
    $format = 'd-m-Y';
    $datetime1 = DateTime::createFromFormat($format, $date1);
    $datetime2 = DateTime::createFromFormat($format, $date2);

    if ($datetime1 && $datetime2) {
        $interval = $datetime1->diff($datetime2);
        return $interval->days;
    }
    return null;
}

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

function isStrongPassword($password) {
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/\d/', $password)) return false;
    if (!preg_match('/\W/', $password)) return false;

    return true;
}
?>