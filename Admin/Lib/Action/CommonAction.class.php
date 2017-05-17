<?php
/**
 * 公共控制器
 */
Class CommonAction extends Action {

	/**
	 * 判断用户是否已登录
	 */
	Public function _initialize () {
		if (!isset($_SESSION['uid']) || !isset($_SESSION['adminusername'])) 
			redirect(U('Login/index'));
		 
		if (MODULE_NAME=='Index')	
		{		
		   return true;
		}else{
		$priModel = D('Privilege');
		
		if(!$priModel->chkPri()){
		    $this->error('您无权访问');
		}
	}		
	
	$this->assign('indexurl',U('index'));
	$this->assign('addurl',U('add'));
	 
	}
	
	
	
}
?>