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
$number = mt_rand(100, 999);
echo "Випадкове число: $number";
$first = $number%10;
$second = $number/10%10;
$third = $number/100%10;
$sum = $first + $second + $third;
echo "<br>Сума його цифр: $sum";
echo "<br>Число в зворотному порядку: $first$second$third";
$digits = [$first, $second, $third];
rsort($digits);
$maxNumber = $digits[0] * 100 + $digits[1] * 10 + $digits[2];
echo "<br>Найбільше можливе число: $maxNumber";
?>
</body>
</html>