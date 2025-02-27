<?php
/*session_start();*/
require_once '../templates/header.php';

if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
    echo "<h1>Добрий день, " . htmlspecialchars($_SESSION['login']) . "!</h1>";
    echo '<p><a href="../logout.php">Вийти</a></p>';
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if ($login === 'Admin' && $password === 'password') {
        $_SESSION['authorized'] = true;
        $_SESSION['login'] = $login;
        header("Location: auth.php");
        exit;
    } else {
        $message = '<div class="message error">Невірний логін або пароль!</div>';
    }
}
?>
    <h1>Завдання 2: Авторизація</h1>
<?= $message ?>
    <form method="post" action="auth.php">
        <label>Логін: <input type="text" name="login" required></label><br><br>
        <label>Пароль: <input type="password" name="password" required></label><br><br>
        <button type="submit">Увійти</button>
    </form>
<?php
require_once '../templates/footer.php';
?>