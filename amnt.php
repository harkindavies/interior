<?php
require "conn.php";
 session_start();
	$ttamnt = "";
	if ($_REQUEST['mytAmnt']) {
		# code...
		$ttamnt = $_REQUEST['mytAmnt'];
		$_SESSION['amnt_selectedall'] = $ttamnt;
		//echo $select;
		echo $_SESSION['amnt_selectedall'];
	}
?>