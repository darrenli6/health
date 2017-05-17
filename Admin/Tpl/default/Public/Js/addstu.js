$(function () {

 
	//resource area of student
	var province = '';
	$.each(city, function (i, k) {
		province += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
	});
	$('select[name=province]').append(province).change(function () {
		var option = '';
		if ($(this).val() == '') {
			option += '<option value="">请选择</option>';
		} else {
			var index = $(':selected', this).attr('index');
			var data = city[index].child;
			for (var i = 0; i < data.length; i++) {
				option += '<option value="' + data[i] + '">' + data[i] + '</option>';
			}
		}
		
		$('select[name=city]').html(option);
	});

	//now live area
	 
	var province = '';
	$.each(city, function (i, k) {
		province += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
	});
	$('select[name=provinces]').append(province).change(function () {
		var option = '';
		if ($(this).val() == '') {
			option += '<option value="">请选择</option>';
		} else {
			var index = $(':selected', this).attr('index');
			var data = city[index].child;
			for (var i = 0; i < data.length; i++) {
				option += '<option value="' + data[i] + '">' + data[i] + '</option>';
			}
		}
		
		$('select[name=citys]').html(option);
	});
	 
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
				 remote:{
					 url :checkStu ,
					 type:'post',
					 dataType: 'json',
					 data:{
						 stuid: function(){
							 return $('input[name=stuid]').val();
						 }
					 }
				 }
			 },
			 stuname:{
				 required: true,
			 }
		 },
		 messages:{
			 stuid:{
				 required:'学号不能为空',
				 stuid:'学号必须为八位数字',
				 remote:'学号已经存在',
			 },
			 stuname:{
				required:'姓名不能为空',  
			 },
		 },
	 });
	
});