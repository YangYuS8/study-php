<?php
$msg = "欢迎来到PHP网页";
date_default_timezone_set("Asia/Shanghai");
$now = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP+HTML+JavaScript综合示例</title>
    <script>
        function showMessage() {
            alert("这是 JavaScript 弹出的提示框！");
        }
    </script>
</head>
<body>
    <h1><?php echo $msg; ?></h1>
    <p>当前时间：<?php echo $now; ?></p>
    <button onclick="showMessage()">点击弹出提示</button>
</body>
</html>