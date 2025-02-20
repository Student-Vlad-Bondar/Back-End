<?php
require_once 'tasks/Task2.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$duplicates = null;
$petName = null;
$arr1 = null;
$arr2 = null;
$mergedProcessed = null;
$assocSorted = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'duplicates':
            $arrString = isset($_POST['arr']) ? $_POST['arr'] : '';
            $arr = array_map('trim', explode(',', $arrString));
            $duplicates = printDuplicates($arr);
            break;

        case 'petName':
            $syllablesString = isset($_POST['syllables']) ? $_POST['syllables'] : '';
            $syllables = array_map('trim', explode(',', $syllablesString));
            $length = intval(isset($_POST['length']) ? $_POST['length'] : 3);
            $petName = generatePetName($syllables, $length);
            break;

        case 'mergeArrays':
            $arr1 = createArray();
            $arr2 = createArray();
            $mergedProcessed = mergeAndProcessArrays($arr1, $arr2);
            break;

        case 'sortAssociative':
            $assocString = isset($_POST['assoc']) ? $_POST['assoc'] : '';
            $sortBy = isset($_POST['sortBy']) ? $_POST['sortBy'] : 'name';

            $assoc = [];
            if (!empty($assocString)) {
                $pairs = explode(',', $assocString);
                foreach ($pairs as $pair) {
                    $parts = explode('=', $pair);
                    if (count($parts) === 2) {
                        $assoc[trim($parts[0])] = (int) trim($parts[1]);
                    }
                }
            }
            sortAssociative($assoc, $sortBy);
            $assocSorted = $assoc;
            break;
    }
}

require_once 'templates/header.php';
require_once 'views/Task2View.php';
require_once 'templates/footer.php';
?>