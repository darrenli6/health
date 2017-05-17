/**
 * adminroleAction all checkbox bind event
 */

$(":checkbox").click(function(){
	 var tmp_level_id=level_id=$(this).attr('level_id');
	 if($(this).prop("checked")){
		 //all child is checked
		 $(this).nextAll(":checkbox").each(function(k,v){
			if($(v).attr("level_id") > level_id)
			    $(v).prop("checked","checked");
			else return false;
		 });
		 //all top also is checked
		 $(this).prevAll(":checkbox").each(function(k,v){
			 if($(v).attr('level_id') < tmp_level_id){
				 $(v).prop("checked","checked");
				 tmp_level_id--;
			 }
		 });
		 
	 }else{
		 //all child is unchecked
		 $(this).nextAll(":checkbox").each(function(k,v){
			if($(v).attr("level_id") > level_id)
			    $(v).removeAttr("checked");
			else return false;
		 });
	 }
});










