<?php
require "../conn.php";
include "header.php";
//session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php?e=login to perform this action";</script>';
}
$email = $_SESSION['adminemail'];
 $query = "SELECT * FROM adminreg WHERE email = '$email' ";
 $selected = mysqli_query($conn, $query);
 $rslt = mysqli_fetch_assoc($selected); 

  $position = $rslt['position'];
            
              if($position !== 'CEO & Founder'){
              	echo '<script> alert("Only the C.E.O can perform this action");</script>';
	            echo '<script> window.location="index.php?e=Only the CEO can perform this action";</script>';
                
              }
              else{
                
              }
                
//require "autolog.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="AkinDavis Admin">
    <meta name="author" content="Akinpade David">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Welcome To admin</title>
	<script type="text/javascript" src="../bootstrap/js/jQuery.js"></script>
	<style type="text/css">
#addprojectbody{
	background-image: url("../img/Double-lighting-drop-and-recess-rectangle.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		background-position:center;
		min-height: 100%;
}

	/*pop-up styling */
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

.formbody{
	margin: 3.2% auto;
}
.formbackground{
	margin: 0 auto;
}


#formid{
	margin-bottom: 15%;
}
	.rows{
		margin: 3px auto;
		background: #eee;
		padding: 0;
		height: 38px;
		width: 297px;
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

	.rows .fa-photo{
		font-size: 12px;
		padding: 10px;
	}

	#eye{
		padding: unset;
		border: unset;
		border-left: 1px solid #bbb;
		border-radius: 0 7px 7px 0;
		padding: 11px;
		position: absolute;
		margin:0 0 0 -37px;
		transform: translate(0%, 02%);
	}

	.rows input[type=password], .rows input[type=text], .rows input[type=email], .rows  input[type=file], .rows select{
		font-size: 17px;
		width: 260px;
		border: none;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px; 
		padding: 7px;
		border:none /*1px solid #bbb*/;
		background: #eee;
	}

	.rows select{
		margin-left: -3px;
		padding: 8px;
	}

	.rows#picture{
		display: flex;
		align-content: center;
		justify-content: center;
	}

	.rows input[type=file]:focus, .rows input[type=password]:focus, .rows input[type=text]:focus, .rows input[type=email]:focus, .rows select:focus{
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px;
		outline: none;
		background: rgb(250, 255, 189);
	}

	.rowss #mysubmit{
		border: 1px solid transparent;
		background: mediumseagreen;
		padding: 8px 50px;
		border-radius: 5px;
		color: #fff;
		font-size: 17px;
		transition: .5s;
		margin-right: 65px;
	}

	.rowss #mysubmit:hover{
		background: transparent;
		border: 1px solid mediumseagreen;
		color: mediumseagreen;
		transition: .5s;
	}
	.rowss #mysubmit:focus{
		border: 1px solid mediumseagreen; 
		outline: none; color: mediumseagreen; 
		background: transparent;
	}
	#loading{ display: none; }

	.logintext{font-size: 20px;}

	.error, .errmsg{color: #d50000;margin-left: -50px;}

	@media screen and (max-width: 359px){
		.rows input[type=password], .rows input[type=text], .rows input[type=email], .rows  input[type=file], .rows select{
			font-size: 17px;
			width: 200px;
		}
	}
	@media screen and (max-width: 768px){
		.rows{
			margin: 3px auto;
		}
	}
</style>
</head>
<body id="addprojectbody">
<?php
	$firstnameerr = $lastnameerr = $passworderr = $cpassworderr = $emailerr = "";
	$firstname = $lastname = $password = $cpassword = $email = "";
	$msg = $passmsg = $msgfill = $existmsg = $msgwrong = $exceedmsg = $passerr = $existmail = $position = $adminimageerror = $positionerr = $existposition = $phone = $phoneerr = $existphone = ""; 
	$position = "Select Your Position";
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$passmsg = "Password not match";
	  if (empty($_POST["firstname"])) {
	    $firstnameerr = "firstname is required*";
	  } else {
	    $firstnam = test_input($_POST["firstname"]);
	    $firstname = str_replace(" ", "", $firstnam);
	    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
		  	$nameErr = "Only letters and white space are allow"; 
			}
	  }
	  if (empty($_POST["lastname"])) {
	    $lastnameerr = "lastname is required*";
	  } else {
	    $lastnam = test_input($_POST["lastname"]);
	    $lastname = str_replace(" ", "", $lastnam);
	    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
		  	$nameErr = "Only letters and white space are allow"; 
			}
	  }
	  if (empty($_POST["password"])) {
	    $passworderr = "Password is required*";
	  } else {
	    $password =$_POST["password"];
	  }
	  if (empty($_POST["cpassword"])) {
	    $cpassworderr = "Confirm your password again*";
	    $clearpass = "";
	  } else {
	    $cpassword = $_POST["cpassword"];
	  }
	  if (empty($_POST["position"])) {
	    $positionerr = "Select your position";
	    ?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>Select your position.</div>
				            </div>
				        </div>
				    </div>
				</div>
  			<?php
	    $position = "";
	  } else {
	    $position = $_POST["position"];
	  }
	  if (empty($_POST["phone"])) {
	    $phoneerr = "Phone number is required*";
	  } else {
	    $phone = $_POST["phone"];
	    $ppattern = '/^\(?([+234]{4})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
		if (!preg_match($pattern, $phone)) {
	    	$phone = "";
		}
		else{} 
	  }
	  if (empty($_POST["email"])) {
	    $emailerr = "Email is required*";
	  } else {
	    $email = test_input($_POST["email"]);
	    //check mail valid or well formed
	    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    	$emailerr = "invalid email address";
	    	$email = "";
	    }
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
			$adminimageerror = "file is not an image or too big.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>File is not an image or too big.</div>
				            </div>
				        </div>
				    </div>
				</div>
  			<?php
			$upload = 0;
			//echo "<script>alert('file is not an image'); window.location='addcar.php';</script>";
		}
		//if fileexist
		if (file_exists($target_file)) {
			$adminimageerror = "file already exist.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>File already exist.</div>
				            </div>
				        </div>
				    </div>
				</div>
  			<?php
			$upload = 0;
		 }
		 //if file size too large
		if ($_FILES["passport"]["size"]>3500000) {
			# code...
			$adminimageerror = "Image too large, must not above 3.5Mb.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>Image too large, must not above 3.5mb.</div>
				            </div>
				        </div>
				    </div>
				</div>
  			<?php
			$upload = 0;
		}
	  //allow certain file
		if ($imagefiletype != "jpg" && $imagefiletype != "jpeg" && $imagefiletype != "png" && $imagefiletype != "gif") {
			# code...
			$adminimageerror = "file is not an image, format not supported.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>File is not an image, format not supported.</div>
				            </div>
				        </div>
				    </div>
				</div>
  			<?php
			$upload = 0;
			  	
	 	}
	 //check if $upload is set to 0 by an error
	  	if ($upload == 0) {
			$passmsg = "Reconfirm your password.";
	  		$target_file ="";
	  		$chooseimage = "";
	  		//$position = "";
				//$passporterr = "sorry, your file was not uploaded";
	  	}

		    if ($firstname !== "" && $lastname !=="" && $password !=="" && $email !=="" && $position !=="" && $target_file !=="" && $phone !=="") {
		  	
			  	if ($password === $cpassword) {
			  		$passmsg = "";

			  		$positionvalidate = "SELECT * FROM adminreg WHERE position = '$position' ";
			  		$chkposition = mysqli_query($conn, $positionvalidate);
			  		if (mysqli_num_rows($chkposition)>0) {
			  			$positionerr = "position already exist. <br />";
						$passmsg = "Reconfirm your password.";
						$adminimageerror = "Select the image again.";
						?>

							<div class='container'>
								<div class='row'>
							        <div class='col-md-12 col-sm-12 col-xs-12'>
							            <div class='resultmodal resulterror' id='resultmodal'>
							                <div class='resultmodalcontent resultcontenterror'>Position already exist.</div>
							            </div>
							        </div>
							    </div>
							</div>
			  			<?php

			  		}
			  		else{

			  			$mailvalidate = "SELECT * FROM adminreg WHERE email = '$email'";
				  		$chkmail = mysqli_query($conn, $mailvalidate);
				  		if (mysqli_num_rows($chkmail)>0) {
				  			$existmail = "email already exist. <br />";
							$passmsg = "Reconfirm your password.";
							$adminimageerror = "Select the image again.";

							?>

								<div class='container'>
									<div class='row'>
								        <div class='col-md-12 col-sm-12 col-xs-12'>
								            <div class='resultmodal resulterror' id='resultmodal'>
								                <div class='resultmodalcontent resultcontenterror'>Email already exist.</div>
								            </div>
								        </div>
								    </div>
								</div>
				  			<?php 			
				  		}
				  		else{
				  			$phonevalidate = "SELECT * FROM adminreg WHERE phone ='$phone' ";
			  				$chkphone = mysqli_query($conn, $phonevalidate);
					  		if (mysqli_num_rows($chkphone)>0) {
					  			$existphone = "phone number already exist. <br />";
								$passmsg = "Reconfirm your password";
								$adminimageerror = "Select the image again.";
								?>

								<div class='container'>
									<div class='row'>
								        <div class='col-md-12 col-sm-12 col-xs-12'>
								            <div class='resultmodal resulterror' id='resultmodal'>
								                <div class='resultmodalcontent resultcontenterror'>Phone number already exist.</div>
								            </div>
								        </div>
								    </div>
								</div>
				  			<?php  			
					  		}
					  		else{
					  			//echo $lastname;
					  			$valid = mysqli_query($conn,"select * from adminreg");
				   				$count = mysqli_num_rows($valid);
					 			if($count == 0){
				 				}
					  			else{
					  				$admin = 0;
						  			for ($i=1; $i <=$count ; $i++) { 
						  				$admin = $i;
						  			}
						  			
						  			if ($admin > 3) {
						  				$exceedmsg = "Admin already reach, admin cannot exceed four in number.";
						  				?>

											<div class='container'>
												<div class='row'>
											        <div class='col-md-12 col-sm-12 col-xs-12'>
											            <div class='resultmodal resulterror' id='resultmodal'>
											                <div class='resultmodalcontent resultcontenterror'>Admin already reach, admin cannot exceed four in number.</div>
											            </div>
											        </div>
											    </div>
											</div>
							  			<?php
						  			}
						  			else{
						  			    //password hashing
                                        $timeTarget = 0.50;
                                        
                                        $cost = 8;
                                        do{
                                        	$cost++;
                                        	$start = microtime(true);
                                        	$hashpassword = password_hash($password, PASSWORD_BCRYPT, ["cost"=>$cost]);
                                        	$end = microtime(true);
                                        }
                                        while (($end - $start) < $timeTarget);
                                        
									   $insert = "INSERT INTO adminreg(firstname, lastname, email, password, position, photo) VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$hashpassword."','".$position."','".$target_file."')";
									    $check = mysqli_query($conn, $insert);
									    if ($check) {
									    	//echo $target_file;

									  	    //if $upload is 1
											  if ($upload == 1) {

											  	if (move_uploaded_file($_FILES['passport']['tmp_name'], $target_file)) {	
											  	}
											  	else{
											  	 $existmsg = "sorry, image not uploaded.";
											  	 ?>

													<div class='container'>
														<div class='row'>
													        <div class='col-md-12 col-sm-12 col-xs-12'>
													            <div class='resultmodal resulterror' id='resultmodal'>
													                <div class='resultmodalcontent resultcontenterror'>Sorry, image not uploaded.</div>
													            </div>
													        </div>
													    </div>
													</div>
									  			<?php
											  	}
											  }
											  ?>

												<div class='container'>
													<div class='row'>
												        <div class='col-md-12 col-sm-12 col-xs-12'>
												            <div class='resultmodal' id='resultmodal'>
												                <div class='resultmodalcontent'>You have successfully register a new admin.</div>
												            </div>
												        </div>
												    </div>
												</div>
								  		
											    <script>
											    setTimeout(function(){
									  	    		window.location='viewadmin.php'
											    },3100)
									  	    	</script>
									  	   <?php
									    }
									    else{
									     	$msgwrong = "error, you have inserted wrong info <br />";
									    }
									}
								}
							}	
						}

			  		}
			  		
				}
				else{
					$passmsg;
					?>

						<div class='container'>
							<div class='row'>
						        <div class='col-md-12 col-sm-12 col-xs-12'>
						            <div class='resultmodal resulterror' id='resultmodal'>
						                <div class='resultmodalcontent resultcontenterror'>Password not match.</div>
						            </div>
						        </div>
						    </div>
						</div>
		  			<?php
				}
			
			}
			else{
				//$msgfill = "fill all the empty box <br />";
			}
		}
?>
<script>
	    // Add active class to the current page
	    document.getElementById("addadmin").className = "active";
</script>

<div  id="addproject2body">
	<div class="container">
		<div class="row" style="margin-bottom: 7%;">
			<div class="">
				<div class="formbody">
					<div class="formbackground" style="background:; text-align: center;">
						<div style="text-align: center; padding: 5px 0 0;">
							<p style="font-size: 20px; color:  #ff1a1a;"><?php echo $msgfill; echo $msgwrong; ?></p>
							<span class="errmsg"><?php echo $exceedmsg; ?></span>
							<span class="errmsg"><?php echo $msg; ?></span>
						</div>
						<div class="avatar">			
							<img id="thumbnil" src="../img/avatar.png" class="img-circle" height="100px" width="100px" alt="image">
						</div>
						<span class="logintext">Admin Registration Form</span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype ="multipart/form-data" id="formid">
							<div class="col-md-2 col-lg-2"></div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="rows">
									<span class="fa fa-user" for="firstname"></span><input onkeyup="firstinput(this)" onblur="firstblur(this)" id="adminfirstname" type="text" name="firstname" placeholder="Enter your Firstname" value="<?php echo $firstname; ?>"><br />
								</div>
								<span id="fnameerror" class="error"><?php echo $firstnameerr; ?></span>

								<div class="rows">
									<span class="fa fa-user" for="lastname"></span><input onkeyup="lastinput(this)" onblur="lastblur(this)" id="adminlastname" type="text" name="lastname" placeholder="Enter your Lastname" value="<?php echo $lastname; ?>"><br />
								</div>
								<span id="lnameerror" class="error"><?php echo $lastnameerr; ?></span>

								<div class="rows">
									<span class="fa fa-user" for="email"></span><input type="email" onkeyup="adminemail(this)" onblur="adminmblur(this)" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" id="email" autocomplete><br />
								</div>
								<span id="emailerror" class="error"><?php echo $emailerr;  echo $existmail; ?></span>

								<div class="rows">
									<span class="fa fa-phone" for="phone"></span><input type="text" name="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>" id="phone" onkeyup="adminphone(this)" onblur="adminpblur(this)"><br />
								</div>
								<span id="phoneerror" class="error"><?php echo $phoneerr;  echo $existphone; ?></span>
							</div>					

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="rows">
									<span class="fa fa-lock" for="password"></span><input oninput="changpass()" onblur="chkpassword()" type="password" name="password" placeholder="Enter your Password" value="<?php echo $password; ?>" id="password" autocomplete="off"><i id="eye" class="fa fa-eye-slash"></i><br />
								</div>
								<span id="passworderror" class="error"><?php echo $passworderr; ?></span>

								<div class="rows">
									<span class="fa fa-lock" for="password"></span><input type="password" name="cpassword" oninput="cpass()" id="cpassword" placeholder="Retype your Password" value="<?php $clearpass; ?>" autocomplete="off"><br />
								</div>
								<span id="cpassworderror" class="error"><?php echo $passmsg; ?></span>

								<div class="rows">
									<span class="fa fa-user-secret" for="position" style="transform: translate(3.5%, 0%);"></span>
									<select name="position" oninput="inputdata(this)" value="<?php $position; ?>">
										<option value=""><?php echo $position; ?></option>
										<option disabled="">CEO & Founder</option>
										<option>Master & Instructor</option>
										<option>Supervisor & Director</option>
										<option>Designs Officer </option>
									</select>  <br />
								</div>
								<span id="positionerror" class="error"><?php echo $positionerr;?></span>

								<div class="rows"  id="picture">
									<span class="fa fa-photo" for="photo"></span><input type="file" accept="image/*" placeholder="Select your picture" value="<?php $chooseimage; ?>" name="passport" onchange="showMyImage(this)" id="inputphoto" required />
								</div>
								<span id="photoerror" class="error"><?php echo $adminimageerror; ?></span>
							</div>

							<div class="col-md-2 col-lg-2"></div>

							<div class="col-lg-12 col-md-12 col-sm-12 rowss">
								<label></label>
								<button type="submit" id="mysubmit" class="login " name="submit"><span id="loading" class="fa fa-circle-o-notch fa-spin"></span> Submit</button>
								<span class="errmsg"><?php echo $msg; ?></span>
							
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

</body>

	<?php include "adminfooter.php"; ?>
</div>
<script type="text/javascript">
	function inputdata(inputdt){
		//var inputdata = $(inputdt).parent("div");
		//var inputchld = inputdata.children("span")[1];
		//var inputchild = $(inputchld).attr("id");
		//document.getElementById(inputchild).innerHTML = "";
	}

	function showMyImage(fileInput) {
		document.getElementById("photoerror").innerHTML = "";

        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }

    $("#eye").click(function(){
    	var typechk = document.getElementById("password").type;
    	if (typechk == "password") {
   	 		document.getElementById("eye").className = "fa fa-eye";
    		document.getElementById("password").type = "text";
    	}
    	else{
   	 		document.getElementById("eye").className = "fa fa-eye-slash";
    		document.getElementById("password").type = "password";
    		
    	}
    });

    $(document).ready(function(){
    	$('#mysubmit').click(function(){
    		var imgval = document.getElementById('inputphoto').value;
    		if(imgval == ""){}
    		else{
  				$('#loading').css('display','inline-block');
  			}
  		});
    })

	$("#resultmodal").slideUp(0);
	$("#resultmodal").slideDown(500);
	setTimeout(function(){
	  $("#resultmodal").slideUp(500);
	}, 2500);



	/*for inputing */
	function changpass(){
		var rlt1; var rlt2; var rlt3;
		var c = document.getElementById('password');
		var chpass = document.getElementById('password').value;
		var patt2 = /[a-z]/ig;
    	var result2 = chpass.match(patt2);
   		var patt1 = /[ !~`@#$%^&()=*_+-;:.,<>'"{}\|/?0-9]/g;
    	var result1 = chpass.match(patt1);
   
    	if (result1 < 1) {
    		rlt1 = 0;
    	} else{
    		var rlt1 = result1.length * 3;
    	}

    	if (result2 < 1) {
    		rlt2 = 0;
    	} else{
    		var rlt2 = result2.length * 1;
    	}
    
    	var total = rlt1 + rlt2;
    	
		if (total == 0) {
			var msgchk1 = document.getElementById('passworderror').innerHTML ="";
		}

		else if (total < 18){
			c.style.color = "red";
			var msgchk1 = document.getElementById('passworderror').innerHTML ="password is weak";
		}
		else if (total >= 18 && total < 25) {
			c.style.color = "rgb(255, 79, 0)";
			var msgchk1 = document.getElementById('passworderror').innerHTML = "password is fair";
		}
		else if (total >= 25 && total < 35) {
			c.style.color = "orange";
			var msgchk1 = document.getElementById('passworderror').innerHTML = "Enter some numbers to make it stronger";
		}
		else if (total >= 35 && total < 60) {
			var msgchk1 = document.getElementById('passworderror').innerHTML = "";
			c.style.color = "limegreen";
		}
		
		else{
			c.style.color = "mediumseagreen";
			var msgchk1 = document.getElementById('passworderror').innerHTML = "";

		}
		//if(cpa.length > 6 && cpa !== chpass){
			//cpp.style.color = "rgb(255, 79, 0)";
		//}else{
			//cpp.style.color ="red"
		//}
		//if(chpass === cpa){
			//cpp.style.color = "green";
		//}
		var confirmpass = document.getElementById("cpassword");
		var confrimp = document.getElementById("cpassword").value;
		if (confrimp !="" && confrimp !== chpass) {
			confirmpass.style.color = "orange";
		}
		else if (confrimp != "" && confrimp === chpass){
			confirmpass.style.color = "mediumseagreen";
		}
	}

	function chkpassword(){
		 var clearrlt = "";
		 var rlt1; var rlt2; var rlt3;
		var c = document.getElementById('password');
		var chpass = document.getElementById('password').value;
		var patt2 = /[a-z]/ig;
    	var result2 = chpass.match(patt2);
   		var patt1 = /[ !~`@#$%^&()=*_+-;:.,<>'"|\{}/?0-9]/g;
    	var result1 = chpass.match(patt1);
   
    	if (result1 < 1) {
    		rlt1 = 0;
    	} else{
    		var rlt1 = result1.length * 3;
    	}

    	if (result2 < 1) {
    		rlt2 = 0;
    	} else{
    		var rlt2 = result2.length * 1;
    	}
    	
    	var total = rlt1 + rlt2;

		if (total < 35) {
			var msgchk1 = document.getElementById('passworderror').innerHTML ="Please enter a stronger password";
			document.getElementById('password').value = clearrlt;
		} 
		else if (total >= 35 && total < 60) {
			var msgchk1 = document.getElementById('passworderror').innerHTML = "";
			c.style.color = "limegreen";
		}else{
			c.style.color = "mrduimseagreen";
			var msgchk1 = document.getElementById('passworderror').innerHTML ="";
		}
	}

/* for confirm password on input*/
	function cpass(){
		var cp = document.getElementById('cpassword');
		var cpa = document.getElementById('cpassword').value;
		var pas = document.getElementById('password').value;
		if (cpa.length < 6) {
			cp.style.color = "red";
		}
		else{
			cp.style.color = "rgb(255, 79, 0)";
		}
		if (cpa === pas) {
			cp.style.color = "mediumseagreen";
		}
	}


/*phone, email and name validator*/

    function adminphone(phon){
      var sparent = $(phon).parents('p');
      var pspan = document.getElementById('phoneerror');
      
      var pattern2 = /^\(?([+234]{4})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      if(phon.value.match(pattern2) )
      {
        phon.style.color = 'mediumseagreen';
        pspan.innerHTML = "";
      }
      else{
        phon.style.color = 'red';
        pspan.style.color = 'red';
        pspan.innerHTML = "Pls follow this pattern +234 888-999-7777";
      }
    }

    function adminemail(ml){
      var ordermpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (ml.value.match(ordermpattern)) {
        ml.style.color = "mediumseagreen";
        
      }
      else{
        ml.style.color = "red";
      }
    }

    function adminpblur(pblur){
      var pcolor = $(pblur).attr('id');
      var npcolor = document.getElementById(pcolor).style.color;
      if(npcolor == "mediumseagreen"){
      }
      else{
        pblur.value = "";
      }
    }

    function adminmblur(mblur){
      var mcolor = $(mblur).attr('id');
      var nmcolor = document.getElementById(mcolor).style.color;
      if(nmcolor == "mediumseagreen"){
      }
      else{
        mblur.value = "";
      }
    }

    function lastinput(lstname){
     var lastpattern = /^[a-zA-Z ]*$/;

     var lstparent = $(lstname).parents('p');
      var lstspan = document.getElementById('lnameerror');;
      
      if(lstname.value.match(lastpattern) )
      {
        lstname.style.color = 'mediumseagreen';
        lstspan.innerHTML = "";
      }
      else{
        lstname.style.color = 'red';
        lstspan.style.color = 'red';
        lstspan.innerHTML = "Only letters and white space are allowed";
      }
    }

    function firstinput(frtname){
     var firstpattern = /^[a-zA-Z ]*$/;
     var frstspan = document.getElementById('fnameerror');
      
      if(frtname.value.match(firstpattern) )
      {
        frtname.style.color = 'mediumseagreen';
        frstspan.innerHTML = "";
      }
      else{
        frtname.style.color = 'red';
        frstspan.style.color = 'red';
        frstspan.innerHTML = "Only letters and white space are allowed";
      }
    }

    function lastblur(lstblur){
      var lstcolor = $(lstblur).attr('id');
      var nlstcolor = document.getElementById(lstcolor).style.color;
      if(nlstcolor == "mediumseagreen"){
      }
      else{
        lstblur.value = "";
      }
    }

    function firstblur(frtblur){
      var frtcolor = $(frtblur).attr('id');
      var nfrtcolor = document.getElementById(frtcolor).style.color;
      if(nfrtcolor == "mediumseagreen"){
      }
      else{
        frtblur.value = "";
      }
    }
</script>
</body>
</html>