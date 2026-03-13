<?php

header('Content-Type: text/html; charset=GBK');
if (isset($_POST['tj'])) {
	$xm = $_POST['xm'];
	$mm = $_POST['mm'];
	$xb = $_POST['xb'];
	$xq = $_POST['xq'];
	$num = count($xq);
	$xqbox = "";
	for ($i = 0; $i < $num; $i++) {
		$xqbox = $xqbox . " " . $xq[$i];
	}
	echo "姓名：" . $xm . "<br>";
	echo "密码：" . $mm . "<br>";
	echo "性别：" . $xb . "<br>";
	echo "兴趣：" . $xqbox;
}
