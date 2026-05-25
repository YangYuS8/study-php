<?php
$conn = mysqli_connect("db", "root", "root", "stu");

if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

$msg = "";

$id = "";
$name = "";
$sex = "";
$age = "";
$department = "";
$salary = "";

// 删除员工
if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];

    $sql = "DELETE FROM employee WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('删除成功！');location.href='employee.php';</script>";
    } else {
        echo "删除失败：" . mysqli_error($conn);
    }
}

// 编辑时查询原数据
if (isset($_GET["edit_id"])) {
    $id = $_GET["edit_id"];

    $sql = "SELECT * FROM employee WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $name = $row["name"];
        $sex = $row["sex"];
        $age = $row["age"];
        $department = $row["department"];
        $salary = $row["salary"];
    }
}

// 添加员工
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $department = $_POST["department"];
    $salary = $_POST["salary"];

    $sql = "INSERT INTO employee(name, sex, age, department, salary)
            VALUES('$name', '$sex', '$age', '$department', '$salary')";

    if (mysqli_query($conn, $sql)) {
        $msg = "添加成功！";
    } else {
        $msg = "添加失败：" . mysqli_error($conn);
    }
}

// 修改员工
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $department = $_POST["department"];
    $salary = $_POST["salary"];

    $sql = "UPDATE employee 
            SET name='$name', sex='$sex', age='$age', department='$department', salary='$salary'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('修改成功！');location.href='employee.php';</script>";
    } else {
        $msg = "修改失败：" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>员工信息管理</title>
</head>
<body>

<h2 align="center">员工信息管理</h2>

<p align="center" style="color:red;">
    <?php echo $msg; ?>
</p>

<form method="get" action="employee.php">
    <table align="center">
        <tr>
            <td>按姓名查找：</td>
            <td><input type="text" name="keyword"></td>
            <td><input type="submit" value="查找"></td>
            <td><a href="employee.php">显示全部</a></td>
        </tr>
    </table>
</form>

<br>

<form method="post" action="">
    <table border="1" align="center" cellpadding="8">
        <tr>
            <td>编号：</td>
            <td>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>姓名：</td>
            <td>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </td>
        </tr>
        <tr>
            <td>性别：</td>
            <td>
                <input type="text" name="sex" value="<?php echo $sex; ?>">
            </td>
        </tr>
        <tr>
            <td>年龄：</td>
            <td>
                <input type="text" name="age" value="<?php echo $age; ?>">
            </td>
        </tr>
        <tr>
            <td>部门：</td>
            <td>
                <input type="text" name="department" value="<?php echo $department; ?>">
            </td>
        </tr>
        <tr>
            <td>工资：</td>
            <td>
                <input type="text" name="salary" value="<?php echo $salary; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="add" value="添加员工">
                <input type="submit" name="update" value="修改员工">
            </td>
        </tr>
    </table>
</form>

<h3 align="center">员工信息列表</h3>

<table border="1" align="center" cellpadding="8">
    <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>部门</th>
        <th>工资</th>
        <th>编辑</th>
        <th>删除</th>
    </tr>

    <?php
    if (isset($_GET["keyword"]) && $_GET["keyword"] != "") {
        $keyword = $_GET["keyword"];
        $sql = "SELECT * FROM employee WHERE name LIKE '%$keyword%'";
    } else {
        $sql = "SELECT * FROM employee";
    }

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["sex"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["department"] . "</td>";
        echo "<td>" . $row["salary"] . "</td>";
        echo "<td><a href='employee.php?edit_id=" . $row["id"] . "'>编辑</a></td>";
        echo "<td><a href='employee.php?delete_id=" . $row["id"] . "'>删除</a></td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>