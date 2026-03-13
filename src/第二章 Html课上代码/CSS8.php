<html>

<head>
  <style>
    .t table {
      width: "400";
      border: 1px solid #F00;
      /* 红色 */
      border-spacing: 0px;
      border-collapse: collapse
    }

    /* 为表格设置合并边框模型 */
    .t table td {
      border: 1px solid #F00
    }

    /* 5.CSS 关联选择器 */
    /* css注释：对table和td标签设置样式 */
  </style>
</head>

<body>
  <div class="t">
    <table>
      <tr>
        <td width="105">站名</td>
        <td width="181">网址</td>
        <td width="112">说明</td>
      </tr>
      <tr>
        <td>DIVCSS5</td>
        <td>www.divcss5.com</td>
        <td>CSS学习</td>
      </tr>
      <tr>
        <td>CSS5</td>
        <td>www.css5.com.cn</td>
        <td>CSS切图</td>
      </tr>
    </table>
  </div>
  <div class="t1">
    <table></table>
  </div>
</body>

</html>

<?php
header('Content-Type: text/html; charset=GBK');
?>