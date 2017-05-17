$(function () {
 
	//jQuery Validate form verify
 
	jQuery.validator.addMethod("stuid", function(value, element) {   
	    var tel = /^[0-9]{8}$/;
	    return this.optional(element) || (tel.test(value));
	}, "必须为8位数字");
 
	
	
	 $('form[name=addstu]').validate({
		 errorElement : 'span',
		 success : function (label){
		      label.addClass('success');	 
		 },
		 rules:{
			 stuid:{
				 required :true,
				 stuid:true,
			 
			 },
			 stuname:{
				 required: true,
			 }
		 },
		 messages:{
			 stuid:{
				 required:'学号不能为空',
				 stuid:   '学号必须为八位数字',
			 },
			 stuname:{
				required:'姓名不能为空',  
			 },
		 },
	 });
	
});