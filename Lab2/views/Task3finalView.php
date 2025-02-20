<h1>Профіль користувача</h1>
<p><strong>Мова:</strong> <?= htmlspecialchars($_SESSION['lang']) ?></p>

<p><strong>Логін:</strong> <?= htmlspecialchars($_SESSION['login']) ?></p>

<p><strong>Пароль:</strong> <?= htmlspecialchars($_SESSION['password_error']) ?></p>

<p><strong>Стать:</strong> <?= htmlspecialchars($_SESSION['gender']) ?></p>

<p><strong>Місто:</strong> <?= htmlspecialchars($_SESSION['city']) ?></p>

<p><strong>Улюблені ігри:</strong> <?= !empty($_SESSION['games']) ? implode(', ', $_SESSION['games']) : '—' ?></p>

<p><strong>Про себе:</strong><br>
    <?= nl2br(htmlspecialchars($_SESSION['about'])) ?></p>

<?php if (!empty($_SESSION['photo'])): ?>
    <p><strong>Фотографія:</strong></p>
    <img src="<?=htmlspecialchars($_SESSION['photo'])?>" alt="Фото" width="200">
<?php else: ?>
    <p><strong>Фотографія:</strong> Не завантажено</p>
<?php endif; ?>

<p><a href="index.php?task=3">Повернутися до форми</a></p>