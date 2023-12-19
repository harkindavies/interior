<?php
require "../conn.php";
//session_start();
include "header.php" ;
include "changep.php";
if (!isset($_SESSION['adminemail'])) {
	
	echo '<script> window.location="login.php";</script>';
}
	require "autolog.php";
	$email = $_SESSION['adminemail'];
	$select = "SELECT * FROM adminreg WHERE email = '$email' ";
	$query = mysqli_query($conn, $select);
	$rslt = mysqli_fetch_assoc($query);
	$password = $rslt['password'];
	$picture = $rslt['photo'];
?>
<!DOCTYPE html>
<html>
<title>Welcome To admin</title>
	
	<link rel="stylesheet" type="text/css" href="../admin/admincss.css">
  <link rel="stylesheet" type="text/css" href="../css/order.css">

	<style type="text/css">
	.rows{
		margin: 25px auto;
		background: #eee;
		padding: 0;
		height: 38px;
		width: 296px;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px; 

	}
	.rows .fa{
		padding: 10px;
		border-style: none/*solid*/;
		border-width: 1px;
		border-color: /*#bbb transparent #bbb #bbb*/;
		background: #eef;
		transform: translate(0%, 1%);
		font-size: 15.7px;
	}
	
	.rows .fa{
		padding: 10px;
		border-style: none/*solid*/;
		border-width: 1px;
		border-color: /*#bbb transparent #bbb #bbb*/;
		background: #eef;
		transform: translate(0%, 1%);
		font-size: 15.7px;
	}

	.rows input[type=password]{
		font-size: 17px;
		width: 260px;
		border: none;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px; 
		padding: 7px;
		background: #eee;
	}
	

	.rows input[type=password]:focus{
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px;
		outline: none;
		background: rgb(250, 255, 189);
	}

	.rows input[type=submit]{
		border: 1px solid transparent;
		outline: 1px solid #fff;
		background: mediumseagreen;
		padding: 6px 20px;
		border-radius: 5px;
		color: #fff;
		transition: .5s;
		font-size: 18px;
	}
	.rows input[type=submit]:hover{
		color: mediumseagreen;
		background: transparent;
		border: 1px solid mediumseagreen;
		transition: .5s;
	}

	#changepasswordpg > div > div > form > div.button.rows{
		background: unset;
	}

	.error, .errmsg{
		color: #d50000;
	}
	.logintext{
		font-size: 20px;
	}

	#changepasswordpg{
		position: absolute;
		display: none;
	}

	.formbackground{
		padding: 10px;
	}
	#homepg{color: mediumseagreen;}

</style>
</head>
<body style="background-color: #ddd;">

	<?php
		$successmsg = $passerrmsg = $passworderr =$cpassworderr = "";
		$npassword = $opassword = "";
		$msg = $passmsg = $msgfill = $existmsg = $msgwrong = $imagerror = "";
		 function test_input2($data2) {
		    $data2 = trim($data2);
		    $data2 = stripslashes($data2);
		    $data2 = htmlspecialchars($data2);
		    return $data2;
		  }
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			 if (empty($_POST["opassword"])) {
		    $passworderr = "Old password is required*<br />";
		  } else {
		    $opassword = test_input2($_POST["opassword"]);
		  }
		  if (empty($_POST["npassword"])) {
		    $cpassworderr = "Enter your new password please*<br />";
		    $clearpass = "";
		  } else {
		    $npassword = test_input2($_POST["npassword"]);
		  }

		  if($opassword === $password && $npassword!=""){
		  	$update = "UPDATE adminreg SET password = '$npassword' WHERE email = '$email'";
		  	$updated = mysqli_query($conn, $update);
		  	if($updated){
		  		$_SESSION['adminemail'] = $email;
		  		$imagerror ="<div class='container'><div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                              <div class='resultmodal' id='resultmodal'>
                                <div class='resultmodalcontent'>
                                  Password successfully change
                                    <span><img src='../img/mark.png' height='30px' width='30px' style='margin-left: 10px;'></span>
                                </div></div></div></div></div>";
		  		unset($_SESSION['adminemail']);
		  		echo '<script> setTimeout(function(){
		  				window.location="login.php";
		  		},3300); </script>';
		  	}else{
		  		$passerrmsg = "password changing error";
		  		$imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Password changing error
                              </div></div></div></div></div>";
		  	}
		  }
		  elseif (empty($opassword)) {
		    $cpassworderr = "Enter your old password first*<br />";
		  	$passmsg = "Your old password is required*<br />";
		  	$imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Your old password is required* 
                              </div></div></div></div></div>";
		  }

		  elseif ($opassword !== $password && (!empty($opassword))) {
		  	$passmsg = "Old password not match<br />";
		  	$imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Old password not match
                              </div></div></div></div></div>";
		  }

		  else{
		  	$passmsg = "Retype your Old Password";
		  	$imagerror ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Retype your Old Password and enter a new password
                              </div></div></div></div></div>";
		  }
		}

		?>	
		<script>
		    // Add active class to the current page
		    document.getElementById("changepassword").className = "active";
		</script>
			<div style="text-align: center; padding: 5px 0 0;">
				<p style="font-size: 16px; color:  #ff1a1a;"><?php echo $passerrmsg; echo $msgfill; echo $msgwrong; ?></p>
			</div>
				
		<div class="container">
		<div class="row">
			<div id="changepasswordpg" class="col-md-offset-3 col-md-5 col-md-offset-4 col-sm-offset-1 col-sm-8 col-sm-offset-3 col-xs-12">
				<div class="formbody">
					<p style="color:#00cc66; font-size: 18px; text-align: center;"><?php echo $successmsg; ?></p>
					<div class="formbackground" style="background: rgba(255,255,255,.9); text-align: center;">
						<div class="avatar">
							<img src="<?php echo $picture; ?>" class="img-circle" height="100px" width="100px">
						</div>
						<span class="logintext">Change Password</span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
							
							<div class="rows">
								<span class="fa fa-unlock" for="password"></span><input type="password" name="opassword" placeholder="Enter your old Password" id="password" ><br />
									<span class="error"><?php  echo $passmsg; ?></span>
							</div>

							<div class="rows">
								<span class="fa fa-lock" for="cpassword"></span><input type="password" name="npassword" placeholder="Enter your new password" id="npassword"><br /><span class="error"><?php echo $cpassworderr; ?></span>
							</div>

							<div class="button rows">
								<label></label>
								<input type="submit" class="change" name="submit" value="Submit">
							</div>
							<div class="">
								<label></label>
							<span class="errmsg" id="msg"><?php echo $msg; ?></span>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>

	   <?php include "adminfooter.php" ?>
	</div>
</body>
</html><?php echo $imagerror ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#changepasswordpg").slideUp(0);
		setTimeout(function(){
			$("#changepasswordpg").slideDown(1000);
			$("#changepasswordpg").css('display','block');
		}, 500);

		});

	$("#resultmodal").slideUp(0);
		    $("#resultmodal").slideDown(500);
		   setTimeout(function(){
		      $("#resultmodal").slideUp(500);
		    //$("#mypopmodal").fadeOut(1000);
		   }, 2500);
</script>
