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

  $firstname = $rslt['firstname'];
  $lastname = $rslt['lastname'];
  $position = $rslt['position'];               
require "autolog.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome To admin</title>
	<script type="text/javascript" src="../bootstrap/js/jQuery.js"></script>
	<link rel="stylesheet" type="text/css" href="addproject.css">
	
</head>
<body id="addprojectbody">
<?php
	$projectnameerr = $priceerr = $promotypeerr = "";
	$projectname = $price = "";
	$msg = $msgfill = $existmsg = $msgwrong = $exceedmsg = $projecttype = $adminimageerror = $projecttypeerr = $promotype = $promotypeerr = ""; 
	$projecttype = "Select Your projecttype";
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["projectname"])) {
	    $projectnameerr = "projectname is required*";
	  } else {
	    $projectname = test_input($_POST["projectname"]);
	  }
	  if (empty($_POST["price"])) {
	    $priceerr = "price is required*";
	  } else {
	    $pric = test_input($_POST["price"]);
	    $price = str_replace(" ", "", $pric);
	    if (!preg_match("/^[0-9]*$/", $price) || ($price < 1)) {
		  	$priceerr = "Only numbers are allow"; 
		  	$price = "";
			}
	  }
	  
	  if (empty($_POST["projecttype"])) {
	    $projecttypeerr = "Select your projecttype";
	    $projecttype = "";
	  } else {
	    $projecttype = $_POST["projecttype"];
	  }

	  if (empty($_POST["promotype"])) {
	    $promotypeerr = "Select  promotype";
	    $promotype = "";
	  } else {
	    $promotype = $_POST["promotype"];
	  }

	  if (empty($_POST["user"])) {
	    $usererr = "Admin info is missing";
	    $user = "";
	  } else {
	    $user = $_POST["user"];
	  }

	  $checkname = "SELECT * FROM project WHERE projectname = '$projectname' ";
			  		$chkname = mysqli_query($conn, $checkname);
			  		if (mysqli_num_rows($chkname)>0) {
			  			$projectnameerr = "This project already exist. <br />";
			  			?>

							<div class='container'>
								<div class='row'>
							        <div class='col-md-12 col-sm-12 col-xs-12'>
							            <div class='resultmodal resulterror' id='resultmodal'>
							                <div class='resultmodalcontent resultcontenterror'>This project already exist.</div>
							            </div>
							        </div>
							    </div>
							</div>
			  			<?php

			  		}

	    
	    $target_dir = "../projectimage/";
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
			$adminimageerror = "File is not an image or too big.";
			$upload = 0;
			//echo "<script>alert('file is not an image'); window.location='addcar.php';</script>";
		}
		//if fileexist
		if (file_exists($target_file)) {
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
			$adminimageerror = "file already exist.";
			$upload = 0;
		 }
		 //if file size too large
		if ($_FILES["passport"]["size"]>3500000) {
			# code...
			?>

			<div class='container'>
				<div class='row'>
			        <div class='col-md-12 col-sm-12 col-xs-12'>
			            <div class='resultmodal resulterror' id='resultmodal'>
			                <div class='resultmodalcontent resultcontenterror'>Image too large, must not above 3.5Mb.</div>
			            </div>
			        </div>
			    </div>
			</div>
			<?php
			$adminimageerror = "Image too large, must not above 3.5Mb.";
			$upload = 0;
		}
	  //allow certain file
		if ($imagefiletype != "jpg" && $imagefiletype != "jpeg" && $imagefiletype != "png" && $imagefiletype != "gif") {
			# code...
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
			$adminimageerror = "File is not an image, format not supported.";
			$upload = 0;
			  	
	 	}
	 //check if $upload is set to 0 by an error
	  	if ($upload == 0) {
	  		$target_file ="";
	  		$chooseimage = "";
	  	}

		    if ($projectname !== "" && $price !=="" && $projecttype !=="" && $target_file !=="" && $promotype !=="") {
				$uploadate = date('Y-m-d h:i:s');	   
		    	//echo $target_file;

		  	    //if $upload is 1
				if ($upload == 1) {

				  	if (move_uploaded_file($_FILES['passport']['tmp_name'], $target_file)) {
				  		$insert = "INSERT INTO project (projectname, projectprice, projectype, promotype, projectimage, admininfo,uploadate) VALUES ('$projectname', '$price', '$projecttype', '$promotype','$target_file','$user','$uploadate')";
					    $check = mysqli_query($conn, $insert);
					    if ($check) {
					    		?>

								<div class='container'>
									<div class='row'>
								        <div class='col-md-12 col-sm-12 col-xs-12'>
								            <div class='resultmodal' id='resultmodal'>
								                <div class='resultmodalcontent'>You have successfully add a new project.</div>
								            </div>
								        </div>
								    </div>
								</div>
								<?php
							    
					    }
					    else{
					    		?>

								<div class='container'>
									<div class='row'>
								        <div class='col-md-12 col-sm-12 col-xs-12'>
								            <div class='resultmodal resulterror' id='resultmodal'>
								                <div class='resultmodalcontent resultcontenterror'>Error, you have inserted wrong info.</div>
								            </div>
								        </div>
								    </div>
								</div>
								<?php
					     	$msgwrong = "error, you have inserted wrong info. <br />";
					    }

				  	}
				  	else{
				  		?>

								<div class='container'>
									<div class='row'>
								        <div class='col-md-12 col-sm-12 col-xs-12'>
								            <div class='resultmodal resulterror' id='resultmodal'>
								                <div class='resultmodalcontent resultcontenterror'>Sorry image not uploaded.</div>
								            </div>
								        </div>
								    </div>
								</div>
								<?php
				  	 $existmsg = "Sorry image not uploaded.";
				  	}
				  }	
			}
			else{
				//$msgfill = "fill all the empty box <br />";
			}
		}
?>
<script>
	    // Add active class to the current page
	    document.getElementById("project").className = "active";
</script>

<div  id="addproject2body">	
	<div class="row" style="margin-bottom: 7%;">
		<div class="">
			<div class="formbody">
				<div class="formbackground" style="background:; text-align: center;">
					<div style="text-align: center; padding: 5px 0 0;">
						<p style="font-size: 20px; color:  #ff1a1a;"><?php echo $msgfill; echo $msgwrong; ?></p>
						<span class="errmsg"><?php echo $exceedmsg; ?></span>
						<span class="errmsg"><?php echo $msg; ?></span>
					</div>
					<div class="row" id="addpromove">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<a href="#"><button class="choosepro chooseactive" id="addpicture">Add Picture <span class="fa fa-photo" style="margin-left: 10px;"></span></button></a>
							<a href="addvideoproject.php"><button class="choosepro" id="addvideo">Add Video <span class="fa fa-video-camera" style="margin-left: 10px;"></span></button></a>
						</div>
					</div>
					<div class="container">
						<div class="avatar">			
							<img id="thumbnil" src="../img/avatar.png" class="img-circle" height="100px" width="100px" alt="image">
						</div>

						<span class="logintext">Project Registration Form</span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype ="multipart/form-data" id="formid">
							<div class="col-md-2 col-lg-2"></div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="rows">
									<span class="fa fa-user" for="projectname"></span><input oninput="inputdata(this)" type="text" name="projectname" placeholder="Enter The Project Name/Title" value="<?php echo $projectname; ?>" maxlength="20"><br />
								</div>
								<span id="fnameerror" class="error"><?php echo $projectnameerr;  ?></span>

								<div class="rows">
									<span class="fa fa-money" for="price"></span><input oninput="inputdata(this)" type="text" name="price" placeholder="Enter Project Price in Naira" value="<?php echo $price; ?>" id="price" ><br />
								</div>
								<span id="priceerror" class="error"><?php echo $priceerr; ?></span>

								<div class="rows">
									<span class="fa fa-ticket" for="promotype" style="transform: translate(3.5%, 0%);"></span>
									<select name="promotype" oninput="inputdata(this)" value="<?php $promotype; ?>">
										<option value="" disabled="" selected="">Select Promo Type</option>
										<option value="promo.jpeg">Promo</option>
										<option value="pricecut.jpeg">Price-Cut</option>
										<option value="message.png">No Promo</option>
									</select>  <br />
								</div>
								<span id="promotypeerror" class="error"><?php echo $promotypeerr;?></span>
							</div>					

							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="rows">
									<span class="fa fa-user" for="user"></span><input oninput="inputdata(this)" type="text" name="user"  value="<?php echo $firstname ." ". $lastname . " (". $position." )"; ?>" id="user" readonly><br />
								</div>
								<span id="usererror" class="error"></span>

								<div class="rows">
									<span class="fa fa-user-secret" for="projecttype" style="transform: translate(3.5%, 0%);"></span>
									<select name="projecttype" oninput="inputdata(this)" value="<?php $projecttype; ?>">
										<option value="" disabled="" selected="">Select Project Type</option>
										<option value="sitting">Sitting Room</option>
										<option value="bedroom">Bedroom</option>
										<option value="dining">Dinning Room</option>
										<option value="kitchen">Kitchen</option>
										<option value="other">Other</option>
										<option value="hall">Hall</option>
										<option value="screeding">Screeding</option>
										<option value="pillar">Pillar</option>
										<option value="divider">Divider Room</option>
										<option value="wall">Wall Screeding</option>
										<option value="tv_hanger">TV Hanger</option>
									</select>  <br />
								</div>
								<span id="projecttypeerror" class="error"><?php echo $projecttypeerr;?></span>

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
						<div>
		<?php include "adminfooter.php"; ?>
	</div>

					</div>
				
				</div>
			</div>	
		</div>
	</div>
	
</div>

<style type="text/css">
	@media screen and (min-width: 200px) and (max-width: 450px){
		#formid  div{
			min-width: 70%;
			margin: 3px auto;
		}	
	}
	@media screen and (max-width: 1204px){
		#formid  div{
			margin: 3px auto;
		}
		#formid > div.rowss > #mysubmit{
			margin-right: 50px;
		}
	}
	@media screen and (max-width: 359px){
		.rows input[type=password], .rows input[type=text], .rows input[type=email], .rows  input[type=file], .rows select{
			font-size: 17px;
			width: 200px;
		}
	}
</style>
<script type="text/javascript">
	function inputdata(inputdt){
		var inputdata = $(inputdt).parent("div");
		var inputchld = inputdata.children("span")[1];
		var inputchild = $(inputchld).attr("id");
		document.getElementById(inputchild).innerHTML = "";
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


    
  $(document).ready(function(){
  	$('#mysubmit').click(function(){
  		var vidval = document.getElementById("inputphoto").value;
  		if (vidval == "") { }
  		else{
  			$('#loading').css('display','inline-block');
  		}
  	});
  });
  
</script>
</body>
	<script type="text/javascript">
		$("#resultmodal").slideUp(0);
		$("#resultmodal").slideDown(500);
		setTimeout(function(){
		  $("#resultmodal").slideUp(500);
		}, 2500);
	</script>
</html>