<?php
require "../conn.php";
include "header.php";
//session_start();
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

		$rcdtodelete = "SELECT * FROM ordertbl WHERE sn = $get_id";
		$deleteselect = mysqli_query($conn, $rcdtodelete);
		if ($deleteselect) {
			$result = mysqli_fetch_assoc($deleteselect);
			$firstname = $result['firstname'];
			$lastname = $result['lastname'];
			$address = $result['address'];
			$email = $result['email'];
			$phone  = $result['phone'];
			$image = $result['images'];
			$amount = $result['amount'];
			$site_address = $result['site_address'];
			$type = $result['type'];
			$orderdate = $result['orderdate'];
			# code...
		}
	//sql to delete a record 
	$movetobin = "INSERT INTO deletedorder (firstname, lastname, address, email, phone, image, amount, site_address, type, orderdate, admininfo, deletedate) VALUES ('$firstname', '$lastname', '$address', '$email','$phone','$image','$amount','$site_address','$type','$orderdate','$user','$deletedate')";
	$mtobin = mysqli_query($conn, $movetobin);
	if ($mtobin) {
		$_SESSION['deleted'] = "deleted";
		$sql = mysqli_query($conn, "DELETE FROM ordertbl WHERE sn = $get_id");
		if($sql){
		  	echo'
			  	<script>
			  		window.location="respondedorder.php";
			  	</script>';
		}
	}
	
    }

?>
