<?php
$commentsFile = '../files/comments.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(isset($_POST['name']) ? $_POST['name'] : '');
    $comment = trim(isset($_POST['comment']) ? $_POST['comment'] : '');
    if ($name && $comment) {
        $line = $name . '|' . $comment . '|' . date("Y-m-d H:i:s") . "\n";
        file_put_contents($commentsFile, $line, FILE_APPEND);
    }
}
$comments = [];
if (file_exists($commentsFile)) {
    $fp = fopen($commentsFile, 'r');
    while (($line = fgets($fp)) !== false) {
        $parts = explode('|', trim($line));
        if (count($parts) >= 3) {
            $comments[] = [
                'name' => $parts[0],
                'comment' => $parts[1],
                'date' => $parts[2]
            ];
        }
    }
    fclose($fp);
}
require_once '../templates/header.php';
?>
    <h1>Завдання 3.1: Коментарі</h1>
    <form method="post" action="comments.php">
        <label>Ім’я: <input type="text" name="name" required></label><br><br>
        <label>Коментар:<br>
            <textarea name="comment" rows="4" cols="50" required></textarea>
        </label><br><br>
        <button type="submit">Додати коментар</button>
    </form>
    <hr>
    <h2>Всі коментарі</h2>
<?php if (!empty($comments)): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Ім’я</th>
            <th>Коментар</th>
            <th>Дата</th>
        </tr>
        <?php foreach ($comments as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= htmlspecialchars($c['comment']) ?></td>
                <td><?= htmlspecialchars($c['date']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Коментарів немає.</p>
<?php endif; ?>
<?php
require_once '../templates/footer.php';
?>