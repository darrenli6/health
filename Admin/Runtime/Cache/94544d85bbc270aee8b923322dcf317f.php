<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Line/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Line/css/main.css">
<script type="text/javascript" src="__PUBLIC__/Line/js/jquery.min.js"></script>
<title>dataAnalysis</title>
</head>
<body>
<!---->
<div class="content" style="margin:50px;width:800px;height:600px;">

</div>
<script type="text/javascript" src="__PUBLIC__/Line/js/main.js"></script>
<script type="text/javascript">


	$('.content').dataAnalysis({
		data : {
			type : "line-number",
			horizontal: <?php echo ($h); ?>, //横坐标
			vertical  : [0,25,50,75,100,125,150,200,300,400],  //纵坐标
			horiUnit : "日期时间戳", //横坐标单位
			vertUnit : "mmol/L-mmhg",   //纵坐标单位
			title	: "血糖-血压图", //图表标题
			project : [
				{
					name : "血糖",
					style: "#66ccff",
					points:[<?php echo ($t); ?>]
				},
				 {
					name : "血压",
					style: "#F5601F",
					points:[<?php echo ($y); ?>]
				} 
			]
		}
	});
</script>
</body>
</html>