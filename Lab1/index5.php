<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$letter = "d";
switch (strtolower($letter)) {
    case "a":
    case "e":
    case "u":
    case "i":
    case "o":
        echo "Буква $letter є голосною.";
        break;
    case "q": case "w": case "r": case "t": case "p": case "s": case "d": case "f": case "g": case "h": case "j": case "k": case "l": case "z": case "x": case "c": case "v": case "b": case "n": case "m":
        echo "Буква $letter є приголосною.";
        break;
    case "y":
        echo "Буква $letter позначає як приголосний, так і голосні звуки";
        break;
    default:
        echo "Символ $letter не є буквою англійського алфавіту.";
}
?>
</body>
</html>