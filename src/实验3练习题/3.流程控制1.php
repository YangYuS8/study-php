<?php
$result = "";
$input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST["num"]);

    if (filter_var($input, FILTER_VALIDATE_INT) === false) {
        $result = "输入错误：请输入一个整数。";
    } elseif ((int)$input == 0) {
        $result = "输入错误：整数不能等于0。";
    } elseif ((int)$input < 0) {
        $result = "输入错误：这里要求输入正整数。";
    } else {
        $n = (int)$input;
        $fact = 1;
        for ($i = 1; $i <= $n; $i++) {
            $fact *= $i;
        }
        $result = $n . " 的阶乘是：" . $fact;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>阶乘计算</title>
</head>
<body>
    <form method="post">
        请输入一个不等于0的整数：
        <input type="text" name="num" value="<?php echo htmlspecialchars($input); ?>">
        <input type="submit" value="计算">
    </form>
    <p><?php echo $result; ?></p>
</body>
</html>