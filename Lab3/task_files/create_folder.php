<?php
$message = '';
function saveUser($login, $password) {
    $usersFile = '../files/users.json';

    if (!file_exists($usersFile)) {
        file_put_contents($usersFile, json_encode([], JSON_PRETTY_PRINT));
    }
    $users = json_decode(file_get_contents($usersFile), true);
    if (!isset($users[$login])) {
        $users[$login] = password_hash($password, PASSWORD_DEFAULT);
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim(isset($_POST['login']) ? $_POST['login'] : '');
    $password = trim(isset($_POST['password']) ? $_POST['password'] : '');
    if ($login && $password) {
        $folder = '../users/' . $login;
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
            mkdir($folder . '/video', 0777, true);
            mkdir($folder . '/music', 0777, true);
            mkdir($folder . '/photo', 0777, true);
            file_put_contents($folder . '/video' . '/for_video.txt', "Інфориація про video");
            file_put_contents($folder . '/music' . '/for_music.txt', "Інфориація про music");
            file_put_contents($folder . '/photo' . '/for_photo.txt', "Інфориація про photo");
            file_put_contents($folder . '/README.txt', "Це папка користувача $login");
            saveUser($login, $password);
            $message = "Папку створено успішно!";
        } else {
            $message = "Папка з логіном $login вже існує!";
        }
    } else {
        $message = "Введіть логін та пароль!";
    }
}
require_once '../templates/header.php';
?>
    <h1>Завдання 5.1: Створення каталогу користувача</h1>
<?php if ($message) echo "<p>$message</p>"; ?>
    <form method="post" action="create_folder.php">
        <label>Логін: <input type="text" name="login" required></label><br><br>
        <label>Пароль: <input type="password" name="password" required></label><br><br>
        <button type="submit">Створити папку</button>
    </form>
<?php
require_once '../templates/footer.php';
?>