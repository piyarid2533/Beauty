<?php
session_start();
if($_SESSION['se_status']  ==  'admin') 
	{
		unset($_SESSION['se_id']);
		unset($_SESSION['se_name']);
		unset($_SESSION['se_status']);
		session_destroy();
		
		echo "<script>window.location='index.php';</script>";
	}
else if($_SESSION['se_status']  ==  'user')
	{
		
		unset($_SESSION['se_id']);
		unset($_SESSION['se_name']);
		unset($_SESSION['se_status']);
		session_destroy();
		
		echo "<script>window.location='index.php';</script>";
	}

?>