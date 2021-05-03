<?php   
session_start();
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['visitor']) && $_POST['visitor']=='check')
{
	$con = mysqli_connect('localhost', 'root', '', 'task_management');
	$visitor_id = 'VIS'.rand(100,999);
	$visit_date = date("Y-m-d H:i:s");
	$visitor_type = mysqli_real_escape_string($con, $_POST['visitor_type_key']);
	$visitor_name = mysqli_real_escape_string($con, $_POST['visitor_name_key']);
	$visitor_company = mysqli_real_escape_string($con, $_POST['visitor_company_key']);
	$visitor_address = mysqli_real_escape_string($con, $_POST['visitor_address_key']);
    $meeting_with = mysqli_real_escape_string($con, $_POST['meeting_with_key']);
    $meeting_date = mysqli_real_escape_string($con, $_POST['meeting_date_key']);
	$email = mysqli_real_escape_string($con, $_POST['visitor_email_key']);
	$visitor_contact = mysqli_real_escape_string($con, $_POST['visitor_contact_key']);
    $visitor_aadhar = mysqli_real_escape_string($con, $_POST['visitor_aadhar_key']);
	$visitor_description = mysqli_real_escape_string($con, $_POST['visitor_description_key']);
    $added_by = $_SESSION['name'];

    $target_dir = "vm_upload_doc/";
    $target_file = $target_dir.basename($_FILES["upload_image"]["name"]);
    move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file);
	$query="INSERT INTO `visitor_details`(`visitor_id`, `visit_date` , `visitor_type` , `visitor_name` , `visitor_company`, `visitor_address`,`meeting_with`, `meeting_date`, `visitor_email`, `visitor_contact_no`, `visitor_aadhar_no`, `visitor_description`, `added_by`,`upload_photo`) VALUES ('".$visitor_id."', '".$visit_date."' , '".$visitor_type."', '".$visitor_name."', '".$visitor_company."', '".$visitor_address."', '".$meeting_with."', '".$meeting_date."', '".$email."', '".$visitor_contact."', '".$visitor_aadhar."', '".$visitor_description."', '".$added_by."','".$target_file."')";
	$result = mysqli_query($con, $query);

    if($result) {
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

//      $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'vikashtech.info@gmail.com';                 // SMTP username
        $mail->Password = 'vikash123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('vikashtech.info@gmail.com', 'Vikash Tech');
        $mail->addAddress($email);     // Add a recipient

        $mail->addReplyTo('vikashtech.info@gmail.com');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Registration Mail!';
        $mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <title>Meeting Scheduled</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Economica|IM+Fell+English+SC&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="col-sm-12" style="height: 50vh; background-color: #fff; color: rgb(0,0,51); ">
                <div class="card" style="color: rgb(0,0,51);text-align: center; height: 70vh; z-index: 1; width: 70vw; background-color: #fff; margin-top:  10vh; border:2px solid rgb(0,0,51); padding:5px;">
                    <h2 style="font-family: "IM Fell English SC", serif; padding-top: 20px;">Welcome to M/s Vikash Tech</h2>
                <h4 style="font-family: "Economica", sans-serif;"><br/>This is your Visitor registration mail.<br/><br/><b>Your meeting is scheduled with : '.$meeting_with.'<br/>Your meeting date: '.$meeting_date.'<br/><br/></b>Please visit at the scheduled date.</h4>
                <div style="vertical-align: bottom;"><br/><b>Designed by M/s VIKASH TECH</b></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="height: 1vh; background-color: rgb(0,0,51); ">
                
            </div>
        </div>
    </div>
</body>
</html>';

    if(!$mail->send()) {
            echo 'Message could not be sent.';
        //    echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'You Registered Successfully<br/>Check your email for meeting updates!';
        }
    }
    else {
        echo mysqli_error($con);
    }
}

/*if(isset($_POST['image_id']) && $_POST['image_id'] == 'upload_image'){
         $target_dir = "vm_upload_doc/";
        $target_file = $target_dir.basename($_FILES["upload_image"]["name"]);
        if(move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file)){
            $query = "INSERT INTO `visitor_details` (`upload_photo`) VALUES ('".$target_file."')";
            $result = mysqli_query($con, $query);
            echo "uploaded Successfully";
            echo $target_file;
        }
        else{
            echo "Failed";
        }

    }*/




  
function visitor_details($user_id){
        $query = "SELECT * FROM `visitor_details` WHERE `visitor_id`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
              echo' <div class="row card" style="margin-top: 10px;"> 
              			<div><h3 class="card-header" style="text-align:center">Visitor Details...</h3></div>
                            <div class="row">
                                <div class="col-md-12" align="center"><br/>
                                    <label><b>Photo:</b></label><br/>
                                    <img src="'.$row['upload_photo'].'" style="height: 100px; width:100px; border-radius: 10px; border:1px solid rgb(0,0,51);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>ID:</b></label>
                                    <label>'.$row['visitor_id'].'</label></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item" >
                                    <label><b>Added By:</b></label>
                                    <label>'.$row['added_by'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Visit Date:</b></label>
                                    <label>'.date("d-m-Y",strtotime($row['visit_date'])).'</label></p>
                                </div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item" >
                                    <label><b>Meeting Date:</b></label>
                                    <label>'.$row['meeting_date'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>  
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">  
                                    <p class="list-group list-group-item">
                                    <label><b>Type:</b></label>
                                    <label>'.$row['visitor_type'].'</label></p>
                                </div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Meeting With:</b></label>
                                    <label>'.$row['meeting_with'].'</label></p>  
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Name:</b></label>
                                    <label>'.$row['visitor_name'].'</label></p>	
                                </div>
                                <div class="col-md-5">    
                                    <p class="list-group list-group-item">
                                    <label><b>Email:</b></label>
                                    <label>'.$row['visitor_email'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Visitor company:</b></label>
                                    <label>'.$row['visitor_company'].'</label>
                                </div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item" >
                                    <label><b>Contact No:</b></label>
                                    <label>'.$row['visitor_contact_no'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Address:</b></label>
                                    <label>'.$row['visitor_address'].'</label></p> 
                                </div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item" >
                                    <label><b>Aadhar:</b></label>
                                    <label>'.$row['visitor_aadhar_no'].'</label></p> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <p class="list-group list-group-item" >
                                    <label><b>Description::</b></label>
                                    <label>'.$row['visitor_description'].'</label></p> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-1"><br/>
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                    </div>';
    }



function visitor_edit($user_id){
        $query = "SELECT * FROM `visitor_details` WHERE `visitor_id`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        $query1 ="SELECT * FROM `user_details` ";
        $result1 = mysqli_query($con,$query1);
              
                    echo' <form method="post" id="update_visitor_details_form">
                        <div class="row card" style="margin-top: 10px;"> 
                        <input type="hidden" id="visi_id" value="'.$user_id.'">
                            <div><h3 class="card-header" style="text-align:center">Edit Details...</h3></div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>ID:</b></label>
                                    <label>'.$row['visitor_id'].'</label></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Added By:</b></label>
                                    <label>'.$row['added_by'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Visit Date:</b></label>
                                    <label>'.date("d-m-Y",strtotime($row['visit_date'])).'</label></p>
                                </div>
                                <div class="col-md-5">
                                    <p class="list-group list-group-item">
                                    <label><b>Meeting Date:</b></label>
                                    <input type="date" required="true" class="form-control" id="update_meeting_date" value="'.$row['meeting_date'].'" ></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div> 
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Type:</b></label>
                                    <select required="true" class="form-control" id="update_visitor_type" >
                                    <option>'.$row['visitor_type'].'</option> 
                                    if('.$row['visitor_type'].'=="student")
                                    {
                                        <option>Business</option>
                                    } 
                                    if('.$row['visitor_type'].'=="Business")
                                    {
                                        <option>student</option>
                                    } 
                                    </select></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Meeting With:</b></label>
                                    <select required="true" class="form-control" id="update_meeting_with">
                                    <option>'.$row['meeting_with'].'</option>
                                    ';
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                        echo'<option value="'.$row1["name"].'">'.$row1["name"].'</option>';}
                            echo'   </select>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Name:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_name" value="'.$row['visitor_name'].'" ></p>
                                </div>
                                <div class="col-md-5"><br/>   
                                    <p class="list-group list-group-item">
                                    <label><b>Email:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_email" value="'.$row['visitor_email'].'" ></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Visitor company:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_company" value="'.$row['visitor_company'].'" ></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item" >
                                    <label><b>Contact No:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_contact_no" value="'.$row['visitor_contact_no'].'" ></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Address:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_address" value="'.$row['visitor_address'].'" ></p> 
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item" >
                                    <label><b>Visitor Aadhar:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_aadhar" value="'.$row['visitor_aadhar_no'].'" ></p> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <p class="list-group list-group-item" >
                                    <label><b>Description:</b></label>
                                    <input type="text" required="true" class="form-control" id="update_visitor_description" value="'.$row['visitor_description'].'" ></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-2"><br/>
                                    <input type="submit" class="btn btn-success" value="Submit" id="update_visitor_details">
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                    </div></form>';

    }



function rescheduled_meeting($user_id){
        $query = "SELECT * FROM `visitor_details` WHERE `visitor_id`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
              echo' <div class="row card" style="margin-top: 10px;"> 
                        <div><h3 class="card-header" style="text-align:center">Rescheduled Meeting...</h3></div>
                            <input type="hidden" id="visit_id" value="'.$user_id.'"> 
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>ID:</b></label>
                                    <label>'.$row['visitor_id'].'</label></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Name:</b></label>
                                    <label>'.$row['visitor_name'].'</label></p> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label><b> Reschedule Date:</b></label><br/>
                                    <input type="date" class="form-control" name="rescheduled_date" id="rescheduled_date" value="'.$row['meeting_date'].'"></textarea> 
                                </div>
                                <div class="col-md-5">
                                    <label><b> Meeting With:</b></label><br/>
                                    <select required="true" class="form-control" id="update_meeting_with">
                                    ';
                                    while ($row1 = mysqli_fetch_array($result1)) {
                                        echo'<option value="'.$row1["name"].'">'.$row1["name"].'</option>';}
                            echo'   </select></p>   
                                </div>
                                <div class="col-md-1"></div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <label><b> Rescheduled Due To:</b></label><br/>
                                    <textarea class="form-control" name="rescheduled_due_to" id="rescheduled_due_to" placeholder="Enter The Reason Of Rescheduling The Meeting"></textarea> 
                                </div>
                                <div class="col-md-1"></div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-2"><br/>
                                    <input type="submit" class="btn btn-success" style="color:white;" id="rescheduled_meeting_submit" value="Submit" name="rescheduled_meeting_submit">
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div><br/>  
                    </div>';
    }


function add_mom($user_id){
        $query = "SELECT * FROM `visitor_details` WHERE `visitor_id`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
              echo'<form method="post" id="addmom_form">
                    <div class="row card" style="margin-top: 10px;"> 
                        <div><h3 class="card-header" style="text-align:center">Add MOM...</h3></div>
                             <input id="vm_id" type="hidden" value="'.$user_id.'" />
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>  
                                    <p class="list-group list-group-item">
                                    <label><b>ID:</b></label>
                                    <label>'.$row['visitor_id'].'</label></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Name:</b></label>
                                    <label>'.$row['visitor_name'].'</label></p>  
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>  
                                    <p class="list-group list-group-item">
                                    <label><b>Visitor Type:</b></label>
                                    <label>'.$row['visitor_type'].'</label></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Meeting With:</b></label>
                                    <label>'.$row['visitor_type'].'</label></p>  
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <label><b> Objective:</b></label><br/>
                                    <textarea class="form-control" name="meeting_objective" id="meeting_objective" placeholder="Enter The Objective Of The Meeting"></textarea> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <label><b> Discussion:</b></label><br/>
                                    <textarea class="form-control" name="meeting_discussion" id="meeting_discussion" placeholder="Enter Discussion held In The Meeting"></textarea> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <label><b> Conclusion:</b></label><br/>
                                    <textarea class="form-control" name="meeting_conclusion" id="meeting_conclusion" placeholder="Enter The Conclusion Of The Meeting"></textarea> 
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-2"><br/>
                                    <input type="submit" class="btn btn-success" style="color:white;" id="add_mom_submit" value="Submit" name="add_mom_submit">
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div> 
                    </div>
                    </form>';
    }



function view_meeting($user_id){
        $query = "SELECT * FROM `visitor_details` WHERE `visitor_id`= '".$user_id."' ";
        $con = mysqli_connect('localhost','root','','task_management');
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
              echo' <div class="row card" style="margin-top: 10px;"> 
                        <div><h3 class="card-header" style="text-align:center">View Meeting...</h3></div>
                             
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5"><br/>  
                                    <p class="list-group list-group-item">
                                    <label><b>Visitor Type:</b></label>
                                    <label>'.$row['visitor_type'].'</label></p>
                                </div>
                                <div class="col-md-5"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b>Meeting With:</b></label>
                                    <label>'.$row['meeting_with'].'</label></p>  
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <p class="list-group list-group-item">
                                    <label><b> Objective:</b></label>
                                    <label>'.$row['meeting_objective'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b> Discussion:</b></label>
                                    <label>'.$row['meeting_discussion'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b> Conclusion:</b></label>
                                    <label>'.$row['meeting_conclusion'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"><br/>
                                    <p class="list-group list-group-item">
                                    <label><b> Rescheduled Date:</b></label>
                                    <label>'.$row['rescheduled_date'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <p class="list-group list-group-item">
                                    <label><b> Rescheduled Due To:</b></label>
                                    <label>'.$row['rescheduled_due_to'].'</label></p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-1"><br/>
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                    </div>';
    }




if(isset($_POST['visitor_view']) && $_POST['visitor_view'] == 'visitor_view'){
    $id = $_POST['id'];
    visitor_details($id);
}

if(isset($_POST['visitor_edit']) && $_POST['visitor_edit'] == 'visitor_edit'){
    $id = $_POST['id'];
    visitor_edit($id);
}

if(isset($_POST['rescheduled_meeting']) && $_POST['rescheduled_meeting'] == 'rescheduled_meeting'){
    $id = $_POST['id'];
    rescheduled_meeting($id);
}

if(isset($_POST['add_mom']) && $_POST['add_mom'] == 'add_mom'){
    $id = $_POST['id'];
    add_mom($id);
}

if(isset($_POST['meeting_view']) && $_POST['meeting_view'] == 'meeting_view'){
    $id = $_POST['id'];
    view_meeting($id);
}


if(isset($_POST['visitor']) && $_POST['visitor']=='update')
{

    $con = mysqli_connect('localhost', 'root', '', 'task_management');
   // $meeting_with = mysqli_real_escape_string($con, $_POST['meeting_with_key']);
   // $added_by = $_SESSION['username'];
    $v_id = $_POST['v_id_key'];
    $update_visitor_type = mysqli_real_escape_string($con, $_POST['update_visitor_type_key']);
    $update_meeting_with = mysqli_real_escape_string($con, $_POST['update_meeting_with_key']);
    $update_meeting_date = mysqli_real_escape_string($con, $_POST['update_meeting_date_key']);
    $update_visitor_name = mysqli_real_escape_string($con, $_POST['update_visitor_name_key']);
    $update_visitor_email = mysqli_real_escape_string($con, $_POST['update_visitor_email_key']);
    $update_visitor_company = mysqli_real_escape_string($con, $_POST['update_visitor_company_key']);
    $update_visitor_contact_no = mysqli_real_escape_string($con, $_POST['update_visitor_contact_no_key']);
    $update_visitor_aadhar_no = mysqli_real_escape_string($con, $_POST['update_visitor_aadhar_no_key']);
    $update_visitor_address = mysqli_real_escape_string($con, $_POST['update_visitor_address_key']);
    $update_visitor_description = mysqli_real_escape_string($con, $_POST['update_visitor_description_key']);
    
    $query = "UPDATE `visitor_details` SET `visitor_type`= '".$update_visitor_type."',`meeting_with`= '".$update_meeting_with."',`meeting_date`= '".$update_meeting_date."',`visitor_name`= '".$update_visitor_name."',`visitor_email`= '".$update_visitor_email."',`visitor_company`= '".$update_visitor_company."',`visitor_contact_no`= '".$update_visitor_contact_no."',`visitor_aadhar_no`= '".$update_visitor_aadhar_no."',`visitor_address`= '".$update_visitor_address."',`visitor_description`= '".$update_visitor_description."' WHERE `visitor_id` = '".$v_id."' ";
    //$query="INSERT INTO `visitor_details`( `meeting_objective` , `meeting_discussion` , `meeting_conclusion`) VALUES ( '".$meeting_objective."', '".$meeting_discussion."' , '".$meeting_conclusion."')";
    $result = mysqli_query($con, $query);
    echo $query;

}



if(isset($_POST['visitor']) && $_POST['visitor']=='rescheduled')
{

    $con = mysqli_connect('localhost', 'root', '', 'task_management');
   // $meeting_with = mysqli_real_escape_string($con, $_POST['meeting_with_key']);
   // $added_by = $_SESSION['username'];
    $vis_id = $_POST['vis_id_key'];
    $rescheduled_date = mysqli_real_escape_string($con, $_POST['rescheduled_date_key']);
    $rescheduled_due_to = mysqli_real_escape_string($con, $_POST['rescheduled_due_to_key']);
    
    $query = "UPDATE `visitor_details` SET `rescheduled_due_to`= '".$rescheduled_due_to."', `rescheduled_date`= '".$rescheduled_date."' WHERE `visitor_id` = '".$vis_id."' ";
    //$query="INSERT INTO `visitor_details`( `meeting_objective` , `meeting_discussion` , `meeting_conclusion`) VALUES ( '".$meeting_objective."', '".$meeting_discussion."' , '".$meeting_conclusion."')";
    $result = mysqli_query($con, $query);
    echo $query;

}



if(isset($_POST['visitor']) && $_POST['visitor']=='mom')
{

    $con = mysqli_connect('localhost', 'root', '', 'task_management');
   // $meeting_with = mysqli_real_escape_string($con, $_POST['meeting_with_key']);
   // $added_by = $_SESSION['username'];
    $id = $_POST['id_key'];
    $meeting_objective = mysqli_real_escape_string($con, $_POST['meeting_objective_key']);
    $meeting_discussion = mysqli_real_escape_string($con, $_POST['meeting_discussion_key']);
    $meeting_conclusion = mysqli_real_escape_string($con, $_POST['meeting_conclusion_key']);
    
    $query = "UPDATE `visitor_details` SET `meeting_objective`= '".$meeting_objective."',`meeting_discussion`= '".$meeting_discussion."',`meeting_conclusion`= '".$meeting_conclusion."' WHERE `visitor_id` = '".$id."' ";
    //$query="INSERT INTO `visitor_details`( `meeting_objective` , `meeting_discussion` , `meeting_conclusion`) VALUES ( '".$meeting_objective."', '".$meeting_discussion."' , '".$meeting_conclusion."')";
    $result = mysqli_query($con, $query);
    echo $query;

}

if(isset($_POST['visitor']) && $_POST['visitor']=='activate')
{

    $con = mysqli_connect('localhost', 'root', '', 'task_management');
    $data_fig = $_POST['data_fig'];
    $query = "UPDATE `user_details` SET `vis_status`= 0 WHERE `user_id` = '".$data_fig."' ";
    //$query="INSERT INTO `visitor_details`( `meeting_objective` , `meeting_discussion` , `meeting_conclusion`) VALUES ( '".$meeting_objective."', '".$meeting_discussion."' , '".$meeting_conclusion."')";
    $result = mysqli_query($con, $query);
    echo $query;

}


if(isset($_POST['visitor']) && $_POST['visitor']=='deactivate')
{

    $con = mysqli_connect('localhost', 'root', '', 'task_management');
    $data_fig = $_POST['data_fig'];
    $query = "UPDATE `user_details` SET `vis_status`= 1 WHERE `user_id` = '".$data_fig."' ";
    //$query="INSERT INTO `visitor_details`( `meeting_objective` , `meeting_discussion` , `meeting_conclusion`) VALUES ( '".$meeting_objective."', '".$meeting_discussion."' , '".$meeting_conclusion."')";
    $result = mysqli_query($con, $query);
    echo $query;

}

?>



