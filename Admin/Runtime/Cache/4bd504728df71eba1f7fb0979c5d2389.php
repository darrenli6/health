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

<link rel="stylesheet" href="__PUBLIC__/Css/stuindex.css" />

 
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<div class='status'>
		<span><?php echo ($title); ?></span>
	</div>
	<table class='table'>
		<tr>
			<th>ID</th>
			<th>用户名</th>
			<th>教师姓名</th>
			<th>免冠照片</th>
			<th>身份证号</th>
			<th>性别</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($CData)): foreach($CData as $key=>$v): ?><tr>
			    <td width='50' align='center'><?php echo ($v["id"]); ?></td> 
				<td width='50' align='center'><?php echo ($v["adminusername"]); ?></td>
				<td width='100'><?php echo ($v["name"]); ?></td>
				<td width="200">
				      <?php if($v["onephoto"]): ?><img src="<?php echo ($imagepath); echo ($v[onephoto]); ?>" width="120px" height="120px" />
				      <?php else: ?>
				         <img src="__PUBLIC__/Images/people.png" width="120px" height="120px" /><?php endif; ?>
				</td>
				<td  align='center'>
					<?php echo ($v["idcard"]); ?>
				</td>
				<td  align='center'>
					<?php echo ($v["sex"]); ?>
				</td>
				<td width='300' align='center'>
				
				<a href="<?php echo U('Single/basic', array('tid' => $v['aid']));?>" class='see'></a>
				
			
				 </td>
			</tr><?php endforeach; endif; ?>
		<tr height='50'>
			<td align='center' colspan='7'><?php echo ($page); ?></td>
		</tr>
		
	</table>

 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>