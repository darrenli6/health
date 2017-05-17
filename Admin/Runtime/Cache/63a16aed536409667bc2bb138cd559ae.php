<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>系统信息</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/copy.css" />
	<script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-1.8.2.min.js'></script>
	<script type="text/javascript">
		window.onload = function () {
			$('#main').fadeIn(2000);
		}
	</script>
</head>
<body>
	<div id='main'>
		<dl>
			<dt>个人信息</dt>
			<dd>上一次登录时间：<span><?php echo ($_SESSION['lasttime']); ?></span></dd>
			<dd>上一次登录IP：<span><?php echo ($_SESSION['lastip']); ?></span></dd>
			<dd>本次登录时间：<span><?php echo ($_SESSION['now']); ?></span></dd>
			<dd>本次登录IP：<span><?php echo get_client_ip();?></span></dd>
		</dl>
		<dl>
			<dt>服务器信息</dt>
			<dd>操作系统：<span><?php echo (PHP_OS); ?></span></dd>
			<dd>PHP版本： <span><?php echo (PHP_VERSION); ?></span></dd>
			<dd>服务器环境：<span><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></span></dd>
			<dd>MySQL版本：<span><?php echo mysql_get_server_info();?></span></dd>
		</dl>
		 
		 
		<dl>
			<dt>版权信息</dt>
			<dd>版权所有：计算机系计科1302--  李佳</dd>
			<dd>系统开发：darren       --  李佳</dd>
		</dl>
	</div>
</body>
</html>