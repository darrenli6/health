<?php
/**
 * 格式化打印数组
 */
function p ($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/**
 * use table that a select option
 *
 */
function buildSelect($tableName, $selectName, $valueFieldName, $textFieldName, $selectedValue = '')
{
    $model = D($tableName);
    $data = $model->field("$valueFieldName,$textFieldName")->select();
    $select = "<select name='$selectName'><option value=''>请选择</option>";
    foreach ($data as $k => $v)
    {
        $value = $v[$valueFieldName];
        $text = $v[$textFieldName];
        if($selectedValue && $selectedValue==$value)
            $selected = 'selected="selected"';
        else
            $selected = '';
        $select .= '<option '.$selected.' value="'.$value.'">'.$text.'</option>';
    }
    $select .= '</select>';
    echo $select;
}

/*check file validate  for example doc/docx
 return @return [Array]
 */
function checkFile($_File){
    $result =array();
    $type=$_File['type'];
     
    switch ($type){
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            $okType=true;
            break;
        
    }

    if($okType){
        $error=$_File['error'];

        if ($error==1){

            $result = array('status'=>0,'imagepath'=>null,'msg'=>'超过了文件大小，在php.ini文件中设置');

        }elseif ($error==2){
             
            $result  = array('status'=>0,'imagepath'=>null,'msg'=>'超过了文件的大小MAX_FILE_SIZE选项指定的值');

        }elseif ($error==3){
             
            $result = array('status'=>0,'imagepath'=>null,'msg'=>'文件只有部分被上传');
             
        }elseif ($error==4){

            $result = array('status'=>0,'imagepath'=>null,'msg'=>'没有文件被上传');

        }else if($error==5){
             
            $result = array('status'=>0,'imagepath'=>null,'msg'=>'上传文件大小为0');
             
        }

        return $result;

    }else{

        $result= array('status'=>0,'imagepath'=>null,'msg'=>'请上传doc,docx格式的文件！');
        return $result;
    }

}



/*check image validate
  return @return [Array]
*/
function checkImage($_File){
    $result =array();
    $type=$_File['type'];
    $size=$_File['size'];
    if($size>2000000)
    {
        $result= array('status'=>0,'imagepath'=>null,'msg'=>'图片大小必须小于2MB');
        return $result;
    }
    switch ($type){
        case 'image/pjpeg':
             $okType=true; 
             break;
         case 'image/jpeg':
             $okType=true;
             break;
         case 'image/gif':
             $okType=true;
             break;
         case 'image/png':
             $okType=true;
             break;
    }
    
    if($okType){
        $error=$_File['error'];
        
        if ($error==1){
        
            $result = array('status'=>0,'imagepath'=>null,'msg'=>'超过了文件大小，在php.ini文件中设置');
            
        }elseif ($error==2){
            	
            $result  = array('status'=>0,'imagepath'=>null,'msg'=>'超过了文件的大小MAX_FILE_SIZE选项指定的值');
            
        }elseif ($error==3){
             
            $result = array('status'=>0,'imagepath'=>null,'msg'=>'文件只有部分被上传');
           
        }elseif ($error==4){
        
            $result = array('status'=>0,'imagepath'=>null,'msg'=>'没有文件被上传');
            
        }else if($error==5){
            	
             $result = array('status'=>0,'imagepath'=>null,'msg'=>'上传文件大小为0');
             
        }
        
        return $result;
        
    }else{
        
      $result= array('status'=>0,'imagepath'=>null,'msg'=>'请上传jpg,gif,png等格式的图片！');
      return $result;
    }
    
}


/**
 * 异位或加密字符串
 * @param  [String]  $value [需要加密的字符串]
 * @param  [integer] $type  [加密解密（0：加密，1：解密）]
 * @return [String]         [加密或解密后的字符串]
 */
function encryption ($value, $type=0) {
    $key = md5(C('ENCTYPTION_KEY'));

    if (!$type) {
        return str_replace('=', '', base64_encode($value ^ $key));
    }

    $value = base64_decode($value);
    return $value ^ $key;
}