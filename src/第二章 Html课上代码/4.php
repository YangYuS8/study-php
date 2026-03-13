<?php
header('Content-Type: text/html; charset=GBK');
?>
<html>

<head>
      <title>表单练习</title>
      <style>
            /*.t table{width:"400";
               border:0px;
               background:yellow;             
               margin:auto}*/
            .t td {
                  width: 50
            }
      </style>
</head>

<body>
      <!-- 表单 -->
      <div class="t">
            <form action="4php.php" method="post" name="f1">

                  <table>
                        <caption>学生信息</caption>
                        <!-- 单行文本框 -->
                        <tr>
                              <td>姓名：</td>
                              <td><input type="text" name="xm"
                                          maxlength="8" size="10" value="张学友"></td>
                        </tr>
                        <!-- 密码框 -->
                        <tr>
                              <td>密码：</td>
                              <td><input type="password" name="mm"><br></td>
                        </tr>
                        <!-- 单选按钮 -->
                        <tr>
                              <td>性别：</td>
                              <td><input type="radio" name="xb" checked value="男">男
                                    <input type="radio" name="xb" value="女">女
                              </td>
                        </tr>
                        <!-- 复选框 -->
                        <tr>
                              <td>兴趣：</td>
                              <td><input type="checkbox" name="xq[]" checked value="看电影">看电影
                                    <input type="checkbox" name="xq[]" value="旅游">旅游
                                    <input type="checkbox" name="xq[]" value="唱歌">唱歌
                              </td>
                        </tr>
                        <!-- 文件域 -->
                        <tr>
                              <td>上传简历</td>
                              <td><input type="file" size=20>
                              </td>
                        </tr>
                        <!-- 选项选单 -->
                        <tr>
                              <td>地址：</td>
                              <td><select name=dz size=1>
                                          <option>北京</option>
                                          <option>天津</option>
                                          <option>辽宁</option>
                                    </select></td>
                        </tr>
                        <!-- 滚动文本框 -->
                        <tr>
                              <td>备注：</td>
                              <td><textarea rows=3 cols=20></textarea></td>
                        </tr>
                        <!-- 按钮 -->
                        <tr>
                              <td colspan="2">
                                    <input type="submit" name="tj" value="提交按钮">
                                    <input type="reset" name="cz" value="重置按钮">
                                    <input type="button" name="zdy" value="自定义按钮">
                        </tr>
                  </table>
            </form>
      </div>
</body>

</html>