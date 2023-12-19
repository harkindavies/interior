<?php
require "../conn.php";
session_start();
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
	  $uploadate = date("Y-m-d h:i:s");
		require "autolog.php";
		$get_id = $_GET['sn'];
		//echo $get_id;

		$rcdtodelete = "SELECT * FROM deletedvideo WHERE sn = $get_id";
		$deleteselect = mysqli_query($conn, $rcdtodelete);
		if ($deleteselect) {
			$result = mysqli_fetch_assoc($deleteselect);
			$projectname = $result['projectname'];
			$description = $result['description'];
			$projecttype = $result['projectype'];
			$target_file  = $result['projectvideo'];
			# code...
		}
		$deletedvideo = 0;
	//sql to delete a record 
		
	$movetobin = "INSERT INTO videoproject (projectname, description, projectype, projectvideo, admininfo, uploadate) VALUES ('$projectname', '$description', '$projecttype', '$target_file','$user', '$uploadate')";
	$mtobin = mysqli_query($conn, $movetobin);
	if ($mtobin) {
		$sql = mysqli_query($conn, "DELETE FROM deletedvideo WHERE sn = $get_id");
		if($sql){
			$deletevideo = 3;
	  		echo "<script>window.location ='videobin.php';</script>";
		}
		else{
			$deletevideo = 4;
		}
	}
	$_SESSION['deletevideo'] = $deletevideo;
    }
?>