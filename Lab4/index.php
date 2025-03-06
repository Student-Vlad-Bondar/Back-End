<?php
require_once 'autoload.php';
require_once 'templates/header.php';

use Models\UserModel;
use Controllers\UserController;
use Views\UserView;
use Models\Circle;
use Models\Student;
use Models\Programmer;
use Models\FileManager;

echo "<h1>Демонстрація класів</h1>";

$userModel = new UserModel();
$modelMessage = $userModel->getMessage();

$userController = new UserController();
$controllerMessage = $userController->process();

$userView = new UserView();
$viewOutput = $userView->render("Модель: $modelMessage<br>Контролер: $controllerMessage");

echo $viewOutput;


$circle1 = new Circle(0, 0, 5);
$circle2 = new Circle(3, 4, 3);
echo "<h2>Клас Circle</h2>";
echo "<p>" . $circle1 . "</p>";
echo "<p>" . $circle2 . "</p>";
echo ($circle1->intersects($circle2)) ? "<p>Кола перетинаються.</p>" : "<p>Кола не перетинаються.</p>";


$student = new Student(170, 65, 20, "Університет ЕТ", 2);
$programmer = new Programmer(180, 80, 25, 3, ["PHP", "JavaScript"]);

echo "<h2>Клас Student</h2>";
echo "<p>" . $student . "</p>";
echo "<p>Курс: " . $student->getCourse() . "</p>";
$student->nextCourse();
echo "<p>Після підвищення курсу: " . $student->getCourse() . "</p>";
echo "<p>При народженні дитини: " . $student->haveChild() . "</p>";
echo "<p>Прибирання кімнати: " . $student->cleanRoom() . "</p>";
echo "<p>Прибирання кухні: " . $student->cleanKitchen() . "</p>";

echo "<h2>Клас Programmer</h2>";
echo "<p>" . $programmer . "</p>";
echo "<p>Досвід роботи: " . $programmer->getExperience() . " років</p>";
$programmer->addLanguage("Python");
echo "<p>Мови програмування: " . implode(", ", $programmer->getLanguages()) . "</p>";
echo "<p>При народженні дитини: " . $programmer->haveChild() . "</p>";
echo "<p>Прибирання кімнати: " . $programmer->cleanRoom() . "</p>";
echo "<p>Прибирання кухні: " . $programmer->cleanKitchen() . "</p>";


echo "<h2>Клас FileManager</h2>";
$filename1 = "example1.txt";
$data = "Hello World!\n";
if (FileManager::writeFile($filename1, $data)) {
    echo "<p>Дані додано у файл $filename1.</p>";
    echo "<p>Вміст файлу: " . FileManager::readFile($filename1) . "</p>";
    FileManager::clearFile($filename1);
    echo "<p>Вміст файлу після очищення: " . FileManager::readFile($filename1) . "</p>";
} else {
    echo "<p>Не вдалося записати дані у файл.</p>";
}
$filename2 = "example2.txt";
if ($filename2){
    echo "<p>Вміст файлу: " . FileManager::readFile($filename2) . "</p>";
}
$filename3 = "example3.txt";
if ($filename3){
    echo "<p>Вміст файлу: " . FileManager::readFile($filename3) . "</p>";
    FileManager::clearFile($filename3);
    echo "<p>Вміст файлу після очищення: " . FileManager::readFile($filename3) . "</p>";
}

require_once 'templates/footer.php';