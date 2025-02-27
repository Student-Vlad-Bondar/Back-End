<?php
if (isset($_GET['font'])) {
    $fontSize = $_GET['font'];
    setcookie('fontSize', $fontSize, time() + 30*24*60*60, '/Lab3');
    setcookie('fontSize', $fontSize, time() + 30*24*60*60);
    $_COOKIE['fontSize'] = $fontSize;
    header("Location: /Lab3/task_files/cookie.php");
    exit;
}
require_once '../templates/header.php';
?>
<div>
    <h1>Завдання 1: Робота з cookie</h1>
    <p>Поточний розмір шрифту: <?= htmlspecialchars(isset($_COOKIE['fontSize']) ? $_COOKIE['fontSize'] : 'medium') ?></p>
    <p>
        <a href="?font=large">Великий шрифт</a>
        <a href="?font=medium">Середній шрифт</a>
        <a href="?font=small">Маленький шрифт</a>
    </p>
</div>
<?php
require_once '../templates/footer.php';
?>