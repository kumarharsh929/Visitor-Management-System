$(document).on('submit','#form',function(){
	var name = $('#name').val();

	$.ajax({
		method:'post';
		url:'funct.php';
		data:{
			details:'check';
			name_key:name;
		}
	});
});/