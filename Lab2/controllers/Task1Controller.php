<?php
require_once 'tasks/Task1.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$replaceResult = null;
$sortedCities = null;
$fileNameNoExt = null;
$daysDiff = null;
$generatedPassword = null;
$isStrong = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'replace':
            $text = isset($_POST['text']) ? $_POST['text'] : '';
            $find = isset($_POST['find']) ? $_POST['find'] : '';
            $replace = isset($_POST['replace']) ? $_POST['replace'] : '';
            $replaceResult = replaceCharacters($text, $find, $replace);
            break;

        case 'sortCities':
            $cities = isset($_POST['cities']) ? $_POST['cities'] : '';
            $sortedCities = sortCities($cities);
            break;

        case 'getFileName':
            $path = isset($_POST['path']) ? $_POST['path'] : '';
            $fileNameNoExt = getFileNameWithoutExt($path);
            break;

        case 'daysBetween':
            $date1 = isset($_POST['date1']) ? $_POST['date1'] : '';
            $date2 = isset($_POST['date2']) ? $_POST['date2'] : '';
            $daysDiff = daysBetweenDates($date1, $date2);
            break;

        case 'generatePassword':
            $passLength = intval(isset($_POST['passLength']) ? $_POST['passLength'] : 8);
            $generatedPassword = generatePassword($passLength);
            break;

        case 'checkPassword':
            $checkPass = isset($_POST['checkPass']) ? $_POST['checkPass'] : '';
            $isStrong = isStrongPassword($checkPass);
            break;
    }
}

require_once 'templates/header.php';
require_once 'views/Task1View.php';
require_once 'templates/footer.php';
?>