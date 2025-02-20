<h1>Task 3: Робота з формою</h1>

<p>
    <a href="?task=3&action=setLang&lang=ukr">
        <img src="images/ukr.png" alt="Українська" width="30">
    </a>
    <a href="?task=3&action=setLang&lang=en">
        <img src="images/uk.png" alt="English" width="30">
    </a>
</p>
<p>Вибрана мова: <strong><?= htmlspecialchars(isset($langText) ? $langText : 'Українська') ?></strong></p>

<hr>

<form action="?task=3&action=submitForm" method="post" enctype="multipart/form-data">
    <label>Логін:
        <input type="text" name="login" value="<?= htmlspecialchars(isset($formData['login']) ? $formData['login'] : '') ?>">
    </label><br><br>

    <label>Пароль:
        <input type="password" name="password" value="<?= htmlspecialchars(isset($formData['password']) ? $formData['password'] : '') ?>">
    </label><br><br>

    <label>Пароль (ще раз):
        <input type="password" name="password2" value="<?= htmlspecialchars(isset($formData['password2']) ? $formData['password2'] : '') ?>">
    </label><br><br>

    <p>Стать:</p>
    <label>
        <input type="radio" name="gender" value="чоловік"
            <?= (isset($formData['gender']) ? $formData['gender'] : '') === 'чоловік' ? 'checked' : '' ?>>
        чоловік
    </label>
    <label>
        <input type="radio" name="gender" value="жінка"
            <?= (isset($formData['gender']) ? $formData['gender'] : '') === 'жінка' ? 'checked' : '' ?>>
        жінка
    </label>
    <br><br>

    <label>Місто:
        <select name="city">
            <option value="Житомир" <?= (isset($formData['city']) ? $formData['city'] : '') === 'Житомир' ? 'selected' : '' ?>>Житомир</option>
            <option value="Київ"    <?= (isset($formData['city']) ? $formData['city'] : '') === 'Київ' ? 'selected' : '' ?>>Київ</option>
            <option value="Львів"   <?= (isset($formData['city']) ? $formData['city'] : '') === 'Львів' ? 'selected' : '' ?>>Львів</option>
        </select>
    </label>
    <br><br>

    <p>Улюблені ігри:</p>
    <?php
    $allGames = ['футбол', 'баскетбол', 'волейбол', 'шахи', 'World of Tanks'];
    $userGames = isset($formData['games']) ? $formData['games'] : [];
    foreach ($allGames as $g) {
        $checked = in_array($g, $userGames) ? 'checked' : '';
        echo "<label><input type='checkbox' name='games[]' value='$g' $checked> $g</label><br>";
    }
    ?>
    <br>

    <label>Про себе:<br>
        <textarea name="about" rows="5" cols="40"><?= htmlspecialchars(isset($formData['about']) ? $formData['about'] : '') ?></textarea>
    </label><br><br>

    <label>Фотографія:
        <input type="file" name="photo">
    </label><br><br>

    <button type="submit">Зареєструватися</button>
</form>

<hr>