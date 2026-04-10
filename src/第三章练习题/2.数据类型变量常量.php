<?php
$radius = 10;
$pi = 3.14;
$circleArea = $pi * $radius * $radius;

$top = 20;
$bottom = 30;
$height = 10;
$trapezoidArea = ($top + $bottom) * $height / 2;

if ($circleArea > 50 && $trapezoidArea > 50) {
    echo "圆的面积为：" . $circleArea . "<br>";
    echo "梯形的面积为：" . $trapezoidArea . "<br>";
} else {
    echo "两个图形的面积没有同时大于50。";
}
?>