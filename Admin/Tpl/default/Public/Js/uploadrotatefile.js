/**
 * 
 */

$(function(){
	 $('#uploadfile').change(function(){
	 var id=$(this).parent().parent().find('td ').attr('item');
	 	 
	 var fd=new FormData();
	   
	 fd.append('upload',1);
	 
	 fd.append('uploadfile',$('#uploadfile').get(0).files[0]);
	 
	 fd.append('id',id);
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
			  var img="<img src=\""+m.rotatepath+""+m.file_name+"\" width=\"120px\" height=\"120px;\"  /> ";
		      $('#item'+m.id).html(img);	 
			 }else{
				  
				 alert(m.msg);
				 
			 }
		 }
	 });
	 });
});
 