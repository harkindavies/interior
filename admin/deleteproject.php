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
	  $deletedate = date("Y-m-d h:i:s");
		require "autolog.php";
		$get_id = $_GET['sn'];
		//echo $get_id;

		$rcdtodelete = "SELECT * FROM Project WHERE sn = $get_id";
		$deleteselect = mysqli_query($conn, $rcdtodelete);
		if ($deleteselect) {
			$result = mysqli_fetch_assoc($deleteselect);
			$projectname = $result['projectname'];
			$price = $result['projectprice'];
			$projecttype = $result['projectype'];
			$promotype = $result['promotype'];
			$target_file  = $result['projectimage'];
			# code...
		}
		$deleteproject = 0;
	//sql to delete a record 
	$movetobin = "INSERT INTO deletedproject (projectname, projectprice, projectype, promotype, projectimage, admininfo,deletedate) VALUES ('$projectname', '$price', '$projecttype', '$promotype','$target_file','$user','$deletedate')";
	$mtobin = mysqli_query($conn, $movetobin);
	if ($mtobin) {
		$sql = mysqli_query($conn, "DELETE FROM project WHERE sn = $get_id");
		if($sql){
			$deleteproject = 1;
	  		echo'<script type="text/javascript">
	           window.location="viewproject.php";
	        </script>';
		}
		else{
			$deleteproject = 2;
		}
		$_SESSION['deleteproject'] = $deleteproject;
	}
	
    }
?>