<?php
require "../connection.php";
session_start();
if(!isset($_SESSION['adminemail'])){
	header('location:login.php?e=login first to perform this action');
}
else{
	require "autolog.php";
	$get_id = $_GET['id'];
	$sql = mysqli_query($conn, "DELETE FROM tblbookticket WHERE id = $get_id");
	if ($sql) {
		echo '<script>alert("Ticket successfully delete");
		window.location="activeticket.php"; </script>';
	}
	else{
		echo '<script>alert("Ticket not delete");
		window.location="activeticket.php"; </script>';
	}
}