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
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
			<tr>
				<td width='45%' align='right'>上级权限:</td>
				<td>
					<select name="parentid">
					 <option value="0"></option>
					 <?php foreach($parentData as $k=>$v): ?>
					   <?php if($v['id']==$data['id'] || in_array($v['id'],$chldren) ) continue; ?>        
					      <option <?php if($v['id']==$data['parentid']): ?> selected="selected" 
					       <?php endif; ?>
					       value="<?php echo $v['id']; ?>" >
					        <?php echo str_repeat('-',8*$v['level']).$v['priname']; ?>
					      </option>
					 
					 <?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align='right'>权限名称:</td>
				<td>
					<input type="text" name='priname' value="<?php echo ($data['priname']); ?>"/>
				</td>
			</tr>
			<tr>
				<td align='right'>模块名称：</td>
				<td>
					<input type="text" name='modulename' value="<?php echo ($data['modulename']); ?>" />
				</td>
			</tr>
		   
		   	<tr>
				<td align='right'>控制器名称：</td>
				<td>
					<input type="text" name='controllername' value="<?php echo ($data['controllername']); ?>" />
				</td>
			</tr>
			
				<tr>
				<td align='right'>方法名称：</td>
				<td>
					<input type="text" name='actionname'  value="<?php echo ($data['actionname']); ?>" />
				</td>
			</tr>
			
			<tr>
				<td colspan='2'>
					<input type="submit" value='保存修改' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>

 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>