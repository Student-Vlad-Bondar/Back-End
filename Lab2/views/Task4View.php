<h1>Task 4: Робота з функціями (sin, cos, tg, x^y, x!)</h1>

<form method="post" action="?task=4&action=calculate">
    <label for="x">x:</label>
    <input type="text" name="x" id="x" value="<?= htmlspecialchars(isset($_POST['x']) ? $_POST['x'] : '') ?>">

    <label for="y">y:</label>
    <input type="text" name="y" id="y" value="<?= htmlspecialchars(isset($_POST['y']) ? $_POST['y'] : '') ?>">

    <button type="submit">Обчислити</button>
</form>

<?php if (isset($results)): ?>
    <hr>
    <table border="1" cellpadding="5">
        <tr>
            <th>x^y</th>
            <th>sin(x)</th>
            <th>cos(x)</th>
            <th>tg(x)</th>
            <th>x!</th>
        </tr>
        <tr>
            <td><?= $results['pow'] ?></td>
            <td><?= $results['sin'] ?></td>
            <td><?= $results['cos'] ?></td>
            <td><?= $results['tg'] !== null ? $results['tg'] : 'не існує (cos(x)=0)' ?></td>
            <td><?= $results['factorial'] !== null ? $results['factorial'] : 'не існує для від’ємних' ?></td>
        </tr>
    </table>
<?php endif; ?>