<?php
function getWords($filename) {
    if (!file_exists($filename)) return [];
    $content = file_get_contents($filename);
    return preg_split('/\s+/', trim($content));
}
$words1 = getWords('../files/words1.txt');
$words2 = getWords('../files/words2.txt');

$count1 = array_count_values($words1);
$count2 = array_count_values($words2);

$onlyFirst = array_diff(array_keys($count1), array_keys($count2));
$common = array_intersect(array_keys($count1), array_keys($count2));
$moreThanTwo = [];
foreach ($common as $word) {
    if (($count1[$word] + $count2[$word]) > 2) {
        $moreThanTwo[] = $word;
    }
}

file_put_contents('../files/a.txt', implode(" ", $onlyFirst));
file_put_contents('../files/b.txt', implode(" ", $common));
file_put_contents('../files/c.txt', implode(" ", $moreThanTwo));

$deleteMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteFile'])) {
    $fileToDelete = isset($_POST['fileName']) ? $_POST['fileName'] : '';
    $allowed = ['a.txt', 'b.txt', 'c.txt'];
    if (in_array($fileToDelete, $allowed)) {
        $fullPath = '../files/' . $fileToDelete;
        if (file_exists($fullPath)) {
            unlink($fullPath);
            $deleteMessage = "Файл $fileToDelete успішно видалено.";
        } else {
            $deleteMessage = "Файл $fileToDelete не знайдено.";
        }
    } else {
        $deleteMessage = "Невірне ім'я файлу.";
    }
}
require_once '../templates/header.php';
?>
    <h1>Завдання 3.2: Обробка файлів зі словами</h1>
    <ul>
        <li><strong>a.txt</strong>: <?= htmlspecialchars(file_exists('../files/a.txt') ? file_get_contents('../files/a.txt') : '') ?></li>
        <li><strong>b.txt</strong>: <?= htmlspecialchars(file_exists('../files/b.txt') ? file_get_contents('../files/b.txt') : '') ?></li>
        <li><strong>c.txt</strong>: <?= htmlspecialchars(file_exists('../files/c.txt') ? file_get_contents('../files/c.txt') : '') ?></li>
    </ul>
    <h2>Видалення файлу</h2>
<?php if ($deleteMessage) echo "<p>$deleteMessage</p>"; ?>
    <form method="post" action="process_words.php">
        <label>Введіть ім’я файлу для видалення (a.txt, b.txt або c.txt):
            <input type="text" name="fileName" required>
        </label>
        <button type="submit" name="deleteFile">Видалити файл</button>
    </form>
<?php
require_once '../templates/footer.php';
?>