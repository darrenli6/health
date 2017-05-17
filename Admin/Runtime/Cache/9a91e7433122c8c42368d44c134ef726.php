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
    <a href="<?php echo U('addparttime');?>" class='addbtn' ></a> 
	<div class='status'>
		<span><?php echo ($title); ?></span>
	</div>
	<table class="table">
		<tr>
		    <th>ID</th>
			<th>职务</th>
			<th>任职时间</th>
			<th>团体名称</th>
			<th>类型</th>
			
			<th>操作</th>
		</tr>
		<?php foreach($pData as $k=>$v): ?>
			<tr>
			    <td><?php echo $v['id']; ?></td>
				<td><?php echo $v['position']; ?></td>
				<td><?php echo $v['ptime']; ?></td>
				<td><?php echo $v['groupname']; ?></td>
			    <td><?php echo $v['type']; ?></td>
				<td width='240'>
                <a href="<?php echo U('editparttime', array('id' => $v['id']));?>" class='edit'></a>
				<a href="<?php echo U('delparttime', array('id' => $v['id']));?>" class='del'></a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
 
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>