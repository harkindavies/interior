<?php
$logtime = $_SESSION['admintime'];
	$timenow = time();
	$timeout = $logtime + 86400;

	if ($timeout <= $timenow) {
		unset($_SESSION['adminemail']);
		//session_unset();
		//session_destroy();
		echo '<script>window.location="login.php";</script>';
	}
?>