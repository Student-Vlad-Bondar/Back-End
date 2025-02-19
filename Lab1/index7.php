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
$n = 5;
function generateTable($rows, $cols) {
    echo "<table border='1'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = sprintf('#%02x%02x%02x', mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            echo "<td style='background-color: $color; width: 50px; height: 50px;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
function generateRedSquares($n) {
    $containerWidth = 600;
    $containerHeight = 600;
    echo "<div style='position: relative; background-color: black; width: {$containerWidth}px; height: {$containerHeight}px; margin-top: 20px;'>";

    for ($i = 0; $i < $n; $i++) {
        $size = mt_rand(10, 100);
        $x = mt_rand(0, $containerWidth - $size);
        $y = mt_rand(0, $containerHeight - $size);
        echo "<div style='position: absolute; width: {$size}px; height: {$size}px; background-color: red; left: {$x}px; top: {$y}px;'></div>";
    }
    echo "</div>";
}

generateTable($n, $n);
generateRedSquares($n);
?>
</body>
</html>