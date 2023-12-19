<?php
require "../conn.php";
session_start();
$deletemsg = 0;
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php?e=login first to perform this action";</script>';
}



else{
	$email = $_SESSION['adminemail'];
	 $query = "SELECT * FROM adminreg WHERE email = '$email' ";
	 $selected = mysqli_query($conn, $query);
	 $rslt = mysqli_fetch_assoc($selected); 

	  $firstname = $rslt['firstname'];
	  $lastname = $rslt['lastname'];
	  $position = $rslt['position'];
	  $user = $firstname." ".$lastname." (".$position." )";
	  $deletedate = date("Y-m-d h:i:s");
		require "autolog.php";
		$get_id = $_GET['id'];
		//echo $get_id;

		$rcdtodelete = "SELECT * FROM messagetbl WHERE sn = $get_id";
		$deleteselect = mysqli_query($conn, $rcdtodelete);
		if ($deleteselect) {
			$result = mysqli_fetch_assoc($deleteselect);
			$msgdate = $result['msgdate'];
			$sender = $result['sender'];
			$receiver = $result['receiver'];
			$message = $result['message'];
			$msgstatus  = $result['msgread'];
			# code...
		}
		
	//sql to delete a record 
	$movetobin = "INSERT INTO deletedmsgtbl (msgdate, sender, receiver, message, msgread, admininfo,deletedate) VALUES ('$msgdate', '$sender', '$receiver', '$message','$msgstatus','$user','$deletedate')";
	$mtobin = mysqli_query($conn, $movetobin);
	if ($mtobin) {
		$sql = mysqli_query($conn, "DELETE FROM messagetbl WHERE sn = $get_id");
		if($sql){
			$deletemsg = 1;
	  	echo'<script type="text/javascript">
	           window.location="red_messages.php";
	        </script>';
		}
	}
	else{
		$deletemsg = 2;
	}
}
$_SESSION['deletemsg'] = $deletemsg;
?>









