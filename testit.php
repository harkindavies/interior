<?php 
  require "conn.php";
$message = $remail = $semail = "";
$resultmodal = $fname = $lname = $address = $phone = $site = $type = $images = $amount = $data = "";
  
  function test_inputs($datac) {
    $datac = trim($datac);
    $datac = stripslashes($datac);
    $datac = htmlspecialchars($datac);
    return $datac;
  }

  if (isset($_POST['contact'])) {
    if (empty($_POST["email"])) {
      $emailerr = "Email is required*<br />";
    } else {
      $semail = test_inputs($_POST["email"]);
    }
    if (empty($_POST["message"])) {
      $messageerr = "Enter your message please*<br />";
    } else {
      $message = test_inputs($_POST["message"]);
    }

    $remail = ($_POST['remail']);

    $msgdate = date("Y-m-d");
    $msgread = "no";

    $insertmsg = "INSERT INTO messagetbl(msgdate, sender, receiver, message, msgread) VALUES ('$msgdate','$semail','$remail', '$message','$msgread')";
    $queryinsrt = mysqli_query($conn, $insertmsg);
    if($queryinsrt){
      //echo "inserted";
    }
    else{
      //echo "not inserted";
    }
  }
?>

<?php 
	echo "<script>alert('success');</script>";
	header('location:about.php');
?>