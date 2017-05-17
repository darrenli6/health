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
    <a href="<?php echo U('add');?>" class='addbtn' ></a> 
	<div class='status'>
		<span><?php echo ($title); ?></span>
	</div>
	<table class="table">
		<tr>
		    <th>ID</th>
			<th>权限名称</th>
			<th>模块名</th>
			<th>控制器名</th>
			<th>方法名</th>
			<th>上级分类</th>
			<th>操作</th>
		</tr>
		<?php foreach($data as $k=>$v): ?>
			<tr>
			    <td><?php echo $v['id']; ?></td>
				<td><?php echo str_repeat('-', 8*$v['level']); echo $v['priname']; ?></td>
				<td><?php echo $v['modulename']; ?></td>
				<td><?php echo $v['controllername']; ?></td>
				<td><?php echo $v['actionname']; ?></td>
				<td><?php echo $v['parentid']; ?></td>
				<td width='240'>
                <a href="<?php echo U('edit', array('id' => $v['id']));?>" class='edit'></a>
				<a href="<?php echo U('del', array('id' => $v['id']));?>" class='del'></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
 
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>