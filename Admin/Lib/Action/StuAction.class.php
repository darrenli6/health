<?php
 
class StuAction extends CommonAction {
    
    public function index(){
 
        
        import('ORG.Util.Page');
        $count =M('admin')->alias('a')
               ->field('a.id')
               ->join('LEFT JOIN __TEACH__ b ON b.aid=a.id
                      
                      ') 
              ->where("a.id!=1")
        ->count();
        
        $page = new Page($count, 20);
        $limit = $page->firstRow . ',' . $page->listRows;
         
        $this->page = $page->show();
        
         
         
        $this->CData=M('admin')->alias('a')
               ->field('a.id,a.adminusername,b.idcard,b.sex,b.name,b.aid,b.onephoto')
               ->join('LEFT JOIN __TEACH__ b ON b.aid=a.id
                      
                      ') 
                      ->where("a.id!=1")
        ->select();
         
        
        $this->assign(array(
                
                'imagepath'=>C('SHOWIMAGE'),
                'title'=>'教师信息', 
          ));
        $this->display();
    }
    
    
    public function add(){
        
        if ($this->isPost()) {
            
            $registarea=$_POST['province'].'-'.$_POST['city'].'-'.$_POST['country'];
       
           
            $datai= array(
                'stu_id'   => $this->_post('stuid'),
                'stuname' => $this->_post('stuname'),
                'sex' => $this->_post('sex'),
                'birthday' => $this->_post('birthday'),
                'nation' => $this->_post('nation'),
                'registarea' => $registarea,
                'resourcearea' => $resourcearea,
                'face' => $this->_post('face'),
                'email' => $this->_post('email'),
                'mobilephone' => $this->_post('mobilephone'),
                'parentstel' => $this->_post('parentstel'),
                'stuinfo' => $this->_post('stuinfo'),
                'deid' => $this->_post('deid'),
                'cid'     => $this->_post('cid'),
            );
            
            if (M('Stu')->data($data)->add() && M('Stuinfo')->data($datai)->add() ) {
                $this->success('添加成功', U('index'));
                die;
            } else {
                $this->error('添加失败，请重试...');
                die;
            }
        
        }
        
        $this->assign(array(
            'title'=>'添加学生',
        ));
        $this->display();
    }
    
    public function edit(){
       
        if($this->isPost()){
            $registarea=$_POST['province'].'-'.$_POST['city'].'-'.$_POST['country'];
            $resourcearea=$_POST['provinces'].'-'.$_POST['citys'].'-'.$_POST['countrys'];
            
            $data = array(
                'id'      => $this->_post('id'),
                'stuid'   => $this->_post('stuid'),
                'password'=> $this->_post('stuid','md5'),
            );
           
            $datai= array(
                'id'           => $this->_post('id'),
                'stu_id'       => $this->_post('stuid'),
                'stuname'      => $this->_post('stuname'),
                'sex'          => $this->_post('sex'),
                'birthday'     => $this->_post('birthday'),
                'nation'       => $this->_post('nation'),
                'registarea'   => $registarea,
                'email'        => $this->_post('email'),
                'resourcearea' => $resourcearea,
                'face'         => $this->_post('face'),
                'mobilephone'  => $this->_post('mobilephone'),
                'parentstel' => $this->_post('parentstel'),
                'stuinfo'      => $this->_post('stuinfo'),
                'deid'         => $this->_post('deid'),
                'cid'          => $this->_post('cid'),
            );
            
            if (M('Stu')->data($data)->save() && M('Stuinfo')->data($datai)->save() ) {
                $this->success('修改成功', U('index'));
                die;
            } else {
                $this->error('修改失败，请重试...');
                die;
            }
        }
        
        if($this->isGet()){
            $id = $this->_get('id', 'intval');
            $this->SData=M('Stuinfo')->find($id);
        }
        
        //get department information
        $this->DData=M('Departinfo')->field('id,departname')->select();
        //profession information
        $this->PData=M('Profession')->select();
        //get cid -> pid ->pname 
        $this->classinfo=M('Classinfo')->where(array(
            'id'=>array('eq',$this->SData['cid'])
        ))->find();
       // dump($pid);die;
        //get class infomation
        $this->CData=M('Classinfo')->select();
        //get partyinfo
        $this->Partyinfo=M('Partyrole')->field('id,rolename')->select();
        $this->assign(array(
            'imagepath' =>C('SHOWIMAGE'),
            'title'=>'修改学生',
        ));
        $this->display();
    }
    
    public function del(){
        $id = $this->_get('id', 'intval');
        $stuid = $this->_get('stuid');
        if (M('stu')->delete($id) && M('stuinfo')->where("stu_id=$stuid")->delete() ) {
            $this->success('删除成功', U('index'));
        } else {
            $this->error('删除失败，请重试...');
        }
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
    
    public function ajaxLoadClass(){
        if(!$this->isAjax()){
            echo '访问错误';
            die;
        }
        $result=array();
        $pid=$this->_post('pid','intval');
        
        $CData=M('Classinfo')->where(array('pid'=>array('eq',$pid)))->select();
        if($CData){
            $result['error']=0;
            $result['data']=$CData;
        }else{
            $result['error']=1;
        }
        echo json_encode($result);
        die;
    }
    //check stuid exitsts
    public function checkStuid(){
        if(!$this->isAjax()){
            echo 'error';
            die;
        }
        $stuid = $this->_post('stuid');
        $where = array('stuid'=>$stuid);
        if(M('Stu')->where($where)->getField('id')){
            echo 'false';
        }else{
            echo 'true';
        }
        
    }
    
    
    
    //upload data by xls
    public function uploadDataByxls(){
      
        if ($this->isPost()) {
            //先做一个文件上传，保存文件
            $path = $_FILES['import'];
            if(empty($path)){
                $this->error('没有文件进行上传');
               }
            }
            
            $filePath =C('UPLOADEXCEL').$path['name'];
             
            $result=move_uploaded_file($path["tmp_name"],$filePath);
         
            //导入
            $datainfo=array('A'=>'stu_id','B'=>'stuname','C'=>'cid');
            $tablenameinfo='stuinfo'; 
            $stuinfo=$this->excel_fileput($filePath,$datainfo,$tablenameinfo);
            
            if($stuinfo ){
               $this->success('上传成功'); 
            }else{
               $this->error('上传失败');
            }
             
    }
    public function showStu(){
        if(!!$id=$this->_get('id')){
        $where=array('id'=>$id);
        $this->stuinfo = D('StuView')
                         ->where($where)
                         ->limit(1) 
                         ->find();
       
        //dump($this->stuinfo);
        $this->assign(array(
            'title'=>'学生个人信息',
            'path'=>C('SHOWIMAGE'),
        ));
        $this->display();
        }else{
            $this->error('访问错误');
        }
        
    }
    
    public function sechStu(){
        
        if (isset($_GET['sech']) && isset($_GET['type'])) {
            if(!$this->isAjax()) die('error');
            
			$where = $_GET['type'] ? array('stuid' => $this->_get('sech', 'intval')) : array('stuname' => array('LIKE', '%' . $this->_get('sech') . '%'));
				$user =M('Stu')->alias('a')
			       ->field('a.id,a.stuid,b.*,c.classid,c.id claid,c.name,d.rolename,e.departname')
			       ->join('
			           LEFT JOIN __STUINFO__ b ON b.stu_id=a.stuid
			           LEFT JOIN __CLASSINFO__ c ON c.id=b.cid
			           LEFT JOIN __PARTYROLE__ d ON d.id=b.partyid
			           LEFT JOIN __DEPARTINFO__ e ON e.id=b.deid
			           ')
			       ->where($where)
			       ->select();
			$result=$user ? $user : null;
			echo json_encode($result);
			die;
		}
   
        $this->assign(array(
            'title'=>'学生检索',
            'imagepath'=>C('SHOWIMAGE'),
        ));
        $this->display();
    }
    public function printStu(){
 
        if(!session('uid')) $this->error('请您登陆',U('Login/index'));
        if (isset($_GET['val']) && isset($_GET['type'])) {
        
            $where = $_GET['type'] ? array('stuid' => $this->_get('val', 'intval')) : array('stuname' => array('LIKE', '%' . $this->_get('val') . '%'));
             
        	$user =M('Stu')->alias('a')
		       ->field('a.id,a.stuid,b.*,c.classid,c.id claid,c.name,d.rolename,e.departname')
		       ->join('
		           LEFT JOIN __STUINFO__ b ON b.stu_id=a.stuid
		           LEFT JOIN __CLASSINFO__ c ON c.id=b.cid
		           LEFT JOIN __PARTYROLE__ d ON d.id=b.partyid
		           LEFT JOIN __DEPARTINFO__ e ON e.id=b.deid
		           ')
		       ->where($where)
		       ->select();
            $user ? $user : false;
            
            $titlelist=array();
            $titlelist['a'] = "学号";
            $titlelist['b'] = "学生姓名";
            $titlelist['c'] = "民族";  
            $titlelist['d'] = "学生户籍";
            $titlelist['e'] = "学生生源";
            $titlelist['f'] = "政治面貌";
            $titlelist['g'] = "出生年月";
            $titlelist['h'] = "班级id";
            $titlelist['i'] = "学生性别";
            $titlelist['j'] = "学生手机号";
            $titlelist['k'] = "父母联系方式";
            
          
            $this->data_excelfile($titlelist,$user);
            
        }
        
    }
    
    /**************** show quality development section*******************************/
    public function showQuality(){
        $id=$this->_get('id','intval');
        if(!empty($id))
        {  
            
          $this->qsData=D('StuQualityView')->where(array(
              'sid'=>array('eq',$id),
          ))
          ->order('addtime desc')
          ->select();
 
          $this->assign(array(
             'sid'   => $id, 
             'title' => '项目列表',
          ));  
          $this->display();
        
        }else{
           
        $this->error('error');
        }
        
    }
    
    public function addQuality(){
        if($this->isPost()){
             
            $data=array(
                
                'sid'=>$this->_post('sid','intval'),
                'qid'=>$this->_post('qid','intval'),
                'store'=>$this->_post('store','intval'),
                'addtime'=>$this->_post('addtime'),
            );
            $ret=M('Quastu')->add($data);
            $ret?$this->success('添加成功',U('showQuality',array('id'=>$data['sid'])))
            :$this->error('添加失败');
            die;
        
        }
        
        if(!!$sid=$this->_get('sid','intval')){
            //get Qualitydevelopment item
            $this->stuinfo=M('Stu')
                           ->field('id,stuid')
                           ->where(array('id'=>array('eq',$sid))) 
                           ->find();
            $this->qItems=M('Qualitydevestore')
                          ->field('id,qualityname,fullstore')
                          ->select();
            
            $this->display();
        }else{
            $this->error('error access');
        }
       
    
    }
    
    public function editQuality(){
        $id=$this->_get('id','intval');  
        
        if (!!$sid=$this->_get('sid','intval'))
        {
            //get Qualitydevelopment item
            $this->stuinfo=M('Stu')
                            ->field('id,stuid')
                            ->where(array('id'=>array('eq',$sid)))
                            ->find();
            $this->qItems=M('Qualitydevestore')
                            ->field('id,qualityname,fullstore')
                            ->select();
             
            $this->qsItem=M('quastu')->where(array(
                                'id'=>array('eq',$id),
                            ))->find(); 
             
        }
        
        if($this->isPost()){
             
            $data=array(
                'id'=>$id,
                'sid'=>$this->_post('sid','intval'),
                'qid'=>$this->_post('qid','intval'),
                'store'=>$this->_post('store','intval'),
                'addtime'=>$this->_post('addtime'),
            );
             $ret=M('Quastu')->save($data);
             $ret?$this->success('更新成功',U('showQuality',array('id'=>$data['sid'])))
            :$this->error('更新失败');
             die;
        
        }
        $this->assign(array(
            'id'=>$id,
            'sid'=>$_GET['sid'],
            'title'=>'编辑素质拓展表',
        ));
        $this->display();
        
    }
    
    public function delQuality(){
        
        $id=$this->_get('id','intval');
        $ret=M('quastu')->delete($id);
        $ret?$this->success('删除成功'):$this->error('删除失败');
    }
/********************packaging function method***********************/    
    
    /**data to excel
     * @param Array $resource data
     * @param Array $titlelist
     */
    private function data_excelfile($titlelist,$sourcedata){
        
        include './Public/Excel/PHPExcel.php';
        
        	
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        $objPHPExcel = new PHPExcel();
        /*以下是一些设置 ，什么作者  标题啊之类的*/
        $objPHPExcel->getProperties()->setCreator("test")
        ->setLastModifiedBy("czxy")
        ->setTitle("数据EXCEL导出")
        ->setSubject("数据EXCEL导出")
        ->setDescription("备份数据")
        ->setKeywords("excel")
        ->setCategory("result file");
        	
 
        
        $objPHPExcel->setActiveSheetIndex(0)
        //Excel的第A列，uid是你查出数组的键值，下面以此类推
        ->setCellValue('A1', $titlelist['a'])
        ->setCellValue('B1', $titlelist['b'])
        ->setCellValue('C1', $titlelist['c'])
        ->setCellValue('D1', $titlelist['d'])
        ->setCellValue('E1', $titlelist['e'])
        ->setCellValue('F1', $titlelist['f'])
        ->setCellValue('G1', $titlelist['g'])
        ->setCellValue('H1', $titlelist['h'])
        ->setCellValue('I1', $titlelist['i'])
        ->setCellValue('J1', $titlelist['j'])
        ->setCellValue('K1', $titlelist['k']) ;
      
        foreach($sourcedata as $k => $v){
        
            $num=$k+2;
            $objPHPExcel->setActiveSheetIndex(0)
        
            //Excel的第A列，uid是你查出数组的键值，下面以此类推
            ->setCellValue('A'.$num, $v['stuid'])
            ->setCellValue('B'.$num, $v['stuname'])
            ->setCellValue('C'.$num, $v['nation'])
            ->setCellValue('D'.$num, $v['registarea'])
            ->setCellValue('E'.$num, $v['resourcearea'])
            ->setCellValue('F'.$num, $v['rolename'])
            ->setCellValue('G'.$num, $v['birthday'])
            ->setCellValue('H'.$num, $v['classid'])
            ->setCellValue('I'.$num, $v['sex']==1?'男':'女')
            ->setCellValue('J'.$num, $v['mobilephone'])
            ->setCellValue('K'.$num, $v['parentstel']);
            	
        }
        
    
        
        $objPHPExcel->getActiveSheet()->setTitle('User');
        $objPHPExcel->setActiveSheetIndex(0);
        $name = "学生信息";
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel;charset=utf8');
        header('Content-Disposition: attachment;filename="'.$name.'.xls"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
       
        
        $objWriter->save('php://output');
        	
        exit;
        
        
    }
    
    //upload excel data
    private function excel_fileput($filePath,$data,$tablename){
    
        include './Public/Excel/PHPExcel.php';
    
        $PHPExcel = new PHPExcel();
        $PHPReader = new PHPExcel_Reader_Excel2007();
    
        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($filePath)){
                echo 'no excel';
                return ;
            }
        }
         
        // 加载excel文件
        $PHPExcel = $PHPReader->load($filePath);
         
        // 读取excel文件中的第一个工作表
        $currentSheet = $PHPExcel->getSheet(0);
        // 取得最大的列号
        $allColumn = $currentSheet->getHighestColumn();
        // 取得一共有多少行
        $allRow = $currentSheet->getHighestRow();
         
        // 从第二行开始输出，因为excel表中第一行为列名
        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            //scan file A  B  C column data
            for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();
    
                if($currentColumn <= $allColumn){
                    $data1[$currentColumn]=$val;
                }
            }
    
            $sarr=array();
            foreach($data as $key=>$val){
                if($key=='A')
                {
                    $sarr['stuid']=$data1[$key];
                    $sarr['password']=$data1[$key];
                }
                $data2[$val]=$data1[$key];
            }
             
            $m = D($tablename)->add($data2);
            $s = D('stu')->add($sarr);
             
        }
         
        if ($m && $s) {
            return true;
        }else {
            return false;
        }
    }
    
}