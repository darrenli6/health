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

	//live area
     var registarea = regist.split('-');
     
     $('select[name=provinces]').val(registarea[0]);
    
     $.each(city, function (i, k) {
          if (k.name == registarea[0]) {
			var str = '';
			for (var j in k.child) {
				str += '<option value="' + k.child[j] + '" ';
				if (k.child[j] == registarea[1]) {
					str += 'selected="selected"';
				}
				str += '>' + k.child[j] + '</option>';
			}
			$('select[name=citys]').html(str);
			$('input[name=countrys]').val(registarea[2]);
		}
	});
    
   //live area
     var resourcearea = resource.split('-');
     
     $('select[name=province]').val(resourcearea[0]);
    
     $.each(city, function (i, k) {
          if (k.name == resourcearea[0]) {
			var str = '';
			for (var j in k.child) {
				str += '<option value="' + k.child[j] + '" ';
				if (k.child[j] == resourcearea[1]) {
					str += 'selected="selected"';
				}
				str += '>' + k.child[j] + '</option>';
			}
			$('select[name=city]').html(str);
			$('input[name=country]').val(resourcearea[2]);
		}
	});

 
});

$(function(){
	//城市联动
	var provinces = '';
	$.each(city, function (i, k) {
		provinces += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
	});
	$('select[name=provinces]').append(provinces).change(function () {
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

//	//所在地默认选项
//	addresss = address.split(' ');
//	$('select[name=provinces]').val(addresss[0]);
//	$.each(city, function (i, k) {
//		if (k.name == address[0]) {
//			var str = '';
//			for (var j in k.child) {
//				str += '<option value="' + k.child[j] + '" ';
//				if (k.child[j] == addresss[1]) {
//					str += 'selected="selected"';
//				}
//				str += '>' + k.child[j] + '</option>';
//			}
//			$('select[name=citys]').html(str);
//		}
//	});
//	
	
});