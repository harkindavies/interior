<?php
require_once '../connection.php'; 
	if ($_POST['getCInfo']) {
		# code... 

		$getInfo = $_POST['getCInfo'];
		$query = mysqli_query($conn,"select * from tbladdcar where carname ='$getInfo' ");
		$numr = mysqli_num_rows($query); 
		$result = mysqli_fetch_array($query);
		if ($result) {
			$info =$result['hireprice']
			//'<div>'.$result['hireprice'].'</div>'
			; 
			echo "$info";
		}
		else {
			echo "";
		}

	}

?>