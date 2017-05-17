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

<style type="text/css">
table {
    position: relative;
    margin: auto;
    border: 1px solid black;
    height: 400px;
    width: 1000px;
    border-spacing: 0px;
    border-collapse: collapse;
}
 
table tr td {
    border: 1px solid black;
    width: 100px;
    height: 50px;
}
 
table tr {
    height: 50px;
}
.print{
	width:200px;
	margin-left:80%;
}
</style>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> 
    <div class="print">
    <a href="<?php echo U('topdf',array('tid'=>$bData[aid]));?>" class='down_file' target="_blank" ></a>
	</div>
	<div class='status'>
		<span><?php echo ($title); ?></span>
	</div>


  <table>
        <tr >
            <td rowspan="3">基本情况</td>
            <td>姓名</td>
            <td><?php echo $bData['name']; ?></td>
            <td>性别</td>
            <td><?php echo $bData['sex']; ?></td>
            <td>出生年月</td>
            <td><?php echo $bData['birthday']; ?></td>
            <td rowspan="2" >
             <?php if($bData["onephoto"]): ?><img src="<?php echo C('SHOWIMAGE').$bData['onephoto']; ?>" width="100px" height="100px" />
				      <?php else: ?>
				         <img src="__PUBLIC__/Images/people.png" width="100px" height="100px" /><?php endif; ?>
            
            </td>
              
        </tr>
            <tr >
           <td colspan="1">身份证号</td>
           <td colspan="1"><?php echo $bData['idcard']; ?></td>
           <td colspan="1">入校时间</td>
           <td colspan="1"><?php echo $bData['toschooltime']; ?></td>
           <td colspan="1">家庭住址,电话</td>
           <td colspan="1">
           
           <?php echo $bData['address'].','.$bData['tel']; ?>
           
           </td>
           
              
        </tr>
          <tr >
           <td colspan="1">健康状况</td>
           <td colspan="1"><?php echo $bData['healthstatue']; ?></td>
           <td colspan="1">民族</td>
           <td colspan="1"><?php echo $bData['nation']; ?></td>
           <td colspan="2">所在基层单位</td>
           <td colspan="2"><?php echo $bData['basicjob']; ?></td>
             
        </tr>
      
   <tr >
            <td rowspan="<?php echo $alength ?>">学历状况</td>
           <td colspan="2"></td>
           <td colspan="2">毕业时间</td>
           <td colspan="2">毕业学校</td>
           <td colspan="2">所学专业</td>
        <?php foreach($aData as $k=>$v): ?>
            <tr >
            <td colspan="2">第<?php echo $k+1; ?>次教育</td>
           <td colspan="2"><?php echo $v['graduatetime']; ?></td>
           <td colspan="2"><?php echo $v['graduateschool']; ?></td>
           <td colspan="2"><?php echo $v['major']; ?></td>
              
        </tr>
     <?php  endforeach; ?>
 <tr >
            <td rowspan="3">工作情况</td>
           <td colspan="2">教学成果</td>
           <td colspan="6"><?php echo $bData['teachachievement']; ?></td>
         
        </tr>
            <tr >
            <td colspan="2">科学成果</td>
           <td colspan="6"><?php echo $bData['scienceachievement']; ?></td>   
        </tr>
     
       <tr >
            <td colspan="2">学术专著</td>
           <td colspan="6"><?php echo $bData['studyresearch']; ?></td>   
        </tr>


         <tr >
            <td rowspan="<?php echo count($psData)+count($paData)+1; ?>">社会兼职</td>
           <td colspan="2"></td>
           <td colspan="2">职务</td>
           <td colspan="2">任职时间</td>
           <td colspan="2">团体名称</td>
        </tr>
            <tr >
            <td rowspan="<?php echo count($paData); ?>" colspan="2">学术团体</td>
           <td colspan="2"><?php echo $paData[0][position]; ?></td>
           <td colspan="2"><?php echo $paData[0][ptime]; ?></td>
           <td colspan="2"><?php echo $paData[0][groupname]; ?></td>
              
        </tr>
        <?php  if($paData[1]): foreach($paData as $k=>$v): if($k==0) continue; ?>
        <tr >
          
           <td colspan="2"><?php echo $v['position'] ?></td>
           <td colspan="2"><?php echo $v['ptime'] ?></td>
           <td colspan="2"><?php echo $v['groupname'] ?></td>
              
        </tr>
     <?php  endforeach; endif; ?>

              <tr >
            <td rowspan="<?php echo count($psData); ?>" colspan="2">社会团体</td>
        <td colspan="2"><?php echo $psData[0][position]; ?></td>
           <td colspan="2"><?php echo $psData[0][ptime]; ?></td>
           <td colspan="2"><?php echo $psData[0][groupname]; ?></td>
              
        </tr>
    
    <?php  if($psData[1]): foreach($psData as $k=>$v): if($k==0) continue; ?>
        <tr >
          
           <td colspan="2"><?php echo $v['position'] ?></td>
           <td colspan="2"><?php echo $v['ptime'] ?></td>
           <td colspan="2"><?php echo $v['groupname'] ?></td>
              
        </tr>
     <?php  endforeach; endif; ?>
        <tr >
            <td rowspan="<?php echo count($iData)+1; ?>">病史</td>
           <td colspan="2"></td>
           <td colspan="2">名称</td>
           <td colspan="2">开始时间</td>
           <td colspan="2">结束时间</td>
        <?php foreach($iData as $k=>$v): ?>
            <tr >
            <td colspan="2">第<?php echo $k+1; ?>次病历</td>
           <td colspan="2"><?php echo $v['illname']; ?></td>
           <td colspan="2"><?php echo $v['illstart']; ?></td>
           <td colspan="2"><?php echo $v['illend']; ?></td>
              
        </tr>
     <?php  endforeach; ?>
          <tr >
           
                      
              
        </tr>
    
    </table>
 
<script>
var SHOWIMAGE="/health/Public/Upload/";
</script>
</body>
</html>