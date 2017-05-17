<?php
/**
 * 用户管理控制器
 */
Class AdminAction extends CommonAction {
 

	/**
	 * 后台管理员列表
	 */
	Public function index () {
		$this->admin = M('admin')
		->alias('a')
		->field('a.*,GROUP_CONCAT(c.rname) as rname')
		->join('LEFT JOIN __ROLEADMIN__ b ON b.aid=a.id')
		->join('LEFT JOIN __ADMINROLE__ c ON c.id=b.rid')
		->group('a.id')
		->select();
		
		 
		$this->assign(array(
		    'title'=>'管理员列表',
		));
		
		$this->display();
	}

	/**
	 * 添加后台管理员
	 */
	Public function add () {
	    if($this->isPost()){
	        if ($_POST['password'] != $_POST['passworded']) {
	            $this->error('两次密码不一致');
	        }
	        
	        $unique=$this->isUnique('Admin', 'adminusername', $this->_post('adminusername'));
	        if($unique) $this->error('该用户存在,请更换用户名');
	        
	        $data = array(
	            'adminusername' => $this->_post('adminusername'),
	            'password' => $this->_post('password', 'md5'),
	            'logintime' => time(),
	            'loginip' => get_client_ip(),
	        );
	        
	        if (!!$aid=M('admin')->data($data)->add()) {
	            
	            $rids=$_POST['rid'];
	            foreach($rids as $k=>$v){
	                M('Roleadmin')->add(array(
	                    'aid'=>$aid,
	                    'rid'=>$v,
	                ));
	            }
	            $this->success('添加成功', U('index'));
	            
	        } else {
	            $this->error('添加失败，请重试...');
	        
	        }
	        exit;
	    }
	    
	    //get all adminrole
	    $rModel=M('Adminrole');
	    $this->rData=$rModel->select();
	    
	    $this->assign(array(
	        'title'=>'添加管理员信息',
	    ));
		$this->display();
	}

	/**
	 * 锁定后台管理员
	 */
	Public function lockAdmin () {
		$data = array(
			'id' => $this->_get('id', 'intval'),
			'locked' => $this->_get('locked', 'intval')
			);

		$msg = $data['locked'] ? '锁定' : '解锁';
		if (M('admin')->save($data)) {
			$this->success($msg . '成功', U('index'));
		} else {
			$this->error($msg . '失败，请重试...');
		}
	}

	/**
	 * 删除后台管理员
	 */
	Public function del () {
		$id = $this->_get('id', 'intval');
        $ret=M('admin')->field('adminusername')->find($id);
		if($ret['adminusername']=='admin'){ $this->error('不能删除超级管理员'); } 
        
		if (M('admin')->delete($id)) {
		    M('Roleadmin')->where("aid=$id")->delete();
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败，请重试...');
		}
		
	}
 

	/**
	 * 修改密码视图
	 */
	Public function edit () {
	   $id= $this->_get('id','intval');
	   if($this->isPost()){
	        if ($_POST['password'] != $_POST['passworded']) {
	            $this->error('两次密码不一致');
	        }
 
	        if(empty($_POST['password']) && empty($_POST['passworded']) )
	        {
	            $data = array(
	                'id'            => $this->_post('id'),
	                'adminusername' => $this->_post('adminusername'),
	                
	            );
	        }else{
	            $data = array(
	                'id'            => $this->_post('id'),
	                'adminusername' => $this->_post('adminusername'),
	                'password'      => $this->_post('password', 'md5'),
	            );
	            
	        }
	        $aid=intval($data['id']); 
	          
	        if (M('admin')->data($data)->save() || M('Roleadmin')->where("aid=$aid")->delete() ) {
	            
	            $rids=$_POST['rid'];
	            foreach($rids as $k=>$v){
	                M('Roleadmin')->add(array(
	                    'aid'=>$id,
	                    'rid'=>$v,
	                ));
	            }
	            $this->success('修改成功', U('index'));
	            
	        } else {
	            $this->error('修改失败，请重试...');
	        
	        }
	        exit;
	   }   
	    //get all adminrole
	    $rModel=M('Roleadmin');
	    $raData=$rModel->field('GROUP_CONCAT(rid) rid ')->where(array(
	        'aid'=>array('eq',$id),
	    ))->find();
	    
	    $this->rData=M('Adminrole')->select();
	    
	    $this->rids=$raData['rid'];
	    $this->data=M('Admin')->find($id);
	     
	    $this->assign(array(
	        'title'=>'修改管理员信息',
	    ));
		$this->display();
	}
  
	/*
	 * check username is unique
	 * */
	
	private function isUnique($tablename,$colsname,$colsvalue){
	    
	   $db= M($tablename);
	   
	   $is=$db->field($colsname)->where(array(
	       "$colsname"=>array('eq',$colsvalue),
	   ))->find();
	   
	   if(!empty($is)) 
	   return true;
	   else  return false;
	}
	 
}
?>