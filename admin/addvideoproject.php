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
	$projectnameerr = $descriptionerr = $promotypeerr = "";
	$projectname = $description = "";
	$msg = $msgfill = $existmsg = $msgwrong = $exceedmsg = $projecttype = $adminimageerror = $projecttypeerr = $promotype = $promotypeerr = ""; 
	$projecttype = "Select Your projecttype";
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	    error_reporting(1);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["projectname"])) {
	    $projectnameerr = "projectname is required*";
	  } else {
	    $projectname = test_input($_POST["projectname"]);
	  }
	  if (empty($_POST["description"])) {
	    $descriptionerr = "description is required*";
	  } else {
	    $description = test_input($_POST["description"]); 
	  }
	  
	  if (empty($_POST["projecttype"])) {
	    $projecttypeerr = "Select your projecttype";
	    $projecttype = "";
	  } else {
	    $projecttype = test_input($_POST["projecttype"]);
	  }

	  if (empty($_POST["user"])) {
	    $usererr = "Admin info is missing";
	    $user = "";
	  } else {
	    $user = test_input($_POST["user"]);
	  }

	  $checkname = "SELECT * FROM videoproject WHERE projectname = '$projectname' ";
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

	   $target_dir = "../video/";
	    $target_file = $target_dir.basename($_FILES["video"]["name"]);
	   $countdot = substr_count($target_file,".");
	  // echo $countdot;
	   if ($countdot > 3) {
	   	# code...
	   	$target_file = "";
			$adminimageerror = "Pls rename this video properly before upload.";
			?>

							<div class='container'>
								<div class='row'>
							        <div class='col-md-12 col-sm-12 col-xs-12'>
							            <div class='resultmodal resulterror' id='resultmodal'>
							                <div class='resultmodalcontent resultcontenterror'>Pls rename this video properly before upload.</div>
							            </div>
							        </div>
							    </div>
							</div>
			  			<?php

	   }

	    $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	    $upload = 1;
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
		if ($_FILES["video"]["size"]>300000000) {
			?>

			<div class='container'>
				<div class='row'>
			        <div class='col-md-12 col-sm-12 col-xs-12'>
			            <div class='resultmodal resulterror' id='resultmodal'>
			                <div class='resultmodalcontent resultcontenterror'>Video too large, must not above 300Mb.</div>
			            </div>
			        </div>
			    </div>
			</div>
			<?php
			$adminimageerror = "Video too large, must not above 300Mb.";
			$upload = 0;
		}
		if ($imagefiletype != "mp4" && $imagefiletype != "avi" && $imagefiletype != "mov" && $imagefiletype != "3gp" && $imagefiletype !="mpeg") {
		        //echo "format not supported";
		    $upload = 0;
		}
	    if ($upload == 0) {
				$target_file ="";
		}
		else{
	        $video_path = $_FILES['video']['name'];
	        if(move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)){
	        	//echo "uploaded";
				$uploadate = date('Y-m-d h:i:s');	
			  	$insert = "INSERT INTO videoproject (projectname, description, projectype, projectvideo, admininfo, uploadate) VALUES ('$projectname', '$description', '$projecttype', '$target_file','$user', '$uploadate')";

			  	$check = mysqli_query($conn, $insert);
				    if($check) {
				    	?>

								<div class='container'>
									<div class='row'>
								        <div class='col-md-12 col-sm-12 col-xs-12'>
								            <div class='resultmodal' id='resultmodal'>
								                <div class='resultmodalcontent'>You have successfully add a new video.</div>
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
								                <div class='resultmodalcontent resultcontenterror'>Error, you have inserted wrong info</div>
								            </div>
								        </div>
								    </div>
								</div>
								<?php
				     	$msgwrong = "error, you have inserted wrong info. <br />";
				    }
	        }
	        else{
	          //echo "not upload";
	        }
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
							<a href="addproject.php"><button class="choosepro" id="addpicture">Add Picture <span class="fa fa-photo" style="margin-left: 10px;"></span></button></a>
							<a href="#"><button class="choosepro chooseactive" id="addvideo">Add Video <span class="fa fa-video-camera" style="margin-left: 10px;"></span></button></a>
						</div>
					</div>
					<div class="container">
						<div class="avatar">			
							<img id="thumbnil" src="../img/avatar.png" class="img-rounded" height="100px" width="140px" alt="image">
						</div>

						<span class="logintext">Video Registration Form</span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype ="multipart/form-data" id="formid">
							<div class="col-md-2 col-lg-2"></div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="rows">
									<span class="fa fa-user" for="projectname"></span><input type="text" name="projectname" placeholder="Enter The Project Video Name" value="<?php echo $projectname; ?>" maxlength="20" id="projectname" required><br />
								</div>
								<span id="fnameerror" class="error"><?php echo $projectnameerr;  ?></span>

								<div class="">
									<textarea name="description" placeholder="Enter The Project Description" value="<?php echo $description; ?>" id="description" minlength="45" maxlength="115" required></textarea><br />
									<span id="descriptionerror" class="error"><?php echo $descriptionerr; ?></span>
								</div>
								
							</div>					

							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="rows">
									<span class="fa fa-user" for="user"></span><input type="text" name="user"  value="<?php echo $firstname ." ". $lastname . " (". $position." )"; ?>" id="user" readonly><br />
								</div>
								<span id="usererror" class="error"></span>

								<div class="rows">
									<span class="fa fa-tag" for="projecttype" style="transform: translate(3.5%, 0%);"></span>
									<select name="projecttype" value="<?php $projecttype; ?>" id="projecttype" required>
										<option value="" disabled="" selected="">Select Video Type</option>
										<option value="tutorial">Tutorial</option>
										<option value="advertisement">Advertisement</option>
									</select>  <br />
								</div>
								<span id="projecttypeerror" class="error"><?php echo $projecttypeerr;?></span>

								<div class="rows"  id="picture">

									<span class="fa fa-video-camera" for="photo"></span><input type="file" accept="video/*" placeholder="Select your picture" value="<?php $chooseimage; ?>" name="video" onchange="showMyImage(this)" id="inputphoto" required />
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
<style type="text/css">
	#formid > div.col-lg-12.col-md-12.col-sm-12.rowss > input{
		margin-top: 30px;
	}
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
		#formid > div.rowss > input{
			margin-right: unset;
		}
		.rowss #mysubmit{
			margin-right: 50px;
		}
		textarea{
			position: relative;
			right: unset;
		}
	}
	@media screen and (max-width: 359px){
		.rows input[type=password], .rows input[type=text], .rows input[type=email], .rows  input[type=file], .rows select{
			font-size: 17px;
			width: 200px;
		}
	}
</style>
	<?php include "adminfooter.php"; ?>
</div>
<script type="text/javascript">
	function showMyImage(fileInput) {
		document.getElementById("photoerror").innerHTML = ""; 
    }
    
  $(document).ready(function(){
  	$('#mysubmit').click(function(){
  		var projectname = document.getElementById("projectname").value;
  		var description = document.getElementById("description").value;
  		var projecttype = document.getElementById("projecttype").value;
  		var user = document.getElementById("user").value;
  		var inputphoto = document.getElementById("inputphoto").value;
  		if(projectname == "" || description =="" || projecttype =="" || user =="" || inputphoto ==""){
  		}
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


<!-- javascript code for video preview-->
<script>
document.getElementById("inputphoto").addEventListener('change', function(event) {
  var file = event.target.files[0];
  var fileReader = new FileReader();
  if (file.type.match('image')) {
    fileReader.onload = function() {
      var img = document.getElementById('thumbnil');
      img.src = fileReader.result;
      //document.getElementsByTagName('img')[0].appendChild(img);
    };
    fileReader.readAsDataURL(file);
  } else {
    fileReader.onload = function() {
      var blob = new Blob([fileReader.result], {type: file.type});
      var url = URL.createObjectURL(blob);
      var video = document.createElement('video');
      var timeupdate = function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
          video.pause();
        }
      };
      video.addEventListener('loadeddata', function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
        }
      });
      var snapImage = function() {
        var canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        var image = canvas.toDataURL();
        var success = image.length > 100000;
        if (success) {
      	  var img = document.getElementById('thumbnil');
          //var img = document.createElement('img');
          img.src = image;
          //document.getElementsByTagName('div')[0].appendChild(img);
          URL.revokeObjectURL(url);
        }
        return success;
      };
      video.addEventListener('timeupdate', timeupdate);
      video.preload = 'metadata';
      video.src = url;
      // Load video in Safari / IE11
      video.muted = true;
      video.playsInline = true;
      video.play();
    };
    fileReader.readAsArrayBuffer(file);
  }
});
</script>