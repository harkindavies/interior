<?php 
  include "../conn.php";
  //session_start();
  include "header.php" ;
  include "changep.php";
  if(!isset($_SESSION["adminemail"])){
    //header("location:login.php?You must login before you can access the page");
  }
$email = $_SESSION["adminemail"];
  $fetchdata = "SELECT * FROM adminreg WHERE email = '$email'";
  $query = mysqli_query($conn,$fetchdata);
  $result = mysqli_fetch_assoc($query);
  $pht = $result['photo'];

  function test_input2($data2) {
    $data2 = trim($data2);
    $data2 = stripslashes($data2);
    $data2 = htmlspecialchars($data2);
    return $data2;
  }
$lname = $lnameerr = $fname = $fnameerr = $imagerror = $notice = $exist = $size = $format = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $fnameerr = "Pls enter your Firstname";
    }
    else{
      $fname = test_input2($_POST["fname"]);
    }
    if (empty($_POST["lname"])) {
      $lnameerr = "Pls enter your Lasttname";
    }
    else{
      $lname = test_input2($_POST["lname"]);
    }
    
    $target_dir = "../passport/";
    $target_fil = $target_dir.basename($_FILES["passport"]["name"]);
    $target_file = str_replace(" ", "", $target_fil);
    //echo $target_file;
    $upload = 1;
    $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["passport"]["tmp_name"]);
    if ($check !==false) {
      //echo "file is an image ". $check["mime"].".";
      $upload = 1;
    }

    else{
      $carimageerror = "file is not an image or too big";
      $upload = 0;
      //echo "<script>alert('file is not an image'); window.location='addcar.php';</script>";
    }
    //if fileexist
    if (file_exists($target_file)) {
      $exist = 1;
      $upload = 0;
    }
     //if file size too large
    if ($_FILES["passport"]["size"]>1500000) {
      $size = 1;
      $upload = 0;
    }
    //allow certain file
    if ($imagefiletype != "jpg" && $imagefiletype != "jpeg" && $imagefiletype != "png" && $imagefiletype != "gif") {
      $format = 1;
      $upload = 0;      
    }
   //check if $upload is set to 0 by an error
    if ($upload == 0) {
        $target_file ="";
        $chooseimage = "";
    }

    if ($fname !== "" && $lname !=="" && $target_file !=="") {    
      $mailvalidate = "SELECT * FROM adminreg WHERE email = '$email'";
      $chkmail = mysqli_query($conn, $mailvalidate);
      
      if(!$chkmail){
      }
      else{                     
          //if $upload is 1
          if ($upload == 1) {
            if (move_uploaded_file($_FILES['passport']['tmp_name'], $target_file)) {

              $insert = "UPDATE adminreg SET firstname ='$fname', lastname = '$lname', photo ='$target_file' WHERE email = '$email' ";
              $check = mysqli_query($conn, $insert);
              if ($check) {
                 $imagerror ="<div class='container'><div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                              <div class='resultmodal' id='resultmodal'>
                                <div class='resultmodalcontent'>
                                  You have successfully update your profile
                                    <span><img src='../img/mark.png' height='30px' width='30px' style='margin-left: 10px;'></span>
                                </div></div></div></div></div>";
              }
              else{
                $imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Error! You have inserted wrong info
                              </div></div></div></div></div>";
              }

            }
            else{
              $imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Sorry, image not uploaded. pls try again
                              </div></div></div></div></div>";
            }
          }
        }     
      }
      elseif($fname !== "" && $lname !=="" && $exist ==1){
         $imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Selected image already exist
                              </div></div></div></div></div>";
      }
      elseif ($fname !== "" && $lname !=="" && $size ==1) {
        $imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>imgae too large, must not above 1.5Mb
                              </div></div></div></div></div>";
      }
      elseif ($fname !== "" && $lname !=="" && $format ==1) {
        $imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>file is not an image, format not supported
                              </div></div></div></div></div>";
      }
      else{
         $imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Fill all the empty boxes
                              </div></div></div></div></div>";
      }
    }

?>
<!DOCTYPE html>
<html>
  <title>AkinDavis interior</title>
  <link rel="stylesheet" type="text/css" href="../css/order.css">
  <style type="text/css">
    #regForm{ width: 35%;
      height: 76.3%;
      margin-bottom: 4%;
      /*background: red;*/  
      position: absolute;
      left: 33%;
      top: ;
    }
    #bodyoverlay{
     width: 100%; 
     margin: 0; 
     height: 100%;
    }
    input[type=text], input[type=file], div.tab p input{
      padding: 5px;
    }

    input[type=text]:focus, input[type=file]:focus{
      background: rgb(250, 255, 189);
      outline: none;
    }
    #homepg{color: mediumseagreen;}

    @media screen and (max-width: 868px){
      #regForm{  width: 90%; left: 5%;}
    }
  </style>

<body>
  <script>
    // Add active class to the current page
    document.getElementById("editprofile1").className = "active";
  </script>
  <div id="regForm">
    <form id="bodyoverlay" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
      <h2 id="h1" style="font-size: 40px;">Edit profile:</h2>
      <div class="imgpreview" id="imgpreview">
        <img class="imagepreview img-circle" id="amntbox" src="<?php echo $pht; ?>" alt="image preview">
      </div>
     
      <!-- One "tab" for each step in the form: -->
      <p id="projecta"></p>
      <div class="tab">Firstname:
        <p><input id="firstname" type="text" placeholder="Firstname..." oninput="this.className = ''" name="fname" value="<?php echo $result["firstname"]; ?>"></p>
        <div>Lastname:
        <p><input id="lastname" type="text" placeholder="Lastname..." oninput="this.className = ''" name="lname" value="<?php echo $result["lastname"]; ?>"></p>
        </div>
        <div>Photo
        <p><input type="file" oninput="this.className = ''" name="passport" required="" accept="image/*"></p>
        </div>
        </div>
      <div style="overflow:auto;">
        <div style="float:right;">
          <button class="cancel" type="button" id="cancelmodal">Cancel</button>
          <button class="btnnxtprv" type="button" id="nextBtnt" onclick="nextPrevnt(1)">Next</button>
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:20px;">
        <span class="step"></span>
      </div>
    </form>
  </div>
</body>
</html><?php echo $imagerror ?>

     <?php include "adminfooter.php" ?>

<script>
  $(document).ready(function(){  
    $("#order").click(function(){
      $("#regForm").css("bottom","-500px");
      $("#regForm").slideUp(0);
      $("#regForm").slideDown(1000)
      $("#regForm").css("bottom","-5px");
      $("#footercontainer").slideUp(1000);
      $("#up-footer").fadeOut(1000);
      $(".copy2").fadeIn(2000);
    });

    $("#cancelmodal").click(function(){
      if (confirm("You are about to cancel this Changes, press Cancel to abort" )){
        location.reload(0);
       $("#regForm").slideUp(1000);
       $("#up-footer").fadeIn(2000);


      }
    });
  });   

var currentTabnt = 0; // Current tab is set to be the first tab (0)
showTabnt(currentTabnt); // Display the crurrent tab

function showTabnt(nt) {
  // This function will display the specified tab of the form...
  var xnt = document.getElementsByClassName("tab");
  xnt[nt].style.display = "block";
  //... and fix the Previous/Next buttons:
  
  if (nt == (xnt.length - 1)) {
    document.getElementById("nextBtnt").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtnt").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(nt)
}

function nextPrevnt(nt) {
  // This function will figure out which tab to display
  var xnt = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (nt == 1 && !validateForm()) return false;
  // Hide the current tab:
  //xnt[currentTabnt].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTabnt = currentTabnt + nt;
  // if you have reached the end of the form...
  if (currentTabnt >= xnt.length) {
    // ... the form gets submitted:
    document.getElementById("bodyoverlay").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTabnt(currentTabnt);
}

function validateForm() {
  // This function deals with validation of the form fields
  var xnt, ynt, int, valid = true;
  xnt = document.getElementsByClassName("tab");
  ynt = xnt[currentTabnt].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (int = 0; int < ynt.length; int++) {
    // If a field is empty...
    if (ynt[int].value == "") {
      // add an "invalid" class to the field:
      ynt[int].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTabnt].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(nt) {
  // This function removes the "active" class of all steps...
  var int, xnt = document.getElementsByClassName("step");
  for (int = 0; int < xnt.length; int++) {
    xnt[int].className = xnt[int].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  xnt[nt].className += " active";
}

$("#resultmodal").slideUp(0);
    $("#resultmodal").slideDown(500);
   setTimeout(function(){
      $("#resultmodal").slideUp(500);
    //$("#mypopmodal").fadeOut(1000);
   }, 3500);

$(document).ready(function(){
  setTimeout(function(){
    $("#order").trigger("click");
  }, 800);
});
</script>