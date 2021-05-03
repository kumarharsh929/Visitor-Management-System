<?php
	include('ad_function.php');
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: vtr_login_view.php');
	}
	date_default_timezone_set('Asia/Kolkata');
	require('learning.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo TOOLNAME.' - ';
			echo rtrim( str_replace('_', '&ensp;', basename($_SERVER['REQUEST_URI'])),'.php');
		?> </title>
<!--  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
	  	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Custom styles for this template -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Stylish&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/ad_style.css" rel="stylesheet">
		<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!-- Custom styles for this template -->
<!--    <link href="css/ad_style.css" rel="stylesheet"> -->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style type="text/css">
        table tr td{
          height: 2px;
        }
        body{
  		background: rgb(0,0,51);
	  	}
	    a{
	      text-decoration:none; 
	    }
      	</style>
	</head>
	<body>
		<div id="blank" style="z-index: 1; width: 100vw; height: 100vh; display: none; background:red; position: fixed; "></div>
		