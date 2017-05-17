<?php
/**
 * 用户管理控制器
 */
Class AdminroleAction extends CommonAction {
 

	/**
	 * 后台管理员列表
	 */
	Public function index () {
		$this->data = M('Adminrole')
		->alias('a')
		->field('a.*,GROUP_CONCAT(c.priname) priname')
		->join('LEFT JOIN __ROLEPRI__ b ON a.id=b.rid 
		        LEFT JOIN __PRIVILEGE__ c ON b.pid=c.id
		       ')
		->group('a.id')      
		->select();
		 
		$this->assign(array(
		    'title'=>'管理员角色列表',
		));
		$this->display();
	}

	/**
	 * 添加后台管理员
	 */
	Public function add () {
	    if($this->isPost()){
	        
	        $data = array(
	            'rname' => $this->_post('rname'),
	        );
	        
	        if (!!$rid=M('Adminrole')->data($data)->add()) {
	            $pris=$_POST['pri_id'];
	            foreach($pris as $k=>$v){
	                M('Rolepri')->add(array(
	                    'rid'=>$rid,
	                    'pid'=>$v,
	                ));
	            }
	            
	            $this->success('添加成功', U('index'));
	            exit;
	        } else {
	            $this->error('添加失败，请重试...');
	            exit;
	        }
	    }
	    
	    //get all privilege
	    $priModel=D('Privilege');
	    $this->priData=$priModel->getTree();
	    $this->assign(array(
	        'title'=>'添加管理员角色',
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
	 *  
	 */
	Public function del () {
		$id = $this->_get('id', 'intval');
       
		if (M('Adminrole')->delete($id) &&  M('Rolepri')->where(array(
		        'rid' => array('eq',$id),
		    ))->delete() ) {
		   
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败，请重试...');
		}
	}
 

	/**
	 * edit adminrole view
	 */
	Public function edit () {
	    $id=$this->_get('id','intval');
	    if($this->isPost()){
	        
	        $data = array(
	            'id'    => $this->_post('id'),
	            'rname' => $this->_post('rname'),
	        );
 
	        if (M('Adminrole')->save($data) ||  M('Rolepri')->where(array(
	                'rid' => array('eq',$id),
	            ))->delete() ) {
	            $pris=$_POST['pri_id'];
	            $rpModel=M('Rolepri');
	           
	            foreach($pris as $k=>$v){
	                 $rpModel->add(array(
	                    'rid'=>$id,
	                    'pid'=>$v,
	                ));
	            }
	             
	            $this->success('添加成功', U('index'));
	            exit;
	        } else {
	            $this->error('添加失败，请重试...');
	            exit;
	        }
	        
	    }
	    
	    $model=M('Adminrole');
	    $this->data=$model->find($id);
	    
	    $rpmodel=M('Rolepri');
	    $rpData=$rpmodel->field('GROUP_CONCAT(pid) pid')
	                    ->where(
	                        array(
	                        'rid' => array('eq',$id),
	                             )
	                        )->find();
	    $this->rpData=$rpData['pid'];
	    //get all privilege
	    $priModel=D('Privilege');
	    $this->priData=$priModel->getTree();
	    $this->assign(array(
	        'title'=>'编辑管理员角色',
	    ));
		$this->display();
	}
   
	
 
	 
}
?>