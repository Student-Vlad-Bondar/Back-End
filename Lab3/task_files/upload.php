<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $message = "Зображення завантажено успішно: <a href='../uploads/$imageName'>$imageName</a>";
        } else {
            $message = "Помилка при завантаженні зображення.";
        }
    } else {
        $message = "Не вибрано файл або сталася помилка.";
    }
}
require_once '../templates/header.php';
?>
    <h1>Завдання 4: Завантаження зображень</h1>
<?php if ($message): ?>
    <p><?= $message ?></p>
<?php endif; ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Виберіть зображення:
            <input type="file" name="image" accept="image/*" required>
        </label><br><br>
        <button type="submit">Завантажити</button>
    </form>
<?php
require_once '../templates/footer.php';
?>