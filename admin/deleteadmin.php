<?php
require "../conn.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php?e=login first to perform this action";</script>';
}
	else{
		$deleteadmin = 0;
		require "autolog.php";
		$get_id = $_GET['sn'];
		echo $get_id;
		//sql to delete a record 
		$sql = mysqli_query($conn, "DELETE FROM adminreg WHERE sn = $get_id");
		if($sql){
			$deleteadmin = 1;
	  	echo'<script type="text/javascript">
	           window.location="viewadmin.php";
	        </script>';
	    }
	    else{
	    	$deleteadmin = 2;
	    }
	    $_SESSION['deleteadmin'] = $deleteadmin;
    }
?>