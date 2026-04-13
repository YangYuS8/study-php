<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>双色球机选</title>
</head>
<body>
<?php
// 红球号码区
$redArr = range(1, 33);
// 打乱数组
shuffle($redArr);
// 取前6个红球
$reds = array_slice($redArr, 0, 6);
// 升序排列
sort($reds);

// 蓝球号码区
$blue = rand(1, 16);

echo "机选红球号码：";
foreach ($reds as $red) {
    echo str_pad($red, 2, "0", STR_PAD_LEFT) . " ";
}

echo "<br>机选蓝球号码：";
echo str_pad($blue, 2, "0", STR_PAD_LEFT);
?>
</body>
</html>