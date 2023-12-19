<?php
require_once '../connection.php'; 
if ($_POST['getCImg']) {
		# code... 

		$getInfo = $_POST['getCImg'];
		//echo "$getInfo";
		 $query = mysqli_query($conn,"select * from tbladdcar where carname ='$getInfo' ");
		$numr = mysqli_num_rows($query); 
		$result = mysqli_fetch_array($query);
		if ($result) {
			$info = $result['carimage']; 
			echo "$info";
		}
		else {
			echo "";
		}

	}


?>