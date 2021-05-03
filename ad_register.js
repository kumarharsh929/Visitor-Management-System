var flag = 0;
var swal;

function varifynull(vari, message) {
    if (vari === null || vari === "" || vari === 'undefined') {
        alert(message);
        flag++;
    }
}

function validateemail(email) {
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
        alert("Please enter a valid e-mail address");
        flag++;
    }
}
/*function validatedate(dob,message)
{
	var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
	    if(!dob.match(dateformat)){
	    	alert(message);
	    	flag++;
	    }
}*/
$(document).on('blur focusout', '#email', function() {
    //alert("hello");
    var email = $('#email').val();
    $.ajax({
        method: 'post',
        url: 'ad_register.php',
        data: {
            email: email,
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
$(document).on('click', '#register', function() {
    var name = $('#name').val();
    varifynull(name, "Name must be filled!");
    var fname = $('#fname').val();
    varifynull(fname, "Father name must be filled!");
    var email = $('#email').val();
    validateemail(email);
    var dob = $('#dob').val();
    //validatedate(dob,"Invalid date of birth!");
    var aadhar = $('#aadhar').val();
    varifynull(aadhar, "Aadhar no. must be filled!");
    var address = $('#address').val();
    varifynull(address, "Address must be filled!");
    var qualification = $('#quali').val();
    varifynull(qualification, "Qualification must be filled!");
    var mobileno = $('#mobileno').val();
    varifynull(mobileno, "Mobile no. must be filled!");
    var quali = $('#quali').val();
    varifynull(quali, "Your qualification must be filled!");
    var cgpa = $('#cgpa').val();
    varifynull(cgpa, "Marks must be filled!");
    var sch = $('#sch').val();
    varifynull(sch, "School/College name must be filled!");
    var board = $('#board').val();
    varifynull(board, "Board/University must be filled!");
    var interntype = $('#interntype option:selected').val();
    if (flag === 0) {
        $.ajax({
            method: 'post',
            url: 'ad_register.php',
            data: {
                submit: 'submit',
                namekey: name,
                fnameKey: fname,
                emailkey: email,
                dobkey: dob,
                aadharkey: aadhar,
                addresskey: address,
                mobilenokey: mobileno,
                qualikey: quali,
                cgpakey: cgpa,
                schkey: sch,
                boardkey: board,
                interntypekey: interntype,
            },
            beforeSend: function(){
            $("#blank").css("display","block");
            },
            complete: function(){
            $("#blank").css("display","none");
            },
            success: function(data) {
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
                            window.location.href = "ad_add_user.php";
                        }
                    })
            }
        });
    } else {
        alert(data);
    }
});

$(document).on('submit','#update_user_details', function(e) {
    e.preventDefault();
    var sno = $('#update_sno').val();

    var fname = $('#update_fname').val();
    varifynull(fname, "Father name must be filled!");
    var dob = $('#update_dob').val();
    //validatedate(dob,"Invalid date of birth!");
    var aadhar = $('#update_aadhar').val();
    varifynull(aadhar, "Aadhar no. must be filled!");
    var address = $('#update_address').val();
    varifynull(address, "Address must be filled!");
    var qualification = $('#update_quali').val();
    varifynull(qualification, "Qualification must be filled!");
    var mobileno = $('#update_mobileno').val();
    varifynull(mobileno, "Mobile no. must be filled!");
    var quali = $('#update_quali').val();
    varifynull(quali, "Your qualification must be filled!");
    var cgpa = $('#update_cgpa').val();
    varifynull(cgpa, "Marks must be filled!");
    var sch = $('#update_sch').val();
    varifynull(sch, "School/College name must be filled!");
    var board = $('#update_board').val();
    varifynull(board, "Board/University must be filled!");  
    alert(board);  
        if (flag === 0) {
            alert("e");
        $.ajax({
            method: 'post',
            url: 'ad_register.php',
            data: {
                submit: 'update',
                snokey: sno,
                fnameKey: fname,
                dobkey: dob,
                aadharkey: aadhar,
                addresskey: address,
                mobilenokey: mobileno,
                qualikey: quali,
                cgpakey: cgpa,
                schkey: sch,
                boardkey: board
            },
            beforeSend: function(){
            $("#blank").css("display","block");
            },
            complete: function(){
            $("#blank").css("display","none");
            },
            success: function(data) {
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
                            window.location.href = "ad_edit_user.php";
                        }
                    })
            }
        });
    } else {
        alert(data);
    }
}); 