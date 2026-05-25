<?php
$conn = mysqli_connect("db", "root", "root", "stu");

if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// 保存修改
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $xf = $_POST["xf"];
    $xq = $_POST["xq"];

    $sql = "UPDATE kcb SET name='$name', xf='$xf', xq='$xq' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('修改成功！');location.href='list.php';</script>";
    } else {
        echo "修改失败：" . mysqli_error($conn);
    }
}

// 根据课程号查询要修改的数据
$id = $_GET["id"];
$sql = "SELECT * FROM kcb WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改课程信息</title>
</head>
<body>

<h2 align="center">修改课程信息</h2>

<form method="post" action="">
    <table border="1" align="center" cellpadding="8">
        <tr>
            <td>课程号：</td>
            <td>
                <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>课程名：</td>
            <td>
                <input type="text" name="name" value="<?php echo $row['name']; ?>">
            </td>
        </tr>
        <tr>
            <td>学分：</td>
            <td>
                <input type="text" name="xf" value="<?php echo $row['xf']; ?>">
            </td>
        </tr>
        <tr>
            <td>学期：</td>
            <td>
                <input type="text" name="xq" value="<?php echo $row['xq']; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="保存修改">
                <a href="list.php">返回列表</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>

<?php
mysqli_close($conn);
?>