<?php
//session_start();
include '../conn.php';
include "header.php";
$errormsg = $successmsg = $notsend = $msg = $messageerr = $ticketerr = $carerr = $noticket = "";
if(!isset($_SESSION['adminemail'])) {

  $message = "*You must login before you can reply this order*";
  ?>
  <div style=" margin-top: 20px; display: flex; justify-content: center; align-items: center;">
  <p style="font-size: 20px; color: red;"><?php echo $message; ?></p>
  </div>
  <?php
  header('refresh:0.4, url=login.php?e=login first to have access to edit ticket');
}

else{
  if(isset($_SESSION['serialno'])){
  $sn = $_SESSION['serialno'];
}
else{
  ?>
    <script>
      window.location="order.php";
    </script>
  <?php
}
  require "autolog.php";
  //------------select all user details from database------------
  $sender = $_SESSION['adminemail'];
  //$get_id = $_GET['sn'];

  $query = "SELECT * FROM ordertbl WHERE sn = '$sn'";
  $selected = mysqli_query($conn, $query);
  $rslt = mysqli_fetch_assoc($selected);
  $firstname = $rslt['firstname'];
  $lastname = $rslt['lastname'];
  $receiver = $rslt['email'];

  $date = date('Y-m-d');

$messageerr = $ticketerr = $carerr = "";
  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(empty($_POST['message'])){
      $messageerr = "Enter your message Here";
    }
    else{
      $msg = test_input($_POST['message']);
    }
    
      $check = "SELECT * FROM responsetbl WHERE rdate = '$date' AND sender = '$sender' AND receiver ='$receiver' AND message = '$msg' ";
      $checkquery = mysqli_query($conn, $check);
      $countrow = mysqli_num_rows($checkquery);
      if ($countrow > 0) {
        ?>
                <div class='container'>
                  <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                              <div class='resultmodal resulterror' id='resultmodal'>
                                  <div class='resultmodalcontent resultcontenterror'>Error Occur while sending this Message</div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <script type="text/javascript">
                  $("#resultmodal").slideUp(0);
                  $("#resultmodal").slideDown(500);
                  setTimeout(function(){
                    $("#resultmodal").slideUp(500);
                  //$("#mypopmodal").fadeOut(1000);
                  }, 2500);
                  
                  </script>
                  
                <?php
      }
      else{

          $insert = "INSERT INTO responsetbl (rdate, sender, receiver, message) VALUES ('$date', '$sender', '$receiver', '$msg')";
          $query = mysqli_query($conn, $insert);

          if ($query) {
            $yes = "yes";
            $insertres = "UPDATE ordertbl SET respond ='$yes' WHERE sn = '$sn'";
            $queryres = mysqli_query($conn, $insertres);
            if($queryres){
              unset($_SESSION['serialno']);
              $_SESSION['success'] = "success";
                echo '<script>
                    window.location="order.php";
                </script>';
              //$successmsg = " Message successfully send ";
              
            }
            else{
              
            }
            
          }
          else{
            $notsend = " Message not send ";
          }
       
      }
  }
  else{
   //unset($_SESSION['serialno']);
  }
  ?>

  <!DOCTYPE html>
  <head>

  <title>Reply Order</title>
 
    <style type="text/css">

      body {
        background-image: url(../img/walltv2.jpg);
       background-repeat: repeat;
        background-position:center;
        background-size: cover;
      }

       .resultmodal{
    display: none;
    width: 60%;
    height: ;
    background: rgba(0,200,100,0.7);
    position: fixed;
    margin: 0 auto;
    left: 20%;
    top: 0%;
    z-index: 999;
    border: 1px solid mediumseagreen;
    border-radius: 0  0 5px 5px;
  }
  .resultmodalcontent{
    color: #fff;
    font-size: 23px;
    text-align: center;
    padding: 10px;
    font-family: Helvital;
    word-spacing: 3px;
  }

  .resulterror{
    border: 1px solid #d50000;
    background: rgba(255,0,0,0.6);

  }

  .resultcontenterror{
    color: #fff; 
  }

      #return a{
        margin: 70px 0 0 30px;
        background: mediumseagreen;
        padding: 5px 20px;
        font-size: 25px;
        color: #fff;
        border: 1px solid #fff;
        border-radius: 5px;
        text-decoration: none;
      }
      div#return a:hover{
        background: rgba(0,0,0,0.3);
        color: mediumseagreen;
        border: 1px solid mediumseagreen;

      }
      form{
        text-align: center;
        background: rgba();
        margin:1% auto;
      }

      .helpform{width: 50%; margin: 0 auto;}
      
      .helpform p{
        color: #fff;
        font-size: 3em;
        font-weight: bold;
      }
      .helpform input{
        background-color: rgba(255,255,255,.4);
        padding: 5px;
        font-size: 17px;
        color: #fff;
        border: 1px solid #fff;
        text-overflow: ellipsis;
        width: 50%;
      }
      .helpform input:focus, textarea:focus{
        background: rgb(250,255,189);
      }
      textarea{
        background-color: rgba(255,255,255,.4);
        padding: 5px;
        width: 50%;       
      }
      input[type=submit]{
        font-size: 20px;
        width: 150px;
        background-color: mediumseagreen;
        color: #fff;
         border: 1px solid #fff;
         transition: .5s;
      }
      input[type=submit]:focus, input[type=submit]:hover{
        color: mediumseagreen;
        background-color: transparent;
        border-color: mediumseagreen;
        transition: 1s;
        outline: none;
      }
      .error, .error1, .error2{color: red;
        font-size: 17px;
        padding-top: 5px;
      } 
      .error1{margin-left: 0; }
      .error2{margin-left: 0;}
        .inptext{
          color: #fff;
        }
      @media screen and (max-width: 768px){
        .helpform input,textarea,.helpform{
          width: 80%;
        }

      }
  </style>
  </head>
  <body id="fbody">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div id="return"><a href="order.php" class="fa fa-long-arrow-left"></a></div>
          
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12  col-sm-12 col-xs-12">
          <form id="formimage" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="helpform">
              <p>Response Desk</p>
              <label style="color: limegreen; font-size: 20px;"><?php echo $successmsg; ?></label>
              <label  style="color: red; font-size: 20px;"><?php echo $notsend; ?></label><br />
              <div>
                <input type="text" name="firstname" value="<?php echo $firstname; ?>" disabled><br /><span class="inptext">Receiver</span></div>
              <div>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>" disabled><br /><span class="inptext">Sender</span></div>
              <div>
              <input type="text" name="receiver" value = "<?php echo $receiver; ?>" disabled><br /><span class="inptext">Receiver</span></div>
              <div><input type="text" name="sender" value = "<?php echo $sender; ?>" disabled><br /><span class="inptext">Sender</span></div>

              <label class="error1"><?php echo $carerr; ?> </label> <label class="error2"><?php echo $ticketerr; ?></label><br />
              <textarea rows="5" placeholder="Message" name="message" required><?php echo $msg; ?></textarea><br />
              <label class="error"><?php echo $messageerr; ?></label><br />
              <input type="submit" name="send" value="Send"><br>
              <label class="error"><?php echo $noticket; ?></label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
   include 'adminfooter.php';
}
?>
</body>
</html>

<!--=============================================================!-->
<style type="text/css">
  @media screen and(max-width: 992px){
    form{
      width: 80%;
    }
  }
</style>
<!-- js for form background -->
<script type="text/javascript">
    var img = ["../img/wall-tv-hanger.png", "../img/walltv4.jpg", "../img/interior-design-ideas-tv-unit.jpg", "../img/walltv1.jpg","../img/tv-latest-anger.png"];
    var imagehead = document.getElementById('fbody');
    var i = 0;
    setInterval(function() {
     
      imagehead.style.transition = "1s ease";
      imagehead.style.backgroundImage = "url(" + img[i] + ")";
      i = i + 1;
      if (i == img.length){
        i = 0;
      }         
    }, 15000);
  </script>