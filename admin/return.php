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
	//echo $get_id;
	//sql to delete a record 
	$sql = mysqli_query($conn, "SELECT * FROM tblbookticket WHERE id = $get_id");
		if($sql){
			$returned = "returned";
			$insert = mysqli_query($conn, "UPDATE tblbookticket SET returned = '$returned' WHERE id = $get_id");
			if($insert){
				$success = "successful";
				$removepick =mysqli_query($conn, "UPDATE tblbookticket SET picked = '$success' WHERE id = $get_id");
				if($removepick){
		  			echo'<script type="text/javascript">
		           alert("Car returning confirmed");
		           window.location="returncar.php";</script>';
		    	}else{
		    		echo "<script type='text/javascript'>alert('Succesfully returned but not cleared yet');
		    	window.location='returncar.php' ; </script>" ;
		    	}
		    }
		    else{
		    	echo "<script type='text/javascript'>alert('Error encounter during car returning process. Try again');
		    	window.location='returncar.php' ; </script>" ;


		    }
	    }
    }
?>