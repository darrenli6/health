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
		<span><?php echo ($title); ?></span>
	</div>
	<form action="__SELF__" method='post'>
		<table class="table">
			
			<tr>
				<td align='right'>时间:</td>
				<td>
					<input type="text" readonly="readonly" name='addtime'/>
				</td>
			</tr>
			<tr>
				<td align='right'>类型：</td>
				<td>
				<select name="itemname">
				 <option value="1">
				   血糖
				 </option>
				  <option value="2">
				   血压
				 </option>
				</select>
				</td>
			</tr>
		 <tr>
				<td align='right'>值：</td>
				<td>
				<input type="text" name="itemvalue" value="" /><span id="itsattr">mmol/L</span>
				</td>
			</tr>
			
			
			<tr>
				<td colspan='2'>
					<input type="submit" value='保存添加' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>
 <script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-1.8.2.min.js'></script>
<link href="__ROOT__/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="__ROOT__/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="__ROOT__/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="__ROOT__/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>


 
	 
	<script type="text/javascript">
	  $("input[name='addtime']").datepicker();
	  $("select[name='itemname']").change(function(){
		 
		  var item=$(this).children('option:selected').val();
		  if(item==2)
		{
			  $('#itsattr').text('mmhg');
	    }else{
	    	 $('#itsattr').text('mmol/L');
	    }

	  });
	
	</script>
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>