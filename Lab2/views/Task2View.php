<h1>Task 2: Робота з масивами</h1>

<form method="post" action="?task=2&action=duplicates">
    <h3>Елементи масиву, що повторюються</h3>
    <p>Введіть числа через кому (наприклад: "1,2,3,2,4,5"):</p>
    <input type="text" name="arr" value="<?= htmlspecialchars(isset($_POST['arr']) ? $_POST['arr'] : '') ?>">
    <button type="submit">Знайти дублікати</button>
</form>
<?php if (isset($duplicates)): ?>
    <?php if (empty($duplicates)): ?>
        <p>Немає дублікатів.</p>
    <?php else: ?>
        <p>Повторюються: <?= implode(', ', $duplicates) ?></p>
    <?php endif; ?>
<?php endif; ?>

<hr>

<form method="post" action="?task=2&action=petName">
    <h3>Генератор імен</h3>
    <p>Введіть склади через кому (наприклад "mi,ko,ru,ta,chi"):</p>
    <input type="text" name="syllables" value="<?= htmlspecialchars(isset($_POST['syllables']) ? $_POST['syllables'] : '') ?>">
    <label>Кількість складів:
        <input type="number" name="length" value="<?= htmlspecialchars(isset($_POST['length']) ? $_POST['length'] : 3) ?>">
    </label>
    <button type="submit">Згенерувати</button>
</form>
<?php if (isset($petName)): ?>
    <p>Згенероване ім'я: <strong><?= htmlspecialchars($petName) ?></strong></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=2&action=mergeArrays">
    <h3>З’єднати 2 випадкових масиви</h3>
    <button type="submit">Створити і об’єднати</button>
</form>
<?php if (isset($arr1, $arr2, $mergedProcessed)): ?>
    <p>Масив 1: <?= implode(', ', $arr1) ?></p>
    <p>Масив 2: <?= implode(', ', $arr2) ?></p>
    <p>Результат: <?= implode(', ', $mergedProcessed) ?></p>
<?php endif; ?>

<hr>

<form method="post" action="?task=2&action=sortAssociative">
    <h3>Сортування асоціативного масиву</h3>
    <p>Формат: "Petro=25,Ivan=30,Andriy=22"</p>
    <input type="text" name="assoc" value="<?= htmlspecialchars(isset($_POST['assoc']) ? $_POST['assoc'] : '') ?>">
    <label>Сортувати за:
        <select name="sortBy">
            <option value="name">Ім’ям</option>
            <option value="age">Віком</option>
        </select>
    </label>
    <button type="submit">Сортувати</button>
</form>
<?php if (isset($assocSorted)): ?>
    <p>Результат:</p>
    <pre><?php print_r($assocSorted); ?></pre>
<?php endif; ?>