<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="index.php?e=login first to perform this action";</script>';
}
	else{
	require "autolog.php";
	$get_id = $_GET['id'];
	//echo $get_id;
	//sql to delete a record 
	$sql = mysqli_query($conn, "SELECT * FROM tblbookticket WHERE id = $get_id");
		if($sql){
			$picked = "picked";
			$insert =mysqli_query($conn, "UPDATE tblbookticket SET picked = '$picked' WHERE id = $get_id");
			if($insert){
		  		echo'<script type="text/javascript">
		           alert("picking approved");
		           window.location="pickcar.php";
		        </script>';
		    }
		    else{
		    	echo "<script type='text/javascript'>alert('not picked');
		    	window.location='pickcar.php' ; </script>" ;


		    }
	    }
    }
?>