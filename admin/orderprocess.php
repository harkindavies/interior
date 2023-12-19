<?php
require "../conn.php";
 session_start();
	$select = "";
	if ($_REQUEST['mySelt']) {
		# code...
		$select = $_REQUEST['mySelt'];
		$_SESSION['serialno'] = $select;
		//echo $select;
		echo $_SESSION['serialno'];
	}
?>