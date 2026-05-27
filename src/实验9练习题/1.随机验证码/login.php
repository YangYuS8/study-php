<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");

/*
登录页面：
将验证码图片插入在登录页面中。
*/

$msg = "";

if (isset($_POST["submit"])) {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    $captcha = strtolower($_POST["captcha"] ?? "");

    if ($captcha === strtolower($_SESSION["captcha"] ?? "")) {
        $msg = "验证码正确，登录成功！";
    } else {
        $msg = "验证码错误，请重新输入！";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
</head>
<body>

<h2>用户登录</h2>

<form method="post">
    <p>
        用户名：
        <input type="text" name="username">
    </p>

    <p>
        密码：
        <input type="password" name="password">
    </p>

    <p>
        验证码：
        <input type="text" name="captcha" size="6">
        <img src="captcha.php" id="captchaImg" onclick="this.src='captcha.php?rand=' + Math.random();" style="cursor:pointer;">
        <a href="javascript:void(0);" onclick="document.getElementById('captchaImg').src='captcha.php?rand=' + Math.random();">看不清，换一张</a>
    </p>

    <p>
        <input type="submit" name="submit" value="登录">
    </p>
</form>

<p style="color:red;">
    <?php echo $msg; ?>
</p>

</body>
</html>
