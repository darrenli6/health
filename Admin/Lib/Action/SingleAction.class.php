<?php
/**
 * 用户管理控制器
 */
Class SingleAction extends CommonAction {
    
    Public function editline () {
        $uid=session('uid');
        $id= $this->_get('id','intval');
        if($this->isPost()){
    
            $data=array(
                'id'=>$this->_post('id'),
                'itemname'=>$this->_post('itemname'),
                'itemvalue'=>$this->_post('itemvalue'),
                'addtime'=>$this->_post('addtime'),
                'uid' =>$uid,
            );
             
            if (!!$aid=M('Illitem')->data($data)->save()) {
                 
                $this->success('修改成功', U('indexline'));
                 
            } else {
                $this->error('修改失败，请重试...');
                 
            }
            exit;
        }
         
        $this->iData=M('Illitem')->find($id);
         
         
        $this->assign(array(
            'title'=>'修改血糖血压',
        ));
        $this->display();
    }
    
    public function delline(){
        $id=$this->_get('id');
        
        if(M('illitem')->delete($id)){
            $this->success('删除成功',U('indexline'));
        }else{
            $this->error('删除失败');
        }
        
    }
    public function indexline(){
        $uid=session('uid');
        
        $this->illitem=M('illitem')
        ->where(array(
            'uid'=>array('eq',$uid),
        ))
        ->select();
        $this->title='血糖血压';
        $this->display();
    }
    
    public function addline(){
         $uid=session('uid');
         
        if($this->isPost()){
            $data=array(
                'itemname'=>$this->_post('itemname'),
                'itemvalue'=>$this->_post('itemvalue'),
                'addtime'=>$this->_post('addtime'),
                'uid' =>$uid,
            );
            if(M('illitem')->add($data)){
                $this->success('添加成功',U('indexline'));
            }else{
                $this->error('添加失败');
            }
            die;
            
        }
        $this->title='添加信息';
        $this->display();
    }

	/**
	 * ill
	 */
	Public function indexill () {
		$this->illData = M('Illhistory')
		->where(
		    array(
		        'tid'=>array('eq',$_SESSION['uid']),
		    ))
		->select();
		
		 
		$this->assign(array(
		    'title'=>'病史列表',
		));
		
		$this->display();
	}

	/**
	 *addill
	 */
	Public function addill () {
	    if($this->isPost()){
	      
	        
	        $data = array(
	            'illstart' => $this->_post('illstart'),
	            'illend' => $this->_post('illend'),
	            'illname'=> $this->_post('illname'),
	            'tid'   =>$_SESSION['uid'],
	        );
	        
	        if (!!$aid=M('Illhistory')->data($data)->add()) {
	            
	            $this->success('添加成功', U('indexill'));
	            
	        } else {
	            $this->error('添加失败，请重试...');
	        
	        }
	        exit;
	    }
	    
	
	    
	    $this->assign(array(
	        'title'=>'添加病史',
	    ));
		$this->display();
	}



	/**
	 * 删除后台管理员
	 */
	Public function delill() {
		$id = $this->_get('id', 'intval');
      
        
		if (M('Illhistory')->delete($id)) {
		  
			$this->success('删除成功', U('indexill'));
		} else {
			$this->error('删除失败，请重试...');
		}
		
	}
 

	Public function editill () {
	   $id= $this->_get('id','intval');
	   if($this->isPost()){

	       $data = array(
	           'id'       => $this->_post('id'),
	           'illstart' => $this->_post('illstart'),
	           'illend'   => $this->_post('illend'),
	           'illname'  => $this->_post('illname'),
	           'tid'   =>$_SESSION['uid'],
	       );
	        
	       if (!!$aid=M('Illhistory')->data($data)->save()) {
	            
	           $this->success('修改成功', U('indexill'));
	            
	       } else {
	           $this->error('修改失败，请重试...');
	            
	       }
	       exit;
	   }   
	  
	    $this->iData=M('Illhistory')->find($id);
	    
	  
	    $this->assign(array(
	        'title'=>'修改病史信息',
	    ));
		$this->display();
	}
  
	/*
	 * parttime
	 * */
	
	

	/**
	 * job
	 */
	Public function indexparttime () {
	    $this->pData = M('Parttime')
	    ->where(
	        array(
	            'tid'=>array('eq',$_SESSION['uid']),
	        ))
	    ->select();
	
	    	
	    $this->assign(array(
	        'title'=>'工作列表',
	    ));
	
	    $this->display();
	}
	
	/**
	 *addill
	 */
	Public function addparttime () {
	    if($this->isPost()){
	         
	         
	        $data = array(
	            'position' => $this->_post('position'),
	            'type' => $this->_post('type'),
	            'groupname'=> $this->_post('groupname'),
	            'ptime' =>  $this->_post('ptime'),
	            'tid'   =>$_SESSION['uid'],
	        );
	         
	        if (!!$aid=M('Parttime')->data($data)->add()) {
	             
	            $this->success('添加成功', U('indexparttime'));
	             
	        } else {
	            $this->error('添加失败，请重试...');
	             
	        }
	        exit;
	    }
	     
	
	     
	    $this->assign(array(
	        'title'=>'添加工作经历',
	    ));
	    $this->display();
	}
	
	
	
	/**
	 * 删除后台管理员
	 */
	Public function delparttime() {
	    $id = $this->_get('id', 'intval');
	
	
	    if (M('Parttime')->delete($id)) {
	
	        $this->success('删除成功', U('indexparttime'));
	    } else {
	        $this->error('删除失败，请重试...');
	    }
	
	}
	
	
	Public function editparttime() {
	    $id= $this->_get('id','intval');
	    if($this->isPost()){
	
	        $data = array(
	            'id'       => $this->_post('id'),   
	            'position' => $this->_post('position'),
	            'type' => $this->_post('type'),
	            'groupname'=> $this->_post('groupname'),
	            'ptime' =>  $this->_post('ptime'),
	            'tid'   =>$_SESSION['uid'],
	        );
	         
	        if (!!$aid=M('Parttime')->data($data)->save()) {
	             
	            $this->success('修改成功', U('indexparttime'));
	             
	        } else {
	            $this->error('修改失败，请重试...');
	             
	        }
	        exit;
	    }
	     
	    $this->pData=M('Parttime')->find($id);
	     
	     
	    $this->assign(array(
	        'title'=>'修改工作信息',
	    ));
	    $this->display();
	}
	
	 

	/**
	 * academic
	 */
	Public function indexacademic () {
	    $this->aData = M('academicinfo')
	    ->where(
	        array(
	            'tid'=>array('eq',$_SESSION['uid']),
	        ))
	    ->select();
	
	    	
	    $this->assign(array(
	        'title'=>'学术研究列表',
	    ));
	
	    $this->display();
	}
	
	/**
	 *addill
	 */
	Public function addacademic () {
	    if($this->isPost()){
	         
	         
	        $data = array(
	            'graduatetime' => $this->_post('graduatetime'),
	            'graduateschool' => $this->_post('graduateschool'),
	            'major'=> $this->_post('major'),
	            'tid'   =>$_SESSION['uid'],
	        );
	         
	        if (!!$aid=M('Academicinfo')->data($data)->add()) {
	             
	            $this->success('添加成功', U('indexacademic'));
	             
	        } else {
	            $this->error('添加失败，请重试...');
	             
	        }
	        exit;
	    }
	     
	
	     
	    $this->assign(array(
	        'title'=>'添加工作经历',
	    ));
	    $this->display();
	}
	
	
	
	/**
	 * 删除学术信息
	 */
	Public function delacademic() {
	    $id = $this->_get('id', 'intval');
	
	
	    if (M('Academicinfo')->delete($id)) {
	
	        $this->success('删除成功', U('indexacademic'));
	    } else {
	        $this->error('删除失败，请重试...');
	    }
	
	}
	
	
	Public function editacademic () {
	    $id= $this->_get('id','intval');
	    if($this->isPost()){
	
	        $data = array(
	            'id'       => $this->_post('id'),
	            'graduatetime' => $this->_post('graduatetime'),
	            'graduateschool' => $this->_post('graduateschool'),
	            'major'=> $this->_post('major'),
	            'tid'   =>$_SESSION['uid'],
	        );
	         
	        if (!!$aid=M('academicinfo')->data($data)->save()) {
	             
	            $this->success('修改成功', U('indexacademic'));
	             
	        } else {
	            $this->error('修改失败，请重试...');
	             
	        }
	        exit;
	    }
	     
	    $this->aData=M('Academicinfo')->find($id);
	     
	     
	    $this->assign(array(
	        'title'=>'修改学术信息',
	    ));
	    $this->display();
	}
	
	
	public function basic(){
	    if(empty($_GET['tid'])){
	        $tid=$_SESSION['uid'];
	    }else{
	        $tid=$_GET['tid'];
	    }
	    $this->iData = M('Illhistory')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	        ))
	        ->select();
	    $this->psData = M('Parttime')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	            'type'=>array('eq','社会团体'),
	        ))
	        ->select();
	    $this->paData = M('Parttime')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	            'type'=>array('eq','学术团体'),
	        ))
	        ->select();
	    
	    
	    $this->aData = M('Academicinfo')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	        ))
	        ->select();
	    $this->assign('alength',count($this->aData)+1);
	    $this->bData = M('Teach')
	    ->where(
	        array(
	            'aid'=>array('eq',$tid),
	        ))
	        ->find();
	    
	    
	    $this->title='教师个人信息';
	    $this->display();
	}
	
	public function addprofile(){
	    $uid=$_SESSION['uid'];
	    if($this->isPost()){
	        $aid=M('teach')->where("aid=$uid")->find();
	        $address=$_POST['province'].'-'.$_POST['city'].'-'.$_POST['country'];
       
	        if($aid){
	            $id=$this->_post('id');
	            
	            $data=array(
	                
	                'name'=>$this->_post('name'),
	                'sex'=>$this->_post('sex'),
	                'birthday'=>$this->_post('birthday'),
	                'nation'=>$this->_post('nation'),
	                'toschooltime'=>$this->_post('toschooltime'),
	                'idcard'=>$this->_post('idcard'),
	                'tel'=>$this->_post('tel'),
	                'healthstatue'=>$this->_post('healthstatue'),
	                'address'=>$address,
	                'basicjob'=>$this->_post('basicjob'),
	                'teachachievement'=>$this->_post('teachachievement'),
	                'scienceachievement'=>$this->_post('scienceachievement'),
	                'studyresearch'=>$this->_post('studyresearch'),
	                'onephoto'=>$this->_post('onephoto'),
	            );
	            if (M('teach')->where("aid=$uid AND id=$id")->data($data)->save()) {
	                 
	                $this->success('修改成功', U('addprofile'));
	                 
	            } else {
	                
	                $this->error('修改失败，请重试...');
	                 
	            }
	            exit;
	            
	            
	        }else{
	            
	           $data=array(
	               'name'=>$this->_post('name'),
	               'sex'=>$this->_post('sex'),
	               'birthday'=>$this->_post('birthday'),
	               'nation'=>$this->_post('nation'),
	               'toschooltime'=>$this->_post('toschooltime'),
	               'idcard'=>$this->_post('idcard'),
	               'tel'=>$this->_post('tel'),
	               'healthstatus'=>$this->_post('healthstatus'),
	               'address'=>$this->_post('address'),
	               'basicjob'=>$this->_post('basicjob'),
	               'teachachievement'=>$this->_post('teachachievement'),
	               'scienceachievement'=>$this->_post('scienceachievement'),
	               'studyresearch'=>$this->_post('studyresearch'),
	               'aid'=>$uid,
	           ); 
	          
	           if (M('Teach')->data($data)->add()) {
	                
	               $this->success('添加成功', U('addprofile'));
	                
	           } else {
	               
	               $this->error('添加失败，请重试...');
	                
	           }
	           exit;
	           
	            
	        }
	        
	    }
	    
	    $this->info=M('teach')->where("aid=$uid")->find();
	    $address=explode('-', $this->info['address']);
	    $this->address=$address;
	    $this->assign('title','填写基本信息');
	    $this->display();
	    
	}
	
	
	public function ajaxLoadFace(){
	    if(!$this->isAjax()){
	        echo 'failed';
	        die;
	    }
	
	    if (isset($_POST['upload'])) {
	
	        $result=array();
	         
	        $arr=explode('.', $_FILES['uploadlogo']['name']);
	        $size=count($arr)-1;
	        $file_name = microtime(true).time().'.'.$arr[$size];
	         
	        $res=checkImage($_FILES['uploadlogo']);
	         
	        if(!empty($res)) die(json_encode($res));
	
	        $bool=move_uploaded_file($_FILES['uploadlogo']['tmp_name'],C('UPLOAD_PATH') . $file_name);
	         
	        if($bool)  {
	            $result['state']   = 1;
	            $result['file_name']=$file_name;
	        }
	
	        die(json_encode($result));
	
	    }
	
	}
	
	public function topdf(){
	    
	    if(empty($_GET['tid'])){
	        $tid=$_SESSION['uid'];
	    }else{
	        $tid=$_GET['tid'];
	    }
	    
	    $html=$this->getContent($tid);
	  
	    
	    
	    include("./Public/mpdf/mpdf.php");
	    
	    
	    $mpdf = new mPDF('zh-CN');
	    $mpdf->useAdobeCJK = true;
	    $mpdf->WriteHTML($html);
	    $mpdf->Output();
	    exit;
	    
	}
	
	private function getContent($tid){
	    $html='';
	    
	    $this->iData = M('Illhistory')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	        ))
	        ->select();
	    $this->psData = M('Parttime')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	            'type'=>array('eq','社会团体'),
	        ))
	        ->select();
	    $this->paData = M('Parttime')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	            'type'=>array('eq','学术团体'),
	        ))
	        ->select();
	     
	     
	    $this->aData = M('Academicinfo')
	    ->where(
	        array(
	            'tid'=>array('eq',$tid),
	        ))
	        ->select();
	    $this->alength=count($this->aData)+1;
	    $this->bData = M('Teach')
	    ->where(
	        array(
	            'aid'=>array('eq',$tid),
	        ))
	        ->find();
	     
	     
	    $this->title='教师个人信息';
	    
	    
	    
	    $html='
	        
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
    
	<div class="status">
		<span>'.$this->title.'</span>
	</div>

  <table>
        <tr >
            <td rowspan="3">基本情况</td>
            <td>姓名</td>
            <td>'.$this->bData['name'].'</td>
            <td>性别</td>
            <td>'.$this->bData['sex'].'</td>
            <td>出生年月</td>
            <td>'.$this->bData['birthday'].'</td>
            <td rowspan="2" >';
	    
             if($this->bData["onephoto"])
				    $html.='<img src="'.C('SHOWIMAGE').$this->bData['onephoto'].'" width="100px" height="100px" />';
				     else
				    $html.= '<img src="./Admin/Tpl/default/Public/Images/people.png" width="100px" height="100px" />';
				    
          $html.='  
            </td>
              
        </tr>
            <tr >
           <td colspan="1">身份证号</td>
           <td colspan="1">'.$this->bData['idcard'].'</td>
           <td colspan="1">入校时间</td>
           <td colspan="1">'.$this->bData['toschooltime'].'</td>
           <td colspan="1">家庭住址,电话</td>
           <td colspan="1">
           
           '.$this->bData['address'].','.$this->bData['tel'].'
           
           </td>
           
              
        </tr>
          <tr >
           <td colspan="1">健康状况</td>
           <td colspan="1">'.$this->bData['healthstatue'].'</td>
           <td colspan="1">民族</td>
           <td colspan="1">'.$this->bData['nation'].'</td>
           <td colspan="2">所在基层单位</td>
           <td colspan="2">'.$this->bData['basicjob'].'</td>
             
        </tr>
      
   <tr >
            <td rowspan="'.$this->alength.'">学历状况</td>
           <td colspan="2"></td>
           <td colspan="2">毕业时间</td>
           <td colspan="2">毕业学校</td>
           <td colspan="2">所学专业</td>';
          
         foreach($this->aData as $k=>$v):
         $html.='<tr >';
         $html.='   <td colspan="2">第'.($k+1).'次教育</td>';
          $html.=' <td colspan="2">'.$v['graduatetime'].'</td>';
         $html.='  <td colspan="2">'.$v['graduateschool'].'</td>';
         $html.='  <td colspan="2">'.$v['major'].'</td>';
              
       $html.=' </tr>';
        
    endforeach; 
    
    $html.='
 <tr >
            <td rowspan="3">工作情况</td>
           <td colspan="2">教学成果</td>
           <td colspan="6">'.$this->bData['teachachievement'].'</td>
         
        </tr>
            <tr >
            <td colspan="2">科学成果</td>
           <td colspan="6">'.$this->bData['scienceachievement'].'</td>   
        </tr>
     
       <tr >
            <td colspan="2">学术专著</td>
           <td colspan="6">'.$this->bData['studyresearch'].'</td>   
        </tr>


         <tr >';
          $html.=  '<td rowspan="'.(count($this->psData)+count($this->paData)+1).'">社会兼职</td>
           <td colspan="2"></td>
           <td colspan="2">职务</td>
           <td colspan="2">任职时间</td>
           <td colspan="2">团体名称</td>
        </tr>
            <tr >
            <td rowspan="<?php echo count($paData); ?>" colspan="2">学术团体</td>
           <td colspan="2">'.$this->paData[0][position].'</td>
           <td colspan="2">'.$this->paData[0][ptime].'</td>
           <td colspan="2">'.$this->paData[0][groupname].'</td>
              
        </tr>';
        
         if($this->paData[1]):
               foreach($this->paData as $k=>$v):
               if($k==0) continue;
            
         $html.='      <tr >';
          
           $html.='  <td colspan="2">'.$v[position].'</td>';
           $html.='  <td colspan="2">'.$v[ptime].'</td>';
          $html.='   <td colspan="2">'.$v[groupname].'</td>';
              
         $html.=' </tr>';
        
      
         endforeach;
         endif;   
      $html.='<tr >';
      $html.='      <td rowspan="'.count($this->psData).'" colspan="2">社会团体</td>';
       $html.=' <td colspan="2">'.$this->psData[0][position].'</td>';
       $html.='      <td colspan="2">'.$this->psData[0][ptime].'</td>';
       $html.='      <td colspan="2">'.$this->psData[0][groupname].'</td>';
       $html.='  </tr>';
     if($this->psData[1]):
               foreach($this->psData as $k=>$v):
               if($k==0) continue;
             
        $html.='<tr >';
          
           $html.='  <td colspan="2">'.$v['position'].'</td>';
         $html.='    <td colspan="2">'.$v['ptime'].'</td>';
          $html.='   <td colspan="2">'.$v['groupname'].'</td>';
              
        $html.='  </tr>';
    
         endforeach;
         endif;  
         
        $html.='<tr >
            <td rowspan="'.(count($this->iData)+1).'">病史</td>
           <td colspan="2"></td>
           <td colspan="2">名称</td>
           <td colspan="2">开始时间</td>
           <td colspan="2">结束时间</td>';
         foreach($this->iData as $k=>$v): 
           $html.=' <tr >
            <td colspan="2">第'.($k+1).'次病历</td>
           <td colspan="2">'.$v['illname'].'</td>
           <td colspan="2">'.$v['illstart'].'</td>
           <td colspan="2">'.$v['illend'].'</td>
              
        </tr>';
      endforeach;
     $html.='
          <tr >
           
                      
              
        </tr>
    
    </table>
  
	    ';    
	    
	    return $html;
	}
	 
}
