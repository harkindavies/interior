<?php
require "conn.php";
 session_start();
	$select = "";
	if ($_REQUEST['mySelt']) {
		# code...
		$select = $_REQUEST['mySelt'];
		$_SESSION['my_selected_img'] = $select;
		//echo $select;
		echo $_SESSION['my_selected_img'];
	}
?>