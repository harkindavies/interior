<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php?e=login first to perform this action";</script>';
}
	else{
	require "autolog.php";
	$get_id = $_GET['id'];
	echo $get_id;
	//sql to delete a record 
	$sql = mysqli_query($conn, "DELETE FROM tblhelp WHERE id = $get_id");
		if($sql){
	  	echo'<script type="text/javascript">
	           alert("Message deleted");
	           window.location="helpmessage.php";
	        </script>';
	    }
    }
?>