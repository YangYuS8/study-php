<html>

<head>
	<meta http-equiv="Content-type" content="text/html;charset=gb2312" />
	<title>网页布局实例</title>
	<style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}

		#top,
		#nav,
		#mid,
		#footer {
			width: 1500px;
			margin: 0px auto;
		}

		#top {
			height: 80px;
			background-color: #ddd;
		}

		#nav {
			height: 25px;
			background-color: #fc0;
		}

		#mid {
			height: 300px;
		}

		#left {
			width: 98px;
			height: 298px;
			border: 1px solid #999;
			float: left;
			background-color: #ddd;
		}

		#right {
			height: 298px;
			background-color: #ccc;
		}

		.content {
			width: 335px;
			height: 148px;
			background-color: #c00;
			border: 1px solid #999;
			float: left;
		}

		#content2 {
			background-color: #f60;
		}

		#footer {
			height: 80px;
			background-color: #fc0;
		}
	</style>
</head>

<body>
	<div id="top">顶部广告区</div>
	<div id="nav">导航区</div>
	<div id="mid">
		<div id="left">纵向导航区</div>
		<div id="right">
			<div class="content">内容A</div>
			<div class="content" id="content2">内容B</div>
			<div class="content">内容C</div>
			<div class="content" id="content2">内容D</div>
			<div class="content" id="content2">内容E</div>
			<div class="content">内容F</div>
			<div class="content" id="content2">内容G</div>
			<div class="content">内容H</div>
		</div>
	</div>
	<div id="footer">底部版权区</div>
</body>

</html>





<?php
header('Content-Type: text/html; charset=GBK');
?>