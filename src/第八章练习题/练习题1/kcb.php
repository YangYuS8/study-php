<?php
$conn = mysqli_connect("db", "root", "root", "stu");

if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

$msg = "";
$id = "";
$name = "";
$xf = "";
$xq = "";

// 查询课程
if (isset($_POST["search"])) {
    $id = $_POST["id"];

    $sql = "SELECT * FROM kcb WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        $xf = $row["xf"];
        $xq = $row["xq"];
        $msg = "查询成功！";
    } else {
        $msg = "没有找到该课程！";
    }
}

// 添加课程
if (isset($_POST["add"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $xf = $_POST["xf"];
    $xq = $_POST["xq"];

    $sql = "INSERT INTO kcb(id, name, xf, xq) VALUES('$id', '$name', '$xf', '$xq')";

    if (mysqli_query($conn, $sql)) {
        $msg = "添加成功！";
    } else {
        $msg = "添加失败：" . mysqli_error($conn);
    }
}

// 修改课程
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $xf = $_POST["xf"];
    $xq = $_POST["xq"];

    $sql = "UPDATE kcb SET name='$name', xf='$xf', xq='$xq' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $msg = "修改成功！";
    } else {
        $msg = "修改失败：" . mysqli_error($conn);
    }
}

// 删除课程
if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM kcb WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $msg = "删除成功！";
        $id = "";
        $name = "";
        $xf = "";
        $xq = "";
    } else {
        $msg = "删除失败：" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>课程表增删改查</title>
</head>
<body>

<h2 align="center">课程表操作</h2>

<form method="post" action="">
    <table border="1" align="center" cellpadding="8">
        <tr>
            <td>课程号：</td>
            <td>
                <input type="text" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="search" value="查找">
            </td>
        </tr>
        <tr>
            <td>课程名：</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td>学分：</td>
            <td><input type="text" name="xf" value="<?php echo $xf; ?>"></td>
        </tr>
        <tr>
            <td>学期：</td>
            <td><input type="text" name="xq" value="<?php echo $xq; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="update" value="修改">
                <input type="submit" name="add" value="添加">
                <input type="submit" name="delete" value="删除">
            </td>
        </tr>
    </table>
</form>

<p align="center" style="color:red;">
    <?php echo $msg; ?>
</p>

<h3 align="center">课程信息列表</h3>

<table border="1" align="center" cellpadding="8">
    <tr>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>学期</th>
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
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>