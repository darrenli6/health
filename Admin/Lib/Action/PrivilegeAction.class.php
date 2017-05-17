<?php
/**
 * user privilege controller
 */
Class PrivilegeAction extends CommonAction {
 

	/**
	 *  admin privilege list
	 */
	Public function index () {
		$model= D('Privilege');
		
		$this->data=$model->getTree(); 
		
		 
		$this->assign(array(
		    'title'=>'权限列表',
		));
		$this->display();
	}

	/**
	 * 添加后台管理员
	 */
	Public function add () {
	    if($this->isPost()){
	       $data = array(
                'priname'           => $this->_post('priname'),
                'modulename'        => $this->_post('modulename'),
                'controllername'    => $this->_post('controllername'),
	            'actionname'        => $this->_post('actionname'),
	            'parentid'          => $this->_post('parentid'),
            );
        
            if (M('Privilege')->data($data)->add()) {
                $this->success('添加权限成功', U('index'));
                die;
            } else {
                $this->error('添加失败，请重试...');
                die;
            }
	    }
	    
	    $parentModel=D('Privilege');
	    $this->parentData=$parentModel->getTree();
	    
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
		if (M('Privilege')->delete($id)) {
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败，请重试...');
		}
	}
 

	/**
	 * 修改密码视图
	 */
	Public function edit () {
	    $id = $this->_get('id', 'intval');
	    if($this->isPost()){
	      
	     $data = array(
	            'id'                => $this->_post('id'),
                'priname'           => $this->_post('priname'),
                'modulename'        => $this->_post('modulename'),
                'controllername'    => $this->_post('controllername'),
	            'actionname'        => $this->_post('actionname'),
	            'parentid'          => $this->_post('parentid'),
            );
        
            if (M('Privilege')->save($data)) {
                $this->success('修改权限成功', U('index'));
                die;
            } else {
                $this->error('修改失败，请重试...');
                die;
            }
	        
	    }
	    
	    $model = D('Privilege');
	    $this->data  = $model->find($id);
	    
	    $this->parentData=$model->getTree();
	    
	    $this->children  =$model->getChildren($id);
	    
	    $this->assign(array(
	        'title'=>'修改权限',
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