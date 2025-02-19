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
$month = 5;
if ($month > 2 && $month < 6) {
    echo "Весна.";
}
elseif ($month > 5 && $month < 9) {
    echo "Літо.";
}
elseif ($month > 8 && $month < 11) {
    echo "Осінь.";
}
elseif ($month == 12 || ($month > 0 && $month < 3)) {
    echo "Зима.";
}
else {
    echo "Неправильний номер місяця";
}
?>
</body>
</html>