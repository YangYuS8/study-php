<?php
$xuehao = $_POST["xuehao"];
$xingming = $_POST["xingming"];
$xingbie = $_POST["xingbie"];
$shengri = $_POST["shengri"];
$zhuanye = $_POST["zhuanye"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>学生个人信息显示</title>
</head>
<body>
    <h2 align="center">学生个人信息</h2>

    <table border="1" align="center" cellpadding="8" cellspacing="0">
        <tr>
            <td>学号</td>
            <td><?php echo $xuehao; ?></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><?php echo $xingming; ?></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><?php echo $xingbie; ?></td>
        </tr>
        <tr>
            <td>出生日期</td>
            <td><?php echo $shengri; ?></td>
        </tr>
        <tr>
            <td>所学专业</td>
            <td><?php echo $zhuanye; ?></td>
        </tr>
    </table>
</body>
</html>