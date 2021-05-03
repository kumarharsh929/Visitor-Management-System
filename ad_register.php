<?php
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['submit']) && $_POST['submit']=='submit'){
	$con = mysqli_connect('localhost', 'root', '', 'task_management');
	$name = mysqli_real_escape_string($con, $_POST['namekey']);
	$fname = mysqli_real_escape_string($con, $_POST['fnameKey']);
	$email = mysqli_real_escape_string($con, $_POST['emailkey']);
	$dob = mysqli_real_escape_string($con, $_POST['dobkey']);
	$aadhar = mysqli_real_escape_string($con, $_POST['aadharkey']);
	$address = mysqli_real_escape_string($con, $_POST['addresskey']);
	$mobileno = mysqli_real_escape_string($con, $_POST['mobilenokey']);
	$quali = mysqli_real_escape_string($con, $_POST['qualikey']);
	$cgpa = mysqli_real_escape_string($con, $_POST['cgpakey']);
	$sch = mysqli_real_escape_string($con, $_POST['schkey']);
	$board = mysqli_real_escape_string($con, $_POST['boardkey']);
	$interntype = mysqli_real_escape_string($con, $_POST['interntypekey']);
	$DOB = date("Y-m-d",strtotime($dob));
	$user_id = "TECH".rand(100,999);
	$password = $name.rand(100,9999);
	$enpass = md5($password);	

	$query="INSERT INTO `user_details`(`email` , `user_id` , `name`, `father_name`, `dob`, `qualification`, `percentage_cgpa`, `college_school`, `university_board`, `aadhar`, `mobile_no`, `registration_date`, `address`,`password`, `desig`, `status`) VALUES ('".$email."','".$user_id."' , '".$name."', '".$fname."', '".$DOB."', '".$quali."', '".$cgpa."', '".$sch."', '".$board."', '".$aadhar."', '".$mobileno."','".date("Y-m-d H:i:s")."', '".$address."', '".$enpass."', '".$interntype."','1')";
	$result = mysqli_query($con, $query);
	if($result) {
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

//		$mail->SMTPDebug = 4;                               // Enable verbose debug output

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

		$mail->Subject = 'Your Password!';
		$mail->Body    = '<!DOCTYPE html>
<html>
<head>
	<title>Your Password</title>
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
				<h4 style="font-family: "Economica", sans-serif;"><br/>This is your password confirmation mail.<br/><br/><b>Your Email ID is : '.$email.'<br/>Your password is : '.$password.'<br/><br/></b>Please login and change your password.</h4>
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
		    echo 'You Registered Successfully<br/>Check your email for password!';
		}
	}
	else {
		echo mysqli_error($con);
	}
}

if(isset($_POST['submit']) && $_POST['submit']=='update'){
	$con = mysqli_connect('localhost', 'root', '', 'task_management');
	$sno = $_POST['snokey'];

	$fname = mysqli_real_escape_string($con, $_POST['fnameKey']);
	$dob = mysqli_real_escape_string($con, $_POST['dobkey']);
	$aadhar = mysqli_real_escape_string($con, $_POST['aadharkey']);
	$address = mysqli_real_escape_string($con, $_POST['addresskey']);
	$mobileno = mysqli_real_escape_string($con, $_POST['mobilenokey']);
	$quali = mysqli_real_escape_string($con, $_POST['qualikey']);
	$cgpa = mysqli_real_escape_string($con, $_POST['cgpakey']);
	$sch = mysqli_real_escape_string($con, $_POST['schkey']);
	$board = mysqli_real_escape_string($con, $_POST['boardkey']);
	//echo $board;
	$query="UPDATE `user_details` SET `father_name`='".$fname."', `dob`='".$dob."', `qualification`='".$quali."', `percentage_cgpa`='".$cgpa."', `college_school`='".$sch."', `university_board`='".$board."', `aadhar`='".$aadhar."', `mobile_no`='".$mobileno."', `address`='".$address."' WHERE `s_no`='".$sno."' ";
	$result = mysqli_query($con, $query);
	if($result){
		echo"User Details update successfully!".$query;
	}
	else{
		echo $query;
	}
}

if(isset($_POST['email']) && $_POST['required'] =='emailValidation'){
	$email = $_POST['email'];
	$query="SELECT * FROM `user_details` WHERE `email` ='".$email."'";
	//echo $query;
	$con = mysqli_connect('localhost', 'root', '', 'task_management');
	$result = mysqli_query($con, $query);	
	if(mysqli_num_rows($result) > 0){
		echo "already";
	}
	else{
		echo "true";

	}
}
?>