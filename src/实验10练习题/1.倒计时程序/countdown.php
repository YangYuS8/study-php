<?php
header("Content-Type: text/html; charset=UTF-8");

/*
题目：
应用 PHP 的日期、时间函数
为某一纪念日设计一个倒计时程序。
*/

// 设置时区
date_default_timezone_set("Asia/Shanghai");

// 纪念日名称
$dayName = "毕业纪念日";

// 纪念日时间
$targetTime = strtotime("2026-06-30 00:00:00");

// 当前时间
$now = time();

// 计算时间差
$diff = $targetTime - $now;

echo "<h2>{$dayName}倒计时</h2>";

echo "当前时间：" . date("Y-m-d H:i:s", $now) . "<br>";
echo "纪念日时间：" . date("Y-m-d H:i:s", $targetTime) . "<br><br>";

if ($diff > 0) {
    $days = floor($diff / (24 * 60 * 60));
    $hours = floor(($diff % (24 * 60 * 60)) / (60 * 60));
    $minutes = floor(($diff % (60 * 60)) / 60);
    $seconds = $diff % 60;

    echo "距离 {$dayName} 还有：";
    echo "<strong>{$days}</strong> 天 ";
    echo "<strong>{$hours}</strong> 小时 ";
    echo "<strong>{$minutes}</strong> 分 ";
    echo "<strong>{$seconds}</strong> 秒";
} elseif ($diff == 0) {
    echo "今天就是 {$dayName}！";
} else {
    $past = abs($diff);

    $days = floor($past / (24 * 60 * 60));
    $hours = floor(($past % (24 * 60 * 60)) / (60 * 60));
    $minutes = floor(($past % (60 * 60)) / 60);
    $seconds = $past % 60;

    echo "{$dayName} 已经过去：";
    echo "<strong>{$days}</strong> 天 ";
    echo "<strong>{$hours}</strong> 小时 ";
    echo "<strong>{$minutes}</strong> 分 ";
    echo "<strong>{$seconds}</strong> 秒";
}
?>
