<?php
$message = '';
$usersFile = 'files/users.json';
/*$folder = 'users/';
echo "<pre>" . file_get_contents($folder) . "</pre>";
echo realpath('users/');
exit;*/
function deleteFolder($folder) {
    if (!is_dir($folder)) return;
    $files = array_diff(scandir($folder), ['.', '..']);
    foreach ($files as $file) {
        $path = "$folder/$file";
        is_dir($path) ? deleteFolder($path) : unlink($path);
    }
    rmdir($folder);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(isset($_POST['login']) ? $_POST['login'] : '');
    $password = trim(isset($_POST['password']) ? $_POST['password'] : '');

    if ($login && $password) {
        if (!file_exists($usersFile)) {
            $message = "Користувачів ще не існує!";
        } else {
            $users = json_decode(file_get_contents($usersFile), true);
            if (isset($users[$login]) && password_verify($password, $users[$login])) {
                $folder = 'users/' . $login;
                if (is_dir($folder)) {
                    deleteFolder($folder);
                    unset($users[$login]);
                    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
                    $message = "Папку $login видалено успішно!";
                } else {
                    $message = "Папки не існує!";
                }
            } else {
                $message = "Невірний логін або пароль!";
            }
        }
    } else {
        $message = "Введіть логін та пароль!";
    }
}

require_once 'templates/header.php';
?>
    <h1>Завдання 5.2: Видалення каталогу користувача</h1>
<?php if ($message) echo "<p>$message</p>"; ?>
    <form method="post" action="/Lab3/delete.php">
        <label>Логін: <input type="text" name="login" required></label><br><br>
        <label>Пароль: <input type="password" name="password" required></label><br><br>
        <button type="submit">Видалити папку</button>
    </form>
<?php
require_once 'templates/footer.php';
?>