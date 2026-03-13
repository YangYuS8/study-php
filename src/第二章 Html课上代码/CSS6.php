<html>

<head>
	<!--3.CSS类选择器 -->
	<style type="text/css">
		p.dark-row {
			background-color: red;
		}

		/*定义p元素的一个类的背景颜色*/
		p.light-row {
			background-color: blue;
		}

		/*定义p元素的另一个类的背景颜色*/
		.one {
			color: green
		}

		.note {
			font-size: 40px
		}

		/*为note的类可以被用于任何元素*/
		/*选择符：伪类*/
		/*指定超链接样式 黑体 蓝色 无下划线*/
		a:link {
			font-family: "黑体";
			font-size: 50pt;
			color: #0000FF;
			text-decoration: none
		}

		/*指定可激活链接样式 字体白色 背景海棠色 清除超链接的默认下划线*/
		a:hover {
			font-family: "华文彩云";
			font-size: 60pt;
			color: #008000;
			background-color: #FF00FF;
			text-decoration: none
		}

		/*指定已访问链接样式 青色 清除超链接的默认下划线*/
		a:visited {
			color: #00FFFF;
			text-decoration: none
		}
	</style>
</head>

<body>
	<p class="dark-row">第一段</p>
	<p class="light-row">第二段</p>
	<p class="one note">第三段</p>
	<p class="note">第四段</p>
	<a href="http://www.baidu.com" target="blank" title="百度">百度</a><br>
	<a href="http://www.sina.com">新浪</a><br>
	<a href="http://www.sohu.com">搜狐</a><br>
	<a href="http://www.taobao.com">淘宝</a><br>

</body>

</html>

<?php
header('Content-Type: text/html; charset=GBK');
?>