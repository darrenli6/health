<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>教师健康管理平台</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
	<base target="iframe" />
</head>
<body>
  
	<div id="top">
		<div class='logo'></div>
		<div class='t_title'>教师健康管理平台</div>
		<div class='menu'>
			<ul>
				<li class='first first_cur'>
					<a href="<?php echo U('copy');?>"><span>首&nbsp;页</span></a>
				</li>
				<li class='next'>
					<a href="<?php echo U('Stu/index');?>"><span>教师用户管理</span></a>
				</li>
				 
				<li class='last'>
					<a href="<?php echo U('Single/indexill');?>"><span>病历列表</span><div></div></a>
				</li> 
				
			</ul>
			<div id='user'>
				<span class='user_state'>当前管理员：[<span><?php echo ($_SESSION['adminusername']); ?></span>]</span>
				<a href="<?php echo U('Login/logout');?>" target='_self' id='login_out'></a>
			</div>
		</div>
	</div>
 
	<div id='left'  >
	  <?php $btns=D('Privilege')->getBtns(); foreach($btns as $k=>$v): if($_SESSION['uid']==1) { if($v['id']>=15) continue; } ?>
		<div class='nav'>
			<div class="nav_u"><span class="pos down"><?php echo $v['priname'];?></span></div>
		</div>
		<ul class='option'>
		   <?php foreach($v['children'] as $k1=>$v1 ):?>
			<li><a href="<?php echo U($v1['modulename'].'/'.$v1['controllername'].'/'.$v1['actionname']);?>">
			<?php echo $v1['priname']; ?></a></li>
		   <?php endforeach; ?>
		</ul>
        <?php endforeach; ?>
	</div>
	<div id="right" >
		<iframe src="<?php echo U('copy');?>" frameborder="0" name='iframe'></iframe>
	</div>
</body>
	<script type="text/javascript" src='__PUBLIC__/Js/lib/jquery-1.8.2.min.js'></script>
	<script type="text/javascript" src='__PUBLIC__/Js/index.js'></script>
</html>