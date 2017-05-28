<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo ($title); ?></title>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />

</head>
<body>
<script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-1.8.2.min.js'></script>
<script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-validate.js'></script>
<script type="text/javascript" src='__PUBLIC__/Js/common.js'></script> 

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> 
	<div class='status'>
		<span>请将您的生活习惯告诉它</span>
	</div>
	<form action="__SELF__" method='post'>
		<table class="table">
	 
		    <tr>
		    <td colspan='2'>
					<textarea cols="50" rows="10" id="feedback" name="myask">
					<?php echo $feedback['myask']; ?>
					</textarea>
				</td>
		    </tr>
		    <tr>
				<td colspan='2'>
					<input type="submit" value='保存添加' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>
<!--导入在线编辑器 -->
<script>
 var EditName='feedback';
</script>
<!--导入在线编辑器 -->
	<!-- 配置文件 -->
    <script type="text/javascript" src="__ROOT__/Public/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="__ROOT__/Public/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor(EditName);
    </script>	

 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>