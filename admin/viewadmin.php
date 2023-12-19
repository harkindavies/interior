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
  if (isset($_SESSION['deleteadmin'])) {
    $deleteadmin = $_SESSION['deleteadmin'];
    if ($deleteadmin == 1) {
      ?>
        <div class='container'>
          <div class='row'>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                    <div class='resultmodal' id='resultmodal'>
                        <div class='resultmodalcontent'>Admin successfully deleted.</div>
                    </div>
                </div>
            </div>
        </div>
      <?php
    }
    elseif($deleteadmin == 2){
      ?>

      <div class='container'>
        <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                      <div class='resultmodalcontent resultcontenterror'>Error in deleting admin.</div>
                  </div>
              </div>
          </div>
      </div>
      <?php                
    }
    else{ }
  }
unset($_SESSION['deleteadmin']);
  //------------select all user details from database------------
  $email = $_SESSION['adminemail'];
 $query = "SELECT * FROM adminreg WHERE email = '$email' ";
 $selected = mysqli_query($conn, $query);
 $rslt = mysqli_fetch_assoc($selected); 

  $position = $rslt['position'];
   
  if($position == 'CEO & Founder'){
    $remove = 1;
  }
  else{
    $remove = 0;
  }
 ?>    
<!DOCTYPE html>
<html>
<title>Welcome To admin</title>
<head>
  <link rel="stylesheet" type="text/css" href="msg.css">
</head>
<script>
      // Add active class to the current page
      document.getElementById("viewadmin").className = "active";
    </script>
<div class="container">

    <h2 id="subcount">All Newsletter</h2>
  <div class='table-responsive' style="max-width: 100%; margin: 3% auto;">
    <table class='table table-striped table-bordered'>
   <tr>
      <th>S/N</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Position</th>
      <?php
      if ($remove == 1) {
      ?>
        <th style="text-align: center;">Action</th>
      <?php
      }
      else{

      }
      ?>
    </tr>

    <tr>
        <?php

    $statement = mysqli_query($conn,"select * from adminreg where position != 'CEO & Founder' order by sn asc");
    $count = mysqli_num_rows($statement);
        if($count == 0)
        {
          echo "No admin found in the database";
        }
        else
        { 
          for ($i=1; $i<= $count; $i++) 
          { 
            $result=mysqli_fetch_assoc($statement);
?>
            <td><?php echo $i; ?></td>
            <td><?php echo $result['firstname']; ?></td>
            <td><?php echo $result['lastname']; ?></td>
            <td><?php echo $result['position']; ?></td>
            

           <?php 
              if ($remove == 1) {
                ?>
                <td style="text-align: center;">
                      <a title="click to delete" href="deleteadmin.php?sn=<?php echo $result ['sn'];?>" onclick="return confirm ('Are you sure you want to remove <?php echo $result ['firstname']. " ".$result['lastname'];?> from admin?')" ><button id="delete" class="btn btn-danger fa fa-trash"> Remove Admin </button></a>
                    </td>
                  <?php
              }
              else{
              }
           ?>
        </tr>
    <?php
        }
      }
    ?>
    </table>
  </div>
</div>
  <?php include "adminfooter.php"; ?>

<style type="text/css">
  #subcount{font-family: Helvital; text-align: center; margin-top: 7%;}
  }
</style>

<script type="text/javascript">
  $("#resultmodal").slideUp(0);
  $("#resultmodal").slideDown(500);
  setTimeout(function(){
    $("#resultmodal").slideUp(500);
  }, 2500);

</script>
</body>
</html>