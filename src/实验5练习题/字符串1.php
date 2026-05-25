<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>学号处理</title>
</head>
<body>
<?php
if (!isset($_POST['submit'])) {
?>
<form method="post">
    请输入5个学生学号：<br>
    学号1：<input type="text" name="xh[]"><br>
    学号2：<input type="text" name="xh[]"><br>
    学号3：<input type="text" name="xh[]"><br>
    学号4：<input type="text" name="xh[]"><br>
    学号5：<input type="text" name="xh[]"><br>
    <input type="submit" name="submit" value="提交">
</form>
<?php
} else {
    $arr = $_POST['xh'];

    // 去重
    $arr = array_unique($arr);

    // 替换前缀 0811 -> 0810
    foreach ($arr as &$value) {
        if (substr($value, 0, 4) == "0811") {
            $value = "0810" . substr($value, 4);
        }
    }

    // 输出，以逗号分隔
    echo "处理后的学号为：";
    echo implode("，", $arr);
}
?>
</body>
</html>