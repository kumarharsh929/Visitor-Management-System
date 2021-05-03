<?php
	session_start();
	if(isset($_SESSION['username'])){
		header('Location: vtr_index_view.php');
	}

	if(isset($_POST['submit'])){
		$userName = $_POST['username'];
		$password = $_POST['password'];
		
		if(!empty($userName)){
			$con = mysqli_connect('localhost', 'root', '', 'task_management');
			$query = "SELECT * FROM `user_details` WHERE `email` = '".$userName."' AND `password` = '".md5($password)."'";
			$result = mysqli_query($con, $query);
			$row = mysqli_num_rows($result);
			$array = mysqli_fetch_array($result);

			if ($row==1) {
				echo"Data is correct";
				$_SESSION['name'] = $array['name'];
 				$_SESSION['username'] = $userName;
				$_SESSION['desig'] = $array['desig'];
				$_SESSION['vis_status'] = $array['vis_status'];
				header('Location: vtr_index_view.php');
			}
			else
			{
				header('Location:vtr_login_view.php');
			}
		}
		else{
			echo("Invalid ID");
				header('Location:vtr_login_view.php');
		}
	}
?>