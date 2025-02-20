<?php
require_once 'tasks/Task4.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$results = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'calculate') {
    $x = floatval(isset($_POST['x']) ? $_POST['x'] : 0);
    $y = floatval(isset($_POST['y']) ? $_POST['y'] : 0);

    $results = [
        'pow'       => my_pow($x, $y),
        'sin'       => my_sin($x),
        'cos'       => my_cos($x),
        'tg'        => my_tg($x),
        'factorial' => my_factorial((int)$x)
    ];
}

require_once 'templates/header.php';
require_once 'views/Task4View.php';
require_once 'templates/footer.php';
?>