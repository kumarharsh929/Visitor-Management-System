$(document).on('click','.edit_task , .view_user',function(){
	var date = $(this).attr('data-date');
	var id = $(this).attr('data-id');
	var sno = $(this).attr('data-sno');
	var but = $(this).attr('data-but');
	var page = $(this).attr('data-page');

	$('#sno').val(sno);
	$.ajax({
		method:'post',
		url:'ad_function.php',
		data:{
			user:'details',
			page:page,
			id:id
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
			//alert(data);
			$('.view_profile').html(data);
			$(but).modal('show'); 
			
		}
	});
});

$(document).on('click','#Ch_pass',function(e){
	e.preventDefault();
	var C_pass= $('#C_pass').val();
	var N1_pass= $('#N1_pass').val();
	var N2_pass= $('#N2_pass').val();
	if(N1_pass===N2_pass){
		$.ajax({
			method:'post',
			url:'ad_function.php',
			data:{
				ch:'change_pass',
				C_pass:C_pass,
				N1_pass:N1_pass,
			},
			success:function(data){
				if(data==="ok"){
					swal({
					  text: "Password Changed Successfully",
					  type: 'success',
					  title: 'Congrats',
					  button: {
					    text: "OK!",
					    closeModal: false,
					  }
					})
					.then(willSearch => {
					  if (willSearch) {
					    window.location.href="vtr_login_view.php";
					  }
				})
				}
				else{
					swal({
					//	text:data,
					  text: "Sorry current password is not matched! ",
					  type: 'error',
					  title: 'Sorry',
					  button: {
					    text: "OK!",
					    closeModal: false,
					  }
					})
				}
			
		}
		});
	}
	else{
		swal({
			  text: 'New password and confirm password should be same!',
			  type: 'error',
			  title: 'Sorry',
			  button: {
			    text: "OK!",
			    closeModal: false,
			  }
			})
	}
});
/*$(document).on('click','.view_user',function(){
	var id = $(this).attr('data-id');
	var sno = $(this).attr('data-sno');
	$('#sno').val(sno);
	$.ajax({
		method:'post',
		url:'ad_function.php',
		data:{
			user:'details',
			id:id
		},
		success:function(data){
			//alert(data);
			$('#view_profile').html(data);
			$('#viewuser').modal('show'); 
			
		}
	});
}); */


var flag = 0; var swal; 
function varifynull(vari,message)
{
	if(vari===null || vari==="" || vari==='indefined')
	{  
	  alert(message);
	  flag++;  
	  return false; 
	}
}

$(document).on('click','#ad_workupdate',function(e){
	e.preventDefault();
	var title = $('#title').val();
	varifynull(title,"Title must be filled!");
	var details = $('#details').val();
	varifynull(details,"Details must be filled!");
	var s_no = $('#sno').val();
if(flag===0)
{	
	$.ajax({
		method:'post',
		url:'ad_function.php',
		data:{
			key:'updatework',
			titlekey:title,
			detailskey:details,
			s_nokey:s_no
		},
		success:function(data){
			swal({
				  text: data,
				  type: 'success',
				  title: 'Well Done',
				  button: {
				    text: "OK!",
				    closeModal: false,
				  },
				})
				.then(willSearch => {
				  if (willSearch) {
				    window.location.href="ad_edit_task.php";
				  }
				})
		}
	});
}
});



// <script type="text/javascript">
    $(document).ready(
        function() {  
            $('#time-cont').append('<div class="time"></div>'); 
            $('.time-cont-footer').append('<div class="time"></div>'); 
          var options = {
            format:'<span class=\"dt\">%a, %I:%M:%S %P</span>',
            timeNotation: '12h',
            am_pm: true,
           // fontFamily: 'Verdana, Times New Roman',
           // fontSize: '18px',
            foreground: 'rgb(0,0,51)',
            background: 'white',
            utc:true,
            utc_offset: '5.5'
          }
            
      $('#time-cont .time').jclock(options);
      $('.time-cont-footer .time').jclock(options);
       
     });




