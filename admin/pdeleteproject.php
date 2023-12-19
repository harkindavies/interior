<?php
require "../conn.php";
session_start();
$deleteproject = 0;
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
		$getp = "SELECT * FROM deletedproject WHERE sn = $get_id" ;
		$getpimg = mysqli_query($conn, $getp);
		if ($getp) {
			
			# code...
			$rsltimg = mysqli_fetch_assoc($getpimg);
			$dimg = $rsltimg['projectimage'];
		}
		
		$sql = mysqli_query($conn, "DELETE FROM deletedproject WHERE sn = $get_id");
		if($sql){
			unlink($dimg);
			$deleteproject = 1;
	  		echo'<script type="text/javascript">
	           window.location="projectbin.php";
	        </script>';
	    }
	    else{
			$deleteproject = 2;
		}
    }
	$_SESSION['deleteproject'] = $deleteproject;

?>