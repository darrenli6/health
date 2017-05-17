<?php
return array(

	//数据库配置
	'DB_HOST' => '127.0.0.1',	//数据库服务器地址
	'DB_USER' => 'root',	//数据库连接用户名
	'DB_PWD' => 'root',	//数据库连接密码
	'DB_NAME' => 'health', //使用数据库名称
	'DB_PREFIX' => 'czxy_',	//数据库表前缀
     
    //图片上传
    'UPLOAD_MAX_SIZE' => 2000000,	//最大上传大小
    'UPLOAD_PATH' => './Public/Upload/',	//文件上传保存路径
    'SHOWIMAGE' => '/health/Public/Upload/',	//show image path
     
    'UPLOAD_FILE_PATH' => './Public/Upload/File/',	//文件上传保存路径
    'DOWNFILE' => '/health/Public/Upload/File/',	//show image path
    'UPLOAD_EXTS' => array('jpg', 'jpeg', 'gif', 'png'),	//允许上传文件的后缀
    
     
     //download common xls
    'UPLOADEXCEL'  =>'./Public/Upload/xls/',
    'DOWNCOMMONFILE'=>'/health/Public/Download/',
     
    //upload rotate image
    'ROTATEIMAGEPATH'=>'./Public/Rotate/',
    'SHOWROTATEIMAGE'=>'/health/Public/Rotate/',
 
    
    
    //加载扩展配置

    'LOAD_EXT_CONFIG' => 'theme',
);
?>