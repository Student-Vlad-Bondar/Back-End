<?php
$task = isset($_GET['task']) ? $_GET['task'] : '1';

switch ($task) {
    case '1':
        require_once 'controllers/Task1Controller.php';
        break;
    case '2':
        require_once 'controllers/Task2Controller.php';
        break;
    case '3':
        require_once 'controllers/Task3Controller.php';
        break;
    case '4':
        require_once 'controllers/Task4Controller.php';
        break;
    default:
        echo "Невідома задача";
        break;
}
?>