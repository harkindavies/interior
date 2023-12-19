<?php
require "conn.php";
 session_start();
	$upstar = "";
	$upimg = "";
	if ($_REQUEST['mypstar'] && $_REQUEST['myimg']) {
		# code...
		$upstar = $_REQUEST['mypstar'];
		$upimg = $_REQUEST['myimg'];
		$select = "SELECT star,user FROM project WHERE projectimage = '$upimg' ";
		$checkslt = mysqli_query($conn,$select);
		$sltresult = mysqli_fetch_assoc($checkslt);
		$fetchstar = $sltresult['star'];
		$fetchuser = $sltresult['user'];
		$sumstar = $upstar+$fetchstar;
		$sumuser = $fetchuser+1;
		$newrate = round($sumstar/$sumuser,1);
		$update = "UPDATE project SET star = '$sumstar', user = '$sumuser' WHERE projectimage = '$upimg' ";
		$checkupd = mysqli_query($conn,$update);
		if ($checkupd) {

			echo $sumuser.' ';
			echo $newrate;
		}
		
	}
?>