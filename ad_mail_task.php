<?php
if($result){
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
	<style>
		.container-fluid {
		  width: 100%;
		  padding-right: 15px;
		  padding-left: 15px;
		  margin-right: auto;
		  margin-left: auto;
		}

		.row {
		  display: -ms-flexbox;
		  display: flex;
		  -ms-flex-wrap: wrap;
		  flex-wrap: wrap;
		  margin-right: -15px;
		  margin-left: -15px;
		}
	</style>
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
?>