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
			<th>管理员名称</th>
			<th>角色</th>
			<th>最后登录时间</th>
			<th>最后登录IP</th>
			<th colspan="2">账号状态</th>
			<?php if($_SESSION["adminusername"]=="admin"): ?><th>操作</th><?php endif; ?>
		</tr>
		<?php if(is_array($admin)): foreach($admin as $key=>$v): ?><tr>
				<td width='50' align='center'><?php echo ($v["id"]); ?></td>
				<td width='120' align='center'><?php echo ($v["adminusername"]); ?></td>
				<td align='center'>
					<?php echo ($v["rname"]); ?>
				</td>
				<td align='center'><?php echo (date('y-m-d H:i', $v["lasttime"])); ?></td>
				<td align='center'><?php echo ($v["lastip"]); ?></td>
				<td width='60' align='center'>
					<?php if($v["locked"]): ?>锁定
					<?php else: ?>
					开放<?php endif; ?>
				</td>
				<?php if($_SESSION["adminusername"]=="admin"): ?><td width='240'>
						<?php if($v["adminusername"]=="admin"): else: ?>
						   <?php if($v["locked"]): ?><a href="<?php echo U('lockAdmin', array('id' => $v['id'], 'locked' => 0));?>" class='add lock'>解除锁定</a>
							<?php else: ?>
								<a href="<?php echo U('lockAdmin', array('id' => $v['id'], 'locked' => 1));?>" class='add lock'>锁定用户</a><?php endif; endif; ?>
					</td><?php endif; ?>
				<td>
				<?php if($v["adminusername"]=="admin"): else: ?>
				<a href='<?php echo U("edit", array("id" => $v["id"]));?>' class='edit'></a>
				<a href='<?php echo U("del", array("id" => $v["id"]));?>' class='del'></a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
 
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>