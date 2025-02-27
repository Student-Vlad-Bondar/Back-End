<?php
$wordsFile = '../files/words.txt';
$sortedWordsFile = '../files/sorted_words.txt';
$message = '';
$unsortedWords = '';

if (file_exists($wordsFile)) {
    $content = file_get_contents($wordsFile);
    $words = preg_split('/\s+/', trim($content));
    $unsortedWords = implode(" ", $words);
    sort($words, SORT_STRING | SORT_FLAG_CASE);

    file_put_contents($sortedWordsFile, implode(" ", $words));
    $message = "Слова відсортовано за алфавітом та збережено в файлі 'sorted_words.txt'.";
} else {
    $message = "Файл не знайдено.";
}

require_once '../templates/header.php';
?>
    <h1>Завдання 3.3: Сортування слів</h1>
    <p><?= htmlspecialchars($message) ?></p>

    <h2>Не відсортовані слова:</h2>
    <p><?= htmlspecialchars($unsortedWords) ?></p>

    <h2>Відсортовані слова:</h2>
    <p><?= htmlspecialchars(implode(" ", $words)) ?></p>
<?php
require_once '../templates/footer.php';
?>