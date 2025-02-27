<?php
session_start();

$fontSize = isset($_COOKIE['fontSize']) ? $_COOKIE['fontSize'] : 'medium';

switch ($fontSize) {
    case 'large': $fontStyle = 'font-size: 24px;'; break;
    case 'small': $fontStyle = 'font-size: 12px;'; break;
    default:      $fontStyle = 'font-size: 16px;'; break;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            <?= $fontStyle ?>;
        }
        .nav {
            margin-bottom: 20px;
        }
        .nav a {
            margin-right: 10px;
            text-decoration: none;
            color: #0066cc;
        }
        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="nav">
    <a href="/Lab3/index.php">Головна</a>
    <a href="/Lab3/task_files/cookie.php">Cookie</a>
    <a href="/Lab3/task_files/auth.php">Авторизація</a>
    <a href="/Lab3/task_files/comments.php">Коментарі</a>
    <a href="/Lab3/task_files/process_words.php">Обробка слів</a>
    <a href="/Lab3/task_files/sort_words.php">Сортування слів</a>
    <a href="/Lab3/task_files/upload.php">Завантаження зображень</a>
    <a href="/Lab3/task_files/create_folder.php">Створення каталогу</a>
    <a href="/Lab3/delete.php">Видалення каталогу</a>
    <?php if(isset($_SESSION['authorized']) && $_SESSION['authorized'] === true): ?>
        <a href="/Lab3/logout.php">Вихід</a>
    <?php endif; ?>
</div>