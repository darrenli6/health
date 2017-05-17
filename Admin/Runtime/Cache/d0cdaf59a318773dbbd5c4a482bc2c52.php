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
		<span>后台管理员列表</span>
	</div>
	<form action="__SELF__" method='post'>
		<table class="table">
		    <tr>
				<td width='45%' align='right'>角色：</td>
				<td>
				    <?php foreach ($rData as $k => $v): ?>
                    	<input type="checkbox" name="rid[]" value="<?php echo $v['id']; ?>" />
                    	<?php echo $v['rname']; ?>
                    <?php endforeach; ?>
				</td>
			</tr>
			<tr>
				<td width='45%' align='right'>管理员账号：</td>
				<td>
					<input type="text" name='adminusername'/>
				</td>
			</tr>
			<tr>
				<td align='right'>密码：</td>
				<td>
					<input type="password" name='password'/>
				</td>
			</tr>
			<tr>
				<td align='right'>确认密码：</td>
				<td>
					<input type="password" name='passworded'/>
				</td>
			</tr>
		 
			<tr>
				<td colspan='2'>
					<input type="submit" value='保存添加' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>

 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>