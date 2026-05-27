<?php
header("Content-Type: text/html; charset=UTF-8");

/*
题目：
实现根据生日计算年龄，可用函数实现。
*/

date_default_timezone_set("Asia/Shanghai");

/**
 * 根据生日计算年龄
 *
 * @param string $birthday 生日，格式：YYYY-MM-DD
 * @return int 年龄
 */
function getAge($birthday)
{
    $birthTime = strtotime($birthday);

    if ($birthTime === false) {
        return -1;
    }

    $birthYear = date("Y", $birthTime);
    $birthMonthDay = date("md", $birthTime);

    $nowYear = date("Y");
    $nowMonthDay = date("md");

    $age = $nowYear - $birthYear;

    // 如果今年生日还没到，年龄减 1
    if ($nowMonthDay < $birthMonthDay) {
        $age--;
    }

    return $age;
}

$birthday = "2004-08-18";
$age = getAge($birthday);

echo "<h2>根据生日计算年龄</h2>";
echo "生日：" . $birthday . "<br>";

if ($age >= 0) {
    echo "年龄：" . $age . " 岁";
} else {
    echo "生日格式错误！";
}
?>
