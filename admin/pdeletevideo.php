<?php
require "../conn.php";
session_start();
$deletevideo = 0;
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php?e=login first to perform this action";</script>';
}
	
	$email = $_SESSION['adminemail'];
	 $query = "SELECT * FROM adminreg WHERE email = '$email' ";
	 $selected = mysqli_query($conn, $query);
	 $rslt = mysqli_fetch_assoc($selected); 
	  $position = $rslt['position'];
	  if($position != 'CEO & Founder'){
		echo '<script> window.location="index.php?e=only master admin can perform this action";</script>';
	  }
	  else{
		require "autolog.php";
		$get_id = $_GET['sn'];
		//echo $get_id;
		//sql to delete a record 
		$sql = mysqli_query($conn, "DELETE FROM deletedvideo WHERE sn = $get_id");
		if($sql){
			$deletevideo = 1;
	  	echo'<script type="text/javascript">
	           window.location="videobin.php";
	        </script>';
	    }
	    else{
			$deletevideo = 2;
		}
    }
	$_SESSION['deletevideo'] = $deletevideo;

?>