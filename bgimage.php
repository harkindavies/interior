<?php
require "conn.php";
 session_start();
	$pimage = "";
	if ($_REQUEST['mybgimg']) {
		# code...
		$pimage = $_REQUEST['mybgimg'];
		//$upimg = $_REQUEST['myimg'];
		$selectimg = "SELECT projectimage FROM project WHERE projectype = '$pimage' ";
		$checkimg = mysqli_query($conn,$selectimg);
		if ($checkimg) {
			$count = mysqli_num_rows($checkimg);
			if ($count > 4) {
				$countrw = 4;
			}
			else{
				$countrw = $count;
			}
			for ($i=0; $i < $countrw; $i++) { 
				$imgresult = mysqli_fetch_assoc($checkimg);
				$fimage = $imgresult['projectimage'].' ';
				$fimage2 = str_replace("../", "", $fimage);
				echo $fimage2;

			}
			echo $countrw;
		}
		else{}
	}
		
?>