<?php
session_start();

$action = isset($_GET['action']) ? $_GET['action'] : '';

//Ініціалізуємо дані для форми з сесії
$formData = array(
    'login'     => isset($_SESSION['login']) ? $_SESSION['login'] : '',
    'password'  => isset($_SESSION['password']) ? $_SESSION['password'] : '',
    'password2' => isset($_SESSION['password2']) ? $_SESSION['password2'] : '',
    'gender'    => isset($_SESSION['gender']) ? $_SESSION['gender'] : '',
    'city'      => isset($_SESSION['city']) ? $_SESSION['city'] : '',
    'games'     => isset($_SESSION['games']) ? $_SESSION['games'] : array(),
    'about'     => isset($_SESSION['about']) ? $_SESSION['about'] : '',
);

$submittedData = null;
$langText = null;

if ($action === 'setLang' && isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('selected_lang', $lang, time() + 180 * 24 * 60 * 60);
    $_COOKIE['selected_lang'] = $lang;
    header("Location: ?task=3");
    exit;
}

$selectedLang = isset($_COOKIE['selected_lang']) ? $_COOKIE['selected_lang'] : 'ukr';
$langText = $selectedLang === 'en' ? 'English' : 'Українська';

if ($action === 'submitForm' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $login    = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2= isset($_POST['password2']) ? $_POST['password2'] : '';
    $gender   = isset($_POST['gender']) ? $_POST['gender'] : '';
    $city     = isset($_POST['city']) ? $_POST['city'] : '';
    $games    = isset($_POST['games']) ? $_POST['games'] : array();
    $about    = isset($_POST['about']) ? $_POST['about'] : '';

    if ($password !== $password2) {
        $_SESSION['password_error'] = "Паролі не співпадають!";
    } else {
        $_SESSION['password_error'] = "Паролі співпадають";
    }

    $photoPath = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $photoName = basename($_FILES['photo']['name']);
        $targetPath = $uploadDir . $photoName;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
            $photoPath = 'uploads/' . $photoName;
        }
    }

    $_SESSION['login']     = $login;
    $_SESSION['password']  = $password;
    $_SESSION['password2'] = $password2;
    $_SESSION['gender']    = $gender;
    $_SESSION['city']      = $city;
    $_SESSION['games']     = $games;
    $_SESSION['about']     = $about;
    $_SESSION['photo']     = $photoPath;
    $_SESSION['lang']      = $langText;

    $submittedData = [
        'login'     => $login,
        'password'  => str_repeat('*', strlen($password)),
        'password2' => str_repeat('*', strlen($password2)),
        'gender'    => $gender,
        'city'      => $city,
        'games'     => $games,
        'about'     => $about,
        'photo'     => $photoPath,
        'lang'      => $langText
    ];

    $formData = $submittedData;

    require_once 'views/Task3finalView.php';
    exit;
}

require_once 'templates/header.php';
require_once 'views/Task3View.php';
require_once 'templates/footer.php';
?>