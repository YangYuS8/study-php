<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>5个数排序</title>
</head>
<body>
<?php
if (!isset($_POST['submit'])) {
?>
<form method="post">
    请输入5个数：<br>
    数1：<input type="text" name="num[]"><br>
    数2：<input type="text" name="num[]"><br>
    数3：<input type="text" name="num[]"><br>
    数4：<input type="text" name="num[]"><br>
    数5：<input type="text" name="num[]"><br>
    <input type="submit" name="submit" value="提交">
</form>
<?php
} else {
    $nums = $_POST['num'];
    sort($nums); // 升序排序

    echo "排序后的结果为：";
    foreach ($nums as $value) {
        echo $value . " ";
    }
}
?>
</body>
</html>