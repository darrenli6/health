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
		<input type="hidden" name="id" value="<?php echo $pData['id']; ?>" />
					<tr>
				<td align='right'>职务:</td>
				<td>
					<input type="text" name='position'value="<?php echo $pData['position']; ?>"   />
				</td>
			</tr>
			<tr>
				<td align='right'>任职时间：</td>
				<td>
					<input type="text" readonly="readonly"  name='ptime'value="<?php echo $pData['ptime']; ?>"   />
				</td>
			</tr>
		   
		   	<tr>
				<td align='right'>团体名称：</td>
				<td>
					<input type="text" name='groupname' value="<?php echo $pData['groupname']; ?>"  />
				</td>
			</tr>
			 	<tr>
				<td align='right'>类型：</td>
				<td>
					<select name="type">
					   <option value="社会团体"  <?php if($pData['type']=='社会团体') echo 'selected="selected"'; ?> >社会团体</option>
					   <option value="学术团体" <?php if($pData['type']=='学术') echo 'selected="selected"'; ?>  >学术团体</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td colspan='2'>
					<input type="submit" value='保存修改' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>
<!-- 引入时间插件 -->
	 
	 <script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-1.8.2.min.js'></script>
<link href="__ROOT__/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="__ROOT__/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="__ROOT__/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="__ROOT__/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>


  
	<script type="text/javascript">
	  $("input[name='ptime']").datepicker();
	   
	</script>
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>