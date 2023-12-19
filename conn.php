<?php
    $user = "root";
    $password = "";
    $server = "localhost";
    $db = "interior";
    global $conn;
 
    $conn = mysqli_connect($server, $user, $password, $db);
    if (!$conn) {
    	# code...
    }
    else{
    	
    }
?>
