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
		<table class="table">
			<tr >
				<td width='45%' align='right'>
				<span style="color:red;" >*</span>
				教师姓名：</td>
				<td colspan="5">
					<input type="text" name='name'/>
				</td>
			</tr>
		
			 <tr>
				<td width='45%' align='right'>性别：</td>
				<td colspan="5">
					 <input type="radio" name="sex" value="女" />女
					 <input type="radio" name="sex" value="男" />男
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
					<input type="text" readonly="readonly" name='birthday'/>
				</td>
			</tr>
				<tr>
				<td width='45%' align='right'>入校时间：</td>
				<td colspan="5">
					<input type="text" readonly="readonly" name='toschooltime'/>
				</td>
			</tr>
			<tr>
				<td width='45%' align='right'>家庭地址：</td>
				<td colspan="5">
				    <select name="province" id="">
    						<option value="">请选择</option>
    					</select>&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="city">
                            <option value="">请选择</option>
                  </select>
					<input type="text" name='country'  />
				</td>
			</tr>
			
		
			
			<tr>
				<td width='45%' align='right'>联系方式：</td>
				<td colspan="5">
					<input type="text" name='tel'/>
				</td>
			</tr>
			<tr>
				<td width='45%' align='right'>健康状况：</td>
				<td colspan="5">
					<input type="text" name='healthstatus'/>
				</td>
			</tr>
			
			<tr>
				<td width='45%' align='right'>免冠照片：</td>
				<td colspan="5">
					 <input  type="file"   id="uploadlogo" />
					 <span style="color:red;">*请上传png,jpeg,jpg,gif格式的图片</span>
                     <div class="showimg">
                     
	                 </div>
	 			</td>
			</tr>
			
			
			<tr>
				<td width='45%' align='right'>基层单位：</td>
				<td colspan="5">
					<input type="text" name='basicjob'/>
				</td>
			</tr>
		
	
			<tr>
				<td width='45%' align='right'>教学成果：</td>
				<td colspan="5">
				    <textarea cols="50" rows="6" name='teachachievement'  >
				    </textarea>
					 
				</td>
			</tr>
			
			<tr>
				<td width='45%' align='right'>科研成果：</td>
				<td colspan="5">
				    <textarea cols="50" rows="6" name='scienceachievement'  >
				    </textarea>
					 
				</td>
			</tr>
				<tr>
				<td width='45%' align='right'>学术研究：</td>
				<td colspan="5">
				    <textarea cols="50" rows="6" name='studyresearch'  >
				    </textarea>
					 
				</td>
			</tr>
			
		   </tr>
		   <tr>
				<td width='45%' align='right' rowspan="3" >学历情况：</td>
				<td  colspan="6"  id="graduateinfo">
				    <tr>
				     <td>毕业时间</td> <td>毕业学校</td> <td>专业</td> <td>操作</td>
				    </tr>
				    <div >
				    <tr>
					 <td>
					 <input type="text" name="graduatetime[]" id="objtime" readonly="readonly" value="" />
					  </td>
					  <td>
					  <input type="text" name="graduateschool[]"  value="" />
					 </td>
					 <td>
					  <input type="text" name="major[]"  value="" />  
					  </td>
					  <td>
					 <span onclick="additemgrand(this)">  +</span> &nbsp;<span onclick="reduceitem(this)"> -</span> 
					  </td> 
				     </tr>
				     </div>
				</td>
			</tr>
			
				   <tr>
				<td width='45%' align='right' rowspan="3" >社会兼职：</td>
				<td  colspan="5"  id="partinfo">
				    <tr>
				  <td>类型</td> <td>职务</td> <td>任职开始时间</td> <td>团体名称</td> <td>操作</td>
				    </tr>
				    <div >
				    <tr>
				    <td>
				    <select name="type[]">
				      <option value="学术团体">学术团体</option>
				      <option value="社会团体">社会团体</option>
				    </select>
				    </td>
					 <td>
					 <input type="text" name="position[]"  value="" />
					  </td>
					  <td>
					  <input type="text" name="ptime[]"  id="gtime" readonly="readonly" value="" />
					 </td>
					 <td>
					  <input type="text" name="groupname[]"  value="" />  
					  </td>
					  <td>
					 <span onclick="additempart(this)">  +</span> &nbsp;<span onclick="reduceitem(this)"> -</span> 
					  </td> 
				     </tr>
				     </div>
				</td>
			</tr>
			
				   <tr>
				<td width='45%' align='right' rowspan="3" >病史情况：</td>
				<td  colspan="6"  id="illinfo">
				    <tr>
				     <td>名称</td> <td>病开始</td> <td>病结束</td> <td>操作</td>
				    </tr>
				    <div >
				    <tr>
					 <td>
					 <input type="text" name="illname[]"  value="" />
					  </td>
					  <td>
					  <input type="text" name="illstart[]" id="istime" readonly="readonly" value="" />
					 </td>
					 <td>
					  <input type="text" name="illend[]" id="ietime" readonly="readonly" value="" />  
					  </td>
					  <td>
					 <span onclick="additemill(this)">  +</span> &nbsp;<span onclick="reduceitem(this)"> -</span> 
					  </td> 
				     </tr>
				     </div>
				</td>
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