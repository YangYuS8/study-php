<html>

<head>
    <title>CSS选择器综合示例，
        选择器单独示例详见CSS5-8</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <style type="text/css">
        p {
            font-family: "宋体";
            color: green;
            background-color: yellow;
            font-size: 15pt;
        }

        /*1.标记选择器*/
        h1,
        h2 {
            font-family: "隶书";
            color: #FF8800
        }

        /*2.组合选择器*/
        #id1 {
            color: blue;
        }

        /*3.id选择器*/
        p.back {
            font-family: "华文彩云";
            font-size: 15pt;
            color: #000000;
        }

        /*4.类选择器*/
        .heti {
            font-family: "黑体";
            font-size: 20pt;
            color: #000000;
        }

        /*4.类选择器*/
    </style>
</head>

<body topmargin=4>
    <h1>内容H1样式显示</h1>
    <h2>内容H2样式显示</h2>
    <h3 id=id1>内容id1样式显示</h3>
    <h4>H4内容默认样式显示</h4>
    <p>内容P样式显示</p>
    <p class="back">内容back样式显示</p>
    <p class="heti">内容heti样式显示</p>
</body>

</html>




<?php
header('Content-Type: text/html; charset=GBK');
?>