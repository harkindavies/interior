<?php
require "conn.php";
 session_start();
	$allselect = "";
	if ($_REQUEST['mySeltimg']) {
		# code...
		$allselect = $_REQUEST['mySeltimg'];
		$_SESSION['my_selected_imgall'] = $allselect;
		//echo $select;
		echo $_SESSION['my_selected_imgall'];
	}
?>