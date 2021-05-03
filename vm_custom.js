
$(document).on('submit','#addvisitor_form',function(e){
	e.preventDefault();
	var visitor_type = $('#visitor_type').val();
	var visitor_name = $('#visitor_name').val();
	var visitor_company = $('#visitor_company').val();
	var visitor_address = $('#visitor_address').val();
	var meeting_with = $('#meeting_with').val();
	var meeting_date = $('#meeting_date').val();
	var visitor_email = $('#visitor_email').val();
	var visitor_contact = $('#visitor_contact').val();
	var visitor_aadhar = $('#visitor_aadhar').val();
	var visitor_description = $('#visitor_description').val();
	var formData = new FormData(this);
    formData.append('visitor','check');
    formData.append('visitor_type_key',visitor_type);
    formData.append('visitor_name_key',visitor_name);
    formData.append('visitor_company_key',visitor_company);
    formData.append('visitor_address_key',visitor_address);
    formData.append('meeting_with_key',meeting_with);
    formData.append('meeting_date_key',meeting_date);
    formData.append('visitor_email_key',visitor_email);
    formData.append('visitor_contact_key',visitor_contact);
    formData.append('visitor_aadhar_key',visitor_aadhar);
    formData.append('visitor_description_key',visitor_description);

	$.ajax({
		method:'post',
		url:'vm_function.php', 
		data:formData,
		cache:false,
		contentType: false,
		processData: false,
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
		//	alert(data);
			if(data){
					swal({
					  text: data,
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
				alert(data);
			}
		}
	});
});  
	
	$(document).on('submit', '#addvisitor_form', function (e) {
        e.preventDefault(); 
        var formData = new FormData(this);
        formData.append('image_id','upload_image');

        $.ajax({
            type:'POST',
            url: 'vm_function.php',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    });



$(document).on('click','#update_visitor_details',function(e){
	e.preventDefault();
	var v_id = $('#visi_id').val();
	var update_visitor_type = $('#update_visitor_type').val();
	var update_meeting_with = $('#update_meeting_with').val();
	var update_meeting_date = $('#update_meeting_date').val();
	var update_visitor_name = $('#update_visitor_name').val();
	var update_visitor_email = $('#update_visitor_email').val();
	var update_visitor_company = $('#update_visitor_company').val();
	var update_visitor_contact_no = $('#update_visitor_contact_no').val();
	var update_visitor_aadhar_no = $('#update_visitor_aadhar_no').val();
	var update_visitor_address = $('#update_visitor_address').val();
	var update_visitor_description = $('#update_visitor_description').val();

	$.ajax({
		method:'post',
		url:'vm_function.php', 
		data:{
			visitor:'update',
			v_id_key:v_id,
			update_visitor_type_key:update_visitor_type,
			update_meeting_with_key:update_meeting_with,
			update_meeting_date_key:update_meeting_date,
			update_visitor_name_key:update_visitor_name,
			update_visitor_email_key:update_visitor_email,
			update_visitor_company_key:update_visitor_company,
			update_visitor_contact_no_key:update_visitor_contact_no,
			update_visitor_aadhar_no_key:update_visitor_aadhar_no,
			update_visitor_address_key:update_visitor_address,
			update_visitor_description_key:update_visitor_description
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
		//	alert(data);
			if(data){
					swal({
					  text: "Updated Successfully",
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
				alert(data);
			}
		}
	});
});  



$(document).on('click','#rescheduled_meeting_submit',function(e){
	e.preventDefault();
	//var meeting_with = $('#meeting_with').val();
	//var added_by = $('#added_by').val();
	var vis_id = $('#visit_id').val();
	var rescheduled_date = $('#rescheduled_date').val();
	var rescheduled_due_to = $('#rescheduled_due_to').val();

	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			visitor:'rescheduled',
			//meeting_with_key:meeting_with,
			//added_by_key:added_by,
			vis_id_key:vis_id,
			rescheduled_date_key:rescheduled_date,
			rescheduled_due_to_key:rescheduled_due_to
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		},
		success:function(data){
		//	alert(data);
			if(data){
					swal({
					  text: "Meeting Rescheduled Successfully",
					  type: 'success',
					  title: 'Congrats',
					  button: {
					   text: "OK!",
					   closeModal:false
					  }
					})
					.then(willSearch => {
					  if (willSearch) {
					    window.location.href="vtr_login_view.php";
					  }
				})
				}
			else{
				alert(data);
			}
		}
	});
});


$(document).on('click','#add_mom_submit',function(e){
	e.preventDefault();
	//var meeting_with = $('#meeting_with').val();
	//var added_by = $('#added_by').val();
	var id = $('#vm_id').val();
	var meeting_objective = $('#meeting_objective').val();
	var meeting_discussion = $('#meeting_discussion').val();
	var meeting_conclusion = $('#meeting_conclusion').val();

	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			visitor:'mom',
			//meeting_with_key:meeting_with,
			//added_by_key:added_by,
			id_key:id,
			meeting_objective_key:meeting_objective,
			meeting_discussion_key:meeting_discussion,
			meeting_conclusion_key:meeting_conclusion
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		},
		success:function(data){
		//	alert(data);
			if(data){
					swal({
					  text: "MOM Added Successfully",
					  type: 'success',
					  title: 'Congrats',
					  button: {
					   //text: "OK!",
					   closeModal:false
					  }
					})
					.then(willSearch => {
					  if (willSearch) {
					    window.location.href="vtr_login_view.php";
					  }
				})
				}
			else{
				alert(data);
			}
		}
	});
});


$(document).on('click','#activate',function(e){
	e.preventDefault();
	var data_fig = $('#active').val();
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			visitor:'activate',
			//meeting_with_key:meeting_with,
			//added_by_key:added_by,
			data_fig:data_fig
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		},
		success:function(data){
		//	alert(data);
			if(data){
					swal({
					  text: "Employee Deactivated Successfully",
					  type: 'success',
					  title: 'Congrats',
					  button: {
					   text: "OK!",
					   closeModal:false
					  }
					})
					.then(willSearch => {
					  if (willSearch) {
					    window.location.href="vm_assign_employee.php";
					  }
				})
				}
			else{
				alert(data);
			}
		}
	});
});


$(document).on('click','#deactivate',function(e){
	e.preventDefault();
	var data_fig = $('#deactive').val();
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			visitor:'deactivate',
			//meeting_with_key:meeting_with,
			//added_by_key:added_by,
			data_fig:data_fig
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		},
		success:function(data){
		//	alert(data);
			if(data){
					swal({
					  text: "Employee Activated Successfully",
					  type: 'success',
					  title: 'Congrats',
					  button: {
					   text: "OK!",
					   closeModal:false
					  }
					})
					.then(willSearch => {
					  if (willSearch) {
					    window.location.href="vm_assign_employee.php";
					  }
				})
				}
			else{
				alert(data);
			}
		}
	});
});




$(document).on('click','#edit_visitor_butt',function(){
	var visitor_id = $(this).attr('data-id');
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			visitor_edit:'visitor_edit',
			id:visitor_id
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
			//alert(data);
			$('.edit_visitor').html(data);
			$('#edit_visitor').modal('show'); 
			
		}
	});
});



$(document).on('click','#view_visitor_butt',function(){
	var visitor_id = $(this).attr('data-id');
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			visitor_view:'visitor_view',
			id:visitor_id
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
			//alert(data);
			$('.view_visitor').html(data);
			$('#view_visitor').modal('show'); 
			
		}
	});
});


$(document).on('click','#rescheduled_meeting_butt',function(){
	var visitor_id = $(this).attr('data-id');
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			rescheduled_meeting:'rescheduled_meeting',
			id:visitor_id
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
			//alert(data);
			$('.rescheduled_meeting').html(data);
			$('#rescheduled_meeting').modal('show'); 
			
		}
	});
});


$(document).on('click','#add_mom_butt',function(){
	var visitor_id = $(this).attr('data-id');
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			add_mom:'add_mom',
			id:visitor_id
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
			//alert(data);
			$('.add_mom').html(data);
			$('#add_mom').modal('show'); 
			
		}
	});
});


$(document).on('click','#view_meeting_butt',function(){
	var visitor_id = $(this).attr('data-id');
	$.ajax({
		method:'post',
		url:'vm_function.php',
		data:{
			meeting_view:'meeting_view',
			id:visitor_id
		},
		beforeSend: function(){
    		$("#blank").css("display","block");
   		},
  		complete: function(){
  		    $("#blank").css("display","none");
 		  },
		success:function(data){
			//alert(data);
			$('.view_meeting').html(data);
			$('#view_meeting').modal('show'); 
			
		}
	});
});

$(document).on('click','#assign_employee_butt',function(){
	var data_fig = $(this).attr('data-fig');
	//alert(data_fig);
	$("#assign_employee_modal").modal();
	$("#active").val(data_fig);
	
});

$(document).on('click','#deassign_employee_butt',function(){
	var data_fig = $(this).attr('data-fig');
	//alert(data_fig);
	$("#deassign_employee_modal").modal();
	$("#deactive").val(data_fig);
	
});