/**
 * 
 */

$(function(){
	 $('#attachfile').change(function(){
	 var fd=new FormData();
	   
	 fd.append('upload',1);
	 
	 fd.append('attachfile',$('#attachfile').get(0).files[0]);
	 
	 $.ajax({
		 url:FILEURL,
		 type:'POST',
		 processData:false,
		 contentType:false,
		 data:fd,
		 success:function(msg)
		 {   
			 var m=eval("("+msg+")"); 
			 
			 if(m.state==1)
			 {	 
		     $('.showfile').html("<span style='color:red' >上传成功</span>" +
		     		"<input type='text' readonly='readonly' name='attachfile' value='"+m.file_name+"'  />"); 
			 }else{
				  
				 alert(m.msg);
				 
			 }
		 }
	 });
	 });
});
 