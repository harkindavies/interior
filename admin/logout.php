<?php
	include "../conn.php";
	
	session_start();
	unset($_SESSION['adminemail']);
	unset($_SESSION['profilepic']);
	//session_destroy();
	header("location:login.php");
?>