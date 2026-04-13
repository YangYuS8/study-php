<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>订货单页面</title>
    <style>
        table {
            border-collapse: collapse;
            width: 700px;
            text-align: center;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
$goods = array(
    array("name" => "主板", "place" => "广东", "price" => 370, "num" => 2),
    array("name" => "显卡", "place" => "北京", "price" => 700, "num" => 2),
    array("name" => "硬盘", "place" => "上海", "price" => 500, "num" => 4)
);

$totalAll = 0;
?>

<table>
    <tr>
        <th>商品名称</th>
        <th>产地</th>
        <th>单价(元)</th>
        <th>数量</th>
        <th>小计(元)</th>
    </tr>

    <?php
    foreach ($goods as $value) {
        $sum = $value["price"] * $value["num"];
        $totalAll += $sum;
        echo "<tr>";
        echo "<td>{$value['name']}</td>";
        echo "<td>{$value['place']}</td>";
        echo "<td>{$value['price']}</td>";
        echo "<td>{$value['num']}</td>";
        echo "<td>{$sum}</td>";
        echo "</tr>";
    }
    ?>

    <tr>
        <td colspan="4">商品销售总价</td>
        <td><?php echo $totalAll; ?></td>
    </tr>
</table>
</body>
</html>