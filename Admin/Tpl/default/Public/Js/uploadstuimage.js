/**
 * 
 */

$(function(){
	 $('#uploadlogo').change(function(){
	 var fd=new FormData();
	   
	 fd.append('upload',1);
	 
	 fd.append('uploadlogo',$('#uploadlogo').get(0).files[0]);
	 
	 $.ajax({
		 url:IMAGEURL,
		 type:'POST',
		 processData:false,
		 contentType:false,
		 data:fd,
		 success:function(msg)
		 {   
			 var m=eval("("+msg+")"); 
			 
			 if(m.state==1)
			 {	 
		     $('.showimg').html("<img width='120' height='120' src='"+SHOWIMAGE+m.file_name+"'>" +
		     		"<input type='hidden' name='onephoto' value='"+m.file_name+"'  />"); 
			 }else{
				 
				 alert(m.msg);
			 }
		 }
	 });
	 });
});
 