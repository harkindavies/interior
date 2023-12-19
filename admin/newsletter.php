<?php
require "header.php";
//session_start();
include '../conn.php';
if(!isset($_SESSION['adminemail']))
  {
    echo "<script> alert('login first to have access')</script>";
    header('location:login.php?e=login first to have access to the page');
  }
  require "autolog.php";
  
  //------------select all user details from database------------
  $email = $_SESSION['adminemail'];
 $query = "SELECT * FROM adminreg WHERE email = '$email' ";
 $selected = mysqli_query($conn, $query);
 $rslt = mysqli_fetch_assoc($selected); 
  $firstname = $rslt['firstname'];
  $lastname = $rslt['lastname'];
  $position = $rslt['position'];

  $admininfo = $firstname." ".$lastname." (".$position.")";
   
  if($position == 'CEO & Founder'){
    $remove = 1;
  }
  else{
    $remove = 0;
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $letter = $lettererr = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['letter'])) {
     $lettererr = "Letter is require * ";
     $letter = "";
    }
    else{
      $lettererr ="";
      $letter = test_input($_POST['letter']);
    }
    $msgdate = date("Y-m-d");

    if ($letter =="" || $msgdate =="") {
      ?>
      <div class='container'>
        <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                      <div class='resultmodalcontent resultcontenterror'>Newsletter can't be empty.</div>
                  </div>
              </div>
          </div>
      </div>
    <?php 
    }
    else{
      $selectl = "SELECT * FROM newslettertbl WHERE message = '$letter' AND msgdate = '$msgdate' ";
      $selectq = mysqli_query($conn, $selectl);
      $countslt = mysqli_num_rows($selectq);
      if ($countslt > 0) {
        ?>
      <div class='container'>
        <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                      <div class='resultmodalcontent resultcontenterror'>Newsletter already sent.</div>
                  </div>
              </div>
          </div>
      </div>
    <?php 
      }
      else{
        $insert = "INSERT INTO newslettertbl (message, admininfo, msgdate) VALUES ('$letter','$admininfo','$msgdate') ";
        $inserq = mysqli_query($conn,$insert);
        if ($inserq) {
          ?>
          <div class='container'>
              <div class='row'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                        <div class='resultmodal' id='resultmodal'>
                            <div class='resultmodalcontent'>Letter successfully sent.</div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
              setTimeout(function(){
                window.location="viewletters.php";
              },3500)
            </script>
          <?php
        }
        else{
        ?>
          <div class='container'>
            <div class='row'>
                  <div class='col-md-12 col-sm-12 col-xs-12'>
                      <div class='resultmodal resulterror' id='resultmodal'>
                          <div class='resultmodalcontent resultcontenterror'>Error in sending newsletter.</div>
                      </div>
                  </div>
              </div>
          </div>
        <?php       
        }
      }
    }
  }
 ?>    
<!DOCTYPE html>
<html>
<title>Welcome To admin</title>
<head>
  <link rel="stylesheet" type="text/css" href=" msg.css">
</head>
<script>
      // Add active class to the current page
      document.getElementById("newsletter").className = "active";
    </script>

  
        <?php

    $statement = mysqli_query($conn,"select * from subscribetbl order by sn asc");
    $count = mysqli_num_rows($statement);
        if($count == 0)
        {
          //echo "No newsletter subscribtion";
        }
        else
        { 
          
          $result=mysqli_fetch_assoc($statement);
            $submail = $result['email'];
            $subdate = $result['subdate'];
            $sn = $result['sn'];
      }
    ?>
<body>
<div class="container">

      <a href="viewletters.php"><button id="viewletters">View Letters</button></a>

<div class="letter">
    <h2 id="subcount">We currently have <?php echo $count; ?> subscribers</h2>
    <form id="bodyoverlay" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
      <textarea id="letter" class="letter2" name="letter" placeholder="Send newsletter to the subscriber"></textarea>
    </div>
      <span style="color: red; font-size: 18px;"><?php echo $lettererr; ?></span>

      <div class="rowss">
        <label></label>
        <button type="submit" id="mysubmit" class="login " name="submit"><span id="loading" class="fa fa-circle-o-notch fa-spin"></span> Submit</button>
        <span class="errmsg"><?php ?></span>
      </div>
    </form> 
  </div>
</div>

  <?php include "adminfooter.php"; ?>
</body>
<style type="text/css">
body{
  background-image: url("../img/Double-lighting-drop-and-recess-rectangle.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position:center;
  min-height: 100%;
}
 
</style>

<script type="text/javascript">

   $(document).ready(function(){
      $('#mysubmit').click(function(){
          $('#loading').css('display','inline-block');
      });
    })

  $("#resultmodal").slideUp(0);
  $("#resultmodal").slideDown(500);
  setTimeout(function(){
    $("#resultmodal").slideUp(500);
  }, 2500);

</script>
</body>
</html>