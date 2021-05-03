function validation()
{
	var visitor_name = $('#visitor_name').val();
	var visitor_company = $('#visitor_company').val();
	var visitor_address = $('#visitor_address').val();
	var visitor_email = $('#visitor_email').val();
	var visitor_contact = $('#visitor_contact').val();
	var visitor_aadhar = $('#visitor_aadhar').val();

	if(visitor_name == null || visitor_name == "")
	{
		$('#name_check').html('**Please Fill The Name');
		
	}
	else
	{
		$('#name_check').html('');
	}	

	if(visitor_company == null || visitor_company == "")
	{
		$('#company_check').html('**Please Fill The Company');
	}

	if(visitor_address == null || visitor_address == "")
	{
		$('#address_check').html('**Please Fill The Address');
	}

	if(visitor_email == null || visitor_email == "")
	{
		$('#email_check').html('**Please Fill The Email');
	}

	if(visitor_contact == null || visitor_contact == "")
	{
		$('#contact_check').html('**Please Fill The Contact');
	}

	/*if(visitor_contact !=10)
	{
		$('#contact_check').html('**Number must be 10 digit');
	}*/
		


}
 
 $(document).on('click','#addvisitor',function(){
 	validation();
 });

 $(document).on('keypress','#visitor_name',function(){
 	return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.which==32)
 });

 $(document).on('keypress','#visitor_company',function(){
 	return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.which==32)
 });

 $(document).on('keypress','#visitor_contact',function(){
 	return(event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 8) ||
 	 (event.charCode >= 35 && event.charCode <=40) || (event.charCode == 46)
 });

 $(document).on('keypress','#visitor_aadhar',function(){
 	return(event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 8) ||
 	 (event.charCode >= 35 && event.charCode <=40) || (event.charCode == 46)
 });

function validateemail(email) {
    var atposition = visitor_email.indexOf("@");
    var dotposition = visitor_email.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= visitor_email.length) {
        alert("Please enter a valid e-mail address");
        flag++;
    }
}

$(document).on('blur focusout', '#visitor_email', function() {
    //alert("hello");
    var visitor_email = $('#visitor_email').val();
    $.ajax({
        method: 'post',
        url: 'ad_register.php',
        data: {
            visitor_email_key: visitor_email,
            required: 'emailValidation'
        },
        beforeSend: function(){
            $("#blank").css("display","block");
        },
        complete: function(){
            $("#blank").css("display","none");
        },
        success: function(data) {
            //alert(data);
            if (data == "already") {
                swal("ohhh no", "Email Already exists", "error");
                $("#email").val("");
            } else if (data == "true") {
                //nothingf
            }
            //alert(data);

        }
    });
});



