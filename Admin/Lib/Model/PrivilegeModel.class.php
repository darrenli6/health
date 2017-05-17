<?php
 
class PrivilegeModel extends Model
{
    protected $insertFields = array('pri_name','module_name','controller_name','action_name','parent_id');
    protected $updateFields = array('id','pri_name','module_name','controller_name','action_name','parent_id');
    protected $_validate = array(
        array('priname', 'require', '权限名称不能为空！', 1, 'regex', 3),
        array('priname', '1,30', '权限名称的值最长不能超过 30 个字符！', 1, 'length', 3),
        array('modulename', '1,30', '模块名称的值最长不能超过 30 个字符！', 2, 'length', 3),
        array('controllername', '1,30', '控制器名称的值最长不能超过 30 个字符！', 2, 'length', 3),
        array('actionname', '1,30', '方法名称的值最长不能超过 30 个字符！', 2, 'length', 3),
        array('parentid', 'number', '上级权限Id必须是一个整数！', 2, 'regex', 3),
    );
   /********************recursion method   *******************/  
    public function getTree(){
        $data = $this->select();
        return $this->_reSort($data);
    }
    
    private function _reSort($data,$parent_id=0, $level=0, $isClear=TRUE)
    {
       static $ret=array();
       if($isClear)
            $ret=array();
       foreach($data as $k=>$v)
       {
           if($v['parentid']==$parent_id){
               $v['level']=$level;
               $ret[]=$v;
               $this->_reSort($data,$v[id],$level+1,FALSE);
           }
       }
       
       return $ret;
    }
    /*
     * check current admin privilege visited this page
     * */
    public function chkPri(){
        
        $adminId=session('uid');
        
        if($adminId==1){
            return true;
        }
        
        $raModel=M('Roleadmin');
        $has=$raModel->alias('a')
        ->join('LEFT JOIN __ROLEPRI__ b ON b.rid=a.rid
                LEFT JOIN __PRIVILEGE__ c ON b.pid=c.id ')
        ->where(array(
            'a.aid'   =>  array('eq',$adminId),
            'c.modulename' => array('eq', 'Admin'),
            'c.controllername' => array('eq', MODULE_NAME),
            'c.actionname' => array('eq', ACTION_NAME),
        ))        
        ->count();
         
        
        return ($has>0);
    }
    /*
     * get left buttons
     * */  
    public function getBtns(){
        
        $adminId=session('uid');
        if($adminId==1){
            $priModel=D('Privilege');
            $priData=$priModel->select();
        }else{
            
            //get current admin get all privilege in this role
            $arModel=D('Roleadmin');
            $priData=$arModel->alias('a')
            ->field('DISTINCT c.id,c.priname,c.modulename,c.controllername,c.actionname,c.parentid' )
            ->join('LEFT JOIN __ROLEPRI__ b ON b.rid=a.rid
                    LEFT JOIN __PRIVILEGE__ c ON c.id=b.pid
                    ')
            ->where(array(
                'a.aid'=>array('eq',$adminId)
            ))       
            ->select();
            
        }
        
        $btns=array();
        
        foreach($priData as $k=>$v){
            
            if($v['parentid']==0){
                
                foreach($priData as $k1=>$v1){
                    if($v1['parentid']==$v['id'])
                    {
                        $v['children'][]=$v1;
                    }
                }
                $btns[] = $v; 
            }
            
        }
         
        return $btns;
        
    }
 
    
    //get children  by id
    
    public function getChildren($id){
        
        
        $data=$this->select();
        
        return $this->_children($data,$id);
    }
    
    
    private function _children($data , $parent_id=0, $isClear=TRUE){
        
       static $ret=array();
       if($isClear) $ret=array();
       foreach($data as $k=>$v){
           if($v['parentid']==$parent_id){
               $ret[]=$v['id'];
               $this->_children($data,$v['id'],false);
           }
       }
       return $ret;
    }
    
    
    
    
    
    
    
}   