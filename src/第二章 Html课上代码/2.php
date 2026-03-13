<?php
header('Content-Type: text/html; charset=GBK');
?>
<html>

<head>
	<title>
		你好，html练习！
	</title>
	<!--  <link rel="StyleSheet" type="text/css" href="css/index.css"> -->
</head>

<body background="img/2.jpg">
	<!--<body bgcolor="red" >-->

	<body text="red">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;
		<h1 align="center">学校概况</h1>
		</p>

		<!-- 分割线标记 -->
		<hr size="2" width="1000" color="red">

		<p>&nbsp;&nbsp;&nbsp;&nbsp;辽宁科技大学是中国共产党领导的第一所冶金工业学校。1948年始建，1949年组建鞍山工业专门学校，1950年改为东北工学院鞍山分院，1958年升格为本科层次的鞍山钢铁学院，1998年由冶金工业部划转为辽宁省政府，实行中央和地方共建、以辽宁省管理为主的体制。
			经教育部批准，2002年更名为鞍山科技大学，2006年更名为辽宁科技大学。</p>
		<span>&nbsp;&nbsp;&nbsp;&nbsp;建校70余年来，学校已发展成为以工学为主，理学、文学、经济学、管理学、法学、艺术等学科协调发展的多科性大学。
			2007年学校在教育部本科教学工作水平评估中获优秀成绩。学校坚持”创新为先、质量立校、人才强校、特色兴校“办学理念，逐步形成”坚持既为冶金行业服务，
			又为辽宁地方及区域经济社会发展服务“办学定位，打造出”立足冶金，校企合作，注重实践，培养踏实肯干、适应发展的应用型高级专门人才“办学特色，
			深化内涵建设，推动高质量发展，为国家培养了大批优秀人才，许多校友已经成为企事业单位的技术拔尖人才、学术带头人和管理骨干。
			五矿、宝武钢铁、鞍钢、河钢、宝钢、包钢等国有企业均有我校毕业生担任董事长、
			总经理等重要职务。</span>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;学校坐落在祖国钢都辽宁省鞍山市，占地184余万平方米。设有学院19个、教学部1个和工程实训中心1个，共办本科专业66个。具有学士、硕士、博士三级学位授予权，有一级学科博士点3个、二级学科博士点13个，一级学科硕士点12个、二级学科硕士点40个，专业学位硕士点8个；有工商管理硕士（MBA）学位授予权、同等学力在职人员申请硕士学位授予权和工程硕士以及研究生推免权，有“直博生”“硕博连读”和“申请-考核”资格。学校现有全日制学生22730人，
			其中，本科生19711人，全日制硕士2586人，博士188人，留学生245人。</p>

		<!-- 换行标记 -->
		<br>

		<!-- 标题标记h1-h6 -->
		<h1 align="left">这是1号字</h1>
		<h5>这是5号字</h5>

		<!-- 块标记 -->
		<div align="center">下面使用了块标记
			<h3>标题标记3</h3>
			<h4>标题标记4</h4>
		</div>

		<!-- 字体标记 -->
		<font face="宋体" size=8 color="blue"><b>沁园春.雪-毛泽东</b></font><br>
		<font face="黑体" size=7 color="blue"><em>沁园春.雪-毛泽东</em></font><br>
		<font face="隶书" color="blue"><ins>沁园春.雪-毛泽东</ins></font><br>
		<font face="楷体" size=5 color="blue"><del>沁园春.雪-毛泽东</del></font><br>
		<font face="华文彩云" size=5 color="blue"><strong><em><ins>沁园春.雪-毛泽东</ins></em></strong></font><br>

		<!-- 处理网页中的特殊字符 -->
		<font size="5">
			标签的显示方法：&lt;html&gt;<br>
			引号的显示方法：&quot;<br>
			商标的显示方法：&trade;<br>
			注册符号的显示方法：&reg;<br>
			版权符号的显示方法：&copy;<br>
			显示&sect;<br>
			显示&times;<br>
		</font>

		<!-- 列表标记 -->
		<font size=5> 网页后台技术</font>
		<ol type="A" start="2">
			<li>jsp</li>
			<li>asp</li>
			<li>php</li>
		</ol>
		<font size=5> 网页前台技术</font>
		<ul>
			<li>html</li>
			<li>css</li>
			<li>js</li>
		</ul>

		<!-- 嵌套列表标记 -->
		<ul type="square">
			<li>体育三大球类
				<ol>
					<li>足球</li>
					<li>蓝球</li>
					<li>排球</li>
				</ol>
			</li>
			<li>音乐风格
				<ol>
					<li>民族音乐</li>
					<li>流行音乐</li>
					<li>古典音乐</li>
				</ol>
			</li>
		</ul>

		<!-- 多媒体标记 -->
		<img alt="" src="img/小猫.JPG" width=400 height=300 align="left">
		<img alt="风景" src="img/bg2.JPG" width=400 height=300>
		<embed src="img/vidio.MP4"></embed>
		<bgsound src="img/纯音乐-安妮的仙境.mp3" loop=-1><br>
			<!-- <bgsound src="E:/纯音乐-安妮的仙境.mp3" loop=-1><br>  -->

			<!-- 滚动字幕标记-->
			<marquee bgcolor="blue" direction="left">
				<font size=7>做人要厚道</font>
			</marquee><br>
			<marquee direction="down"><img alt="" src="img/小猫.jpg"></marquee>
			<br>
			<!-- 超链接标记 -->
			<a href="http://www.baidu.com" title="百度">百度</a>
			<a href="http://www.tencent.com" title="腾讯">腾讯</a>
			<a href="http://www.163.com" target="blank">网易</a>
			<a href="4.php">链接到1.php文件</a>
			<a href="img/1.jpg">链接到图片</a>
			<a href="http://www.chongso.com/" title="图片链接"><img src=" img/小猫.jpg" width=300></a>
	</body>

</html>