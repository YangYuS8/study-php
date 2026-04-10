<?php
function isLeapYear($year) {
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

$msg = "";
$yearInput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yearInput = trim($_POST["year"]);
    if (filter_var($yearInput, FILTER_VALIDATE_INT) === false) {
        $msg = "请输入合法的年份。";
    } else {
        $year = (int)$yearInput;
        $msg = $year . (isLeapYear($year) ? " 是闰年" : " 不是闰年");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>闰年判断</title>
</head>
<body>
    <form method="post">
        请输入年份：
        <input type="text" name="year" value="<?php echo htmlspecialchars($yearInput); ?>">
        <input type="submit" value="判断">
    </form>

    <p><?php echo $msg; ?></p>

    <h3>2000-2030年的闰年：</h3>
    <?php
    for ($i = 2000; $i <= 2030; $i++) {
        if (isLeapYear($i)) {
            echo $i . " ";
        }
    }
    ?>
</body>
</html>