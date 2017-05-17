/**
 * 
 */
//$(function(){
//	 
//});
function selectClass(){
	 
	var pid=$('select[name=pid]').val();
	 
	$.ajax({
		url:LOADCLASS,
		type:'POST',
		data:{pid:pid},
		success:function(msg){
			var msg=eval("("+msg+")");
			if(msg.error==0){
				var str=null;
				$.each(msg.data,function(k,v){
					str+="<option value="+v.id+">"+v.name+"</option>";
				});
				$('#cid').html(
				   str 		
				);
			}
		},
	});
	
}