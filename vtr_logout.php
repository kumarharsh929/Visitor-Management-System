<?php
	session_start();
	session_unset();
	session_destroy();
	header('Location: vtr_login_view.php');
?>