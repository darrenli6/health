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

<script> var mynation='';
         var checkStu="<?php echo U('checkStuid');?>";
</script>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> 
	<div class='status'>
		<span><?php echo ($title); ?></span>
	</div>
	<form action="__SELF__" method='post' name="addstu">
	<input type="hidden" name='id' value="<?php echo $info['id'];?>"/>
		<table class="table">
			<tr >
				<td width='45%' align='right'>
				<span style="color:red;" >*</span>
				教师姓名：</td>
				<td colspan="5">
					<input type="text" name='name' value="<?php echo $info['name'];?>"/>
				</td>
			</tr>
			<tr >
				<td width='45%' align='right'>
				<span style="color:red;" >*</span>
				身份证号：</td>
				<td colspan="5">
					<input type="text" name='idcard' value="<?php echo $info['idcard'];?>"/>
				</td>
			</tr>
			 <tr>
				<td width='45%' align='right'>性别：</td>
				<td colspan="5">
					 <input type="radio" name="sex"  <?php if($info['sex']=='女') echo 'checked="checked"'; ?> value="女" />女
					 <input type="radio" name="sex"  <?php if($info['sex']=='男') echo 'checked="checked"'; ?> value="男" />男
				</td>
			</tr>
	 	  <tr>
				<td width='45%' align='right'>
				 
				民族:</td>
				<td colspan="5">
					<select name="nation" id="nation">
					    
					</select>
				</td>
			</tr>
			<tr>
				<td width='45%' align='right'>出生年月：</td>
				<td colspan="5">
					<input type="text" readonly="readonly" name='birthday' value="<?php echo $info['birthday'];?>" />
				</td>
			</tr>
				<tr>
				<td width='45%' align='right'>入校时间：</td>
				<td colspan="5">
					<input type="text" readonly="readonly" name='toschooltime' value="<?php echo $info['toschooltime'];?>"  />
				</td>
			</tr>
			<tr>
				<td width='45%' align='right'>家庭地址：</td>
				<td colspan="5">
				    <select name="province" id="provice">
    						<option value="">请选择</option>
    						<option value="<?php echo $address[0]; ?>" selected="selected"  ><?php echo $address[0]; ?></option>
    					</select>&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="city" id="city">
                            <option value="">请选择</option>
                            <option value="<?php echo $address[1]; ?>" selected="selected"  ><?php echo $address[1]; ?></option>
                  </select>
					<input type="text" name='country' value="<?php echo $address[2]; ?>" />
				</td>
			</tr>
			
		
			
			<tr>
				<td width='45%' align='right'>联系方式：</td>
				<td colspan="5">
					<input type="text" name='tel'value="<?php echo $info['tel'];?>" />
				</td>
			</tr>
			<tr>
				<td width='45%' align='right'>健康状况：</td>
				<td colspan="5">
					<input type="text" name='healthstatue' value="<?php echo $info['healthstatue'];?>"/>
				</td>
			</tr>
			
			<tr>
				<td width='45%' align='right'>免冠照片：</td>
				<td colspan="5">
					 <input  type="file"   id="uploadlogo" />
					 <span style="color:red;">*请上传png,jpeg,jpg,gif格式的图片</span>
					 <?php if(!empty($info['onephoto'])){ ?>
					  <img src="<?php echo C('SHOWIMAGE').$info['onephoto']; ?>" width="120px" height="120px"   />
					  <input type="hidden" name="onephoto" value="<?php echo $info['onephoto']; ?>"  />
					 <?php  } ?>
                     <div class="showimg">
                     
	                 </div>
	 			</td>
			</tr>
			
			
			<tr>
				<td width='45%' align='right'>基层单位：</td>
				<td colspan="5">
					<input type="text" name='basicjob' value="<?php echo $info['basicjob'];?>"/>
				</td>
			</tr>
		
	
			<tr>
				<td width='45%' align='right'>教学成果：</td>
				<td colspan="5">
				    <textarea cols="50" rows="6" name='teachachievement'  >
				    <?php echo $info['teachachievement'];?>
				    </textarea>
					 
				</td>
			</tr>
			
			<tr>
				<td width='45%' align='right'>科研成果：</td>
				<td colspan="5">
				    <textarea cols="50" rows="6" name='scienceachievement'  >
				    <?php echo $info['scienceachievement'];?>
				    </textarea>
					 
				</td>
			</tr>
				<tr>
				<td width='45%' align='right'>学术研究：</td>
				<td colspan="5">
				    <textarea cols="50" rows="6" name='studyresearch'   >
				    <?php echo $info['studyresearch'];?>
				    </textarea>
					 
				</td>
			</tr>
			
		   </tr>
		

			<tr>
				<td colspan='7'>
					<input type="submit" value='保存添加' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>

	<script type="text/javascript">
	       var LOADCLASS="<?php echo U('ajaxLoadClass');?>";
	       var IMAGEURL="<?php echo U('ajaxLoadFace');?>";
	       var mynation="<?php echo $info['nation']; ?>";
	</script>
	 <!-- 引入时间插件 -->
	 
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/time_plugin/css/jquery-ui.css" />
	<script type="text/javascript" src="__PUBLIC__/time_plugin/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/time_plugin/js/jquery.ui.datepicker-zh-CN.js"></script>
	<script type="text/javascript" src="__PUBLIC__/time_plugin/js/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="__PUBLIC__/time_plugin/js/jquery-ui-timepicker-zh-CN.js"></script>
	<script type="text/javascript">
	$( "input[name='birthday']" ).datepicker();
	$( "input[name='toschooltime']" ).datepicker();
	$("#objtime").datepicker();
	$("#gtime").datepicker();
	$("#istime").datepicker();
	$("#ietime").datepicker();
	</script>
	<!--导入在线编辑器 -->
	<link href="__PUBLIC__/umeditor1_2_2-utf8-php/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor1_2_2-utf8-php/umeditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor1_2_2-utf8-php/umeditor.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js"></script>
	<script>
	UM.getEditor('stuinfo', {
		initialFrameWidth : "80%",
		initialFrameHeight : 350,
		scaleEnabled:true
	});
	</script>		
 <script type="text/javascript" src="__PUBLIC__/Js/selectClass.js"></script>
 <script type="text/javascript" src="__PUBLIC__/Js/city.js"></script> 
 	<script type="text/javascript" src='__PUBLIC__/Js/addstu.js'></script>  
 <script type="text/javascript" src="__PUBLIC__/Js/uploadstuimage.js"></script> 
 <script type="text/javascript" src="__PUBLIC__/Js/nation.js"></script>  
 <script type="text/javascript">
  function additemgrand(obj){
	 var item=$(obj).parent().parent().clone();
	 
	 $('#graduateinfo').append(item);
	  
  }
  function additempart(obj){
		 var item=$(obj).parent().parent().clone();
		 
		 $('#partinfo').append(item);
		  
	  }
  function additemill(obj){
		 var item=$(obj).parent().parent().clone();
		 
		 $('#illinfo').append(item);
		  
	  }
  function reduceitem(obj){
	  
		 $(obj).parent().parent().remove();
		// $('#graduateinfo').append(item);
  }
 
 </script>
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>