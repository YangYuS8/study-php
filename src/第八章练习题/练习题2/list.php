<?php
$conn = mysqli_connect("localhost", "root", "root", "stu");

if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// 通过超链接删除课程
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];

    $sql = "DELETE FROM kcb WHERE id='$id'";
    mysqli_query($conn, $sql);

    echo "<script>alert('删除成功！');location.href='list.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>课程列表</title>
</head>
<body>

<h2 align="center">课程信息列表</h2>

<table border="1" align="center" cellpadding="8">
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>学期</th>
        <th>删除</th>
        <th>修改</th>
    </tr>

    <?php
    $sql = "SELECT * FROM kcb ORDER BY id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["xf"] . "</td>";
        echo "<td>" . $row["xq"] . "</td>";
        echo "<td><a href='list.php?action=delete&id=" . $row["id"] . "'>删除</a></td>";
        echo "<td><a href='edit.php?id=" . $row["id"] . "'>修改</a></td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>