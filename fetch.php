<?php
session_start();

  $a = $_SESSION['my_selected_img'];
  error_reporting(E_ALL & ~ E_NOTICE);
if ($_POST['fetch'] == "action") {
	# code...
	if ($a) {
		# code...
		echo $a;
	}
}
?>