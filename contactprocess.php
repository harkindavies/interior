<?php 
  require "conn.php";
  session_start();
$message = $remail = $semail = "";
$resultmodal = $fname = $lname = $address = $phone = $site = $type = $images = $amount = $data = "";
  
  function test_inputs($datac) {
    $datac = trim($datac);
    $datac = stripslashes($datac);
    $datac = htmlspecialchars($datac);
    return $datac;
  }
  $successmsg = "";
  if (isset($_POST['contact'])) {

    if (empty($_POST["senderemail"])) {
      $emailerr = "Email is required*";
    } else {
      $email = test_inputs($_POST["senderemail"]);
      //check mail valid or well formed
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = "invalid email address";
        $email = "";
      }
      echo $email."<br/>";
    }

    if (empty($_POST["message"])) {
      $messageerr = "Enter your message please*<br />";
    } else {
      $message = test_inputs($_POST["message"]);
    }

    $remail = test_inputs($_POST['remail']);
    echo $remail;

    $msgdate = date("Y-m-d");
    $msgread = "no";

    $selectorder = "SELECT * FROM messagetbl where msgdate = '$msgdate' AND sender = '$semail' AND receiver = '$remail' AND message = '$message' " ;
      $selectorderchk = mysqli_query($conn, $selectorder);
      
      if (mysqli_num_rows($selectorderchk)>0) {
         $successmsg = 0;
      }
      else{

      $insertmsg = "INSERT INTO messagetbl(msgdate, sender, receiver, message, msgread) VALUES ('$msgdate','$semail','$remail', '$message','$msgread')";
      $queryinsrt = mysqli_query($conn, $insertmsg);
      if($queryinsrt){
        $successmsg = 1;
      }
      else{
       $successmsg = 2;
      }
    }
   echo "<script>window.location='about.php';</script>";
    
  }
  $_SESSION['successmsg'] = $successmsg;
?>