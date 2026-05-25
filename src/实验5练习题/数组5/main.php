<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>首页布局</title>
    <style>
        .container {
            width: 1000px;
            margin: 0 auto;
            overflow: hidden;
        }
        .content {
            width: 700px;
            float: left;
            background: #f9f9f9;
            padding: 20px;
            box-sizing: border-box;
        }
        .side {
            width: 260px;
            float: right;
            background: #f1f1f1;
            padding: 20px;
            box-sizing: border-box;
        }
        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <?php include("content.php"); ?>
    </div>
    <div class="side">
        <?php include("side.php"); ?>
    </div>
</div>
</body>
</html>