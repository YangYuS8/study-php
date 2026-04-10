<?php
include "func.php";

$result = "";
$a = $b = $c = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];

    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        $result = "请输入三个数字。";
    } else {
        $result = "三个数中最大的是：" . maxOfThree($a, $b, $c);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>比较三个数大小</title>
</head>
<body>
    <form method="post">
        a：<input type="text" name="a" value="<?php echo htmlspecialchars($a); ?>"><br><br>
        b：<input type="text" name="b" value="<?php echo htmlspecialchars($b); ?>"><br><br>
        c：<input type="text" name="c" value="<?php echo htmlspecialchars($c); ?>"><br><br>
        <input type="submit" value="比较">
    </form>

    <p><?php echo $result; ?></p>
</body>
</html>