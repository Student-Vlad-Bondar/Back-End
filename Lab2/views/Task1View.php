<h1>Task 1: Робота з рядками</h1>

<form method="post" action="?task=1&action=replace">
    <h3>Заміна символів</h3>
    <label>Текст: <input type="text" name="text" value="<?= htmlspecialchars(isset($_POST['text']) ? $_POST['text'] : '') ?>"></label>
    <label>Знайти: <input type="text" name="find" value="<?= htmlspecialchars(isset($_POST['find']) ? $_POST['find'] : '') ?>"></label>
    <label>Замінити: <input type="text" name="replace" value="<?= htmlspecialchars(isset($_POST['replace']) ? $_POST['replace'] : '') ?>"></label>
    <button type="submit">Замінити</button>
</form>

<?php if (isset($replaceResult)): ?>
    <p><strong>Результат:</strong> <?= htmlspecialchars($replaceResult) ?></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=1&action=sortCities">
    <h3>Сортування назв міст</h3>
    <label>Введіть назви міст (через пробіл):<br>
        <input type="text" name="cities" size="50" value="<?= htmlspecialchars(isset($_POST['cities']) ? $_POST['cities'] : '') ?>">
    </label>
    <button type="submit">Сортувати</button>
</form>
<?php if (isset($sortedCities)): ?>
    <p>Відсортовані міста: <?= htmlspecialchars($sortedCities) ?></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=1&action=getFileName">
    <h3>Отримати ім'я файлу без розширення</h3>
    <label>Шлях до файлу:
        <input type="text" name="path" value="<?= htmlspecialchars(isset($_POST['path']) ? $_POST['path'] : '') ?>">
    </label>
    <button type="submit">Отримати</button>
</form>
<?php if (isset($fileNameNoExt)): ?>
    <p>Ім'я файлу: <?= htmlspecialchars($fileNameNoExt) ?></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=1&action=daysBetween">
    <h3>Кількість днів між двома датами (формат дд-мм-рррр)</h3>
    <label>Дата 1: <input type="text" name="date1" value="<?= htmlspecialchars(isset($_POST['date1']) ? $_POST['date1'] : '') ?>"></label>
    <label>Дата 2: <input type="text" name="date2" value="<?= htmlspecialchars(isset($_POST['date2']) ? $_POST['date2'] : '') ?>"></label>
    <button type="submit">Обчислити</button>
</form>
<?php if (isset($daysDiff)): ?>
    <p>Кількість днів: <?= $daysDiff ?></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=1&action=generatePassword">
    <h3>Генератор паролів</h3>
    <label>Довжина пароля:
        <input type="number" name="passLength" value="<?= htmlspecialchars(isset($_POST['passLength']) ? $_POST['passLength'] : 8) ?>">
    </label>
    <button type="submit">Згенерувати</button>
</form>
<?php if (isset($generatedPassword)): ?>
    <p>Згенерований пароль: <?= htmlspecialchars($generatedPassword) ?></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=1&action=checkPassword">
    <h3>Перевірка міцності пароля</h3>
    <label>Пароль: <input type="text" name="checkPass" value="<?= htmlspecialchars(isset($_POST['checkPass']) ? $_POST['checkPass'] : '') ?>"></label>
    <button type="submit">Перевірити</button>
</form>
<?php if (isset($isStrong)): ?>
    <p>Пароль <?= $isStrong ? 'достатньо міцний' : 'занадто слабкий' ?></p>
<?php endif; ?>