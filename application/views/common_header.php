<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url("static/css/style.css");?>" />
</head>

<body>
<div id="wrapper">
	<div id="header">
		<div id="masthead">
			<div class="logo">
				<p>ZZ10086.cn</p>
			</div>
			<div class="search">
				<form action="/" method="post">
					<input type="text" name="q" title="搜索号码" />
					<button type="submit">搜索</button>
				</form>
			</div>
		</div>
		<div id="navbar">
			<div class="layout">
				<ul class="nav">
					<li class="current"><a href="/">首页</a></li>
					<li><a href="<?php echo site_url("so");?>">我要选号</a></li>
					<li><a href="<?php echo site_url("shouye/special");?>">活动专区</a></li>
				</ul>
				<div class="cart">
					<p><a href="#" class="active">号码备选单<em>1</em><i></i></a></p>
					<div class="box">
						<ul>
							<li><a href="#">15225192625<span>¥1300</span></a></li>
						</ul>
						<a href="#" class="empty">清空</a>
					</div>
				</div>
			</div>
		</div>
	</div>