<?php
require "../conn.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php?e=login to perform this action";</script>';
}
require "autolog.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome To admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrapnew/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrapnew/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="main2.css">
	<link rel="stylesheet" type="text/css" href="toggle.css">
	
	<script type="text/javascript" src="bootstrapnew/js/jQuery.js"></script><script type="text/javascript" src="bootstrapnew/js/bootstrap.min.js"></script>
	<style type="text/css">
		/*body{background-image: url("../img/paper.gif");}*/
		div .regcar{
			border: none;
			color: steelblue;
			outline: 1px solid #ddd;
			font-size: 18px;
			padding: 5px 8px;
			background-color: transparent;
			transition: 1s;
		}
		div .regcar:hover{
			transition: 1s;
			outline: 1px solid steelblue;
			color: #ddd;
			background-color: rgba(0,0,0,.5);
		}


	</style>
</head>
<body style="background-color: #ddd;">
  
<?php
	$carnameerror = $hirepriceerror = $platenoerror = $enginnoerror = $carimageerror = "";
	$carname = $hireprice = $plateno = $engineno = $carimage = "";
	$msg = $passmsg = $msgfill = $existmsg = $msgwrong = $exceedmsg = ""; 
	$chooseimage = "Select Car Image , Size must not above 1.5mb";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$passmsg = "Password not match";

	  if (empty($_POST["carname"])) {
	    $carnameerror = "Car name is required*";
	  } else {
	    $carname = test_input($_POST["carname"]);
	    //if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
		  //$nameErr = "Only letters and white space allowed"; 
		//}
	  }
	  if (empty($_POST["hireprice"])) {
	    $hirepriceerror = "Hire price is required*";
	  } else {
	    $hirepric = test_input($_POST["hireprice"]);
	    $hireprice = str_replace(" ", "", $hirepric);
	    
	    //if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
		  //$nameErr = "Only letters and white space allowed"; 
		//}
	    if (!is_numeric($_POST["hireprice"])) {
	  		$hirepriceerror = "Invalid Amount, Enter a valid price";
	  		$hireprice = "";
	  		# code...
	  	}
	  	else{
	  		if ($hireprice < 1) {
	  			# code...
	  			$hirepriceerror = "Invalid Amount, Enter a valid price";
	  		}
	  	}
	  }
	  if (empty($_POST["engineno"])) {
	    $enginnoerror = "Engine No is required*";
	  } else {
	    $enginen = test_input($_POST["engineno"]);
	    $engineno = str_replace(" ", "", $enginen);
	  }
	  if (empty($_POST["plateno"])) {
	    $platenoerror = "Plate No is required*";
	    $clearpass = "";
	  } else {
	    $platen = test_input($_POST["plateno"]);
	    $plateno = str_replace(" ", "", $platen);
	  }

	  
	    	$target_dir = "../carimage/".$plateno;
			  $target_fil = $target_dir.basename($_FILES["carimage"]["name"]);
			  $target_file = str_replace(" ", "", $target_fil);
			  //echo $target_file;
			  $upload = 1;
			  $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
		  	  $check = getimagesize($_FILES["carimage"]["tmp_name"]);
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
			  	$carimageerror = "file already exist";
			  	$upload = 0;
			  }
			  //if file size too large
			  if ($_FILES["carimage"]["size"]>1500000) {
			  	# code...
			  	$carimageerror = "image too large, must not above 1.5Mb";
			  	$upload = 0;
			  }
			  //allow certain file
			  if ($imagefiletype != "jpg" && $imagefiletype != "jpeg" && $imagefiletype != "png" && $imagefiletype != "gif") {
			  	# code...
			  	$carimageerror = "file is not an image, format not supported";
			  	$upload = 0;
			  	
			  }
			  //check if $upload is set to 0 by an error
			  if ($upload == 0) {
			  	$target_file ="";
			  	$chooseimage = "";
				//$passporterr = "sorry, your file was not uploaded";
			  }


		 		$engvalidate = "SELECT * FROM tbladdcar WHERE engineno = '$engineno' ";
	  		$chkengine = mysqli_query($conn, $engvalidate);
	  		if (mysqli_num_rows($chkengine)>0) {
	  			$enginnoerror = "Car with this engine No already exist";
	  			$engineno = "";
	  		}
	  			$platevalidate = "SELECT * FROM tbladdcar WHERE plateno = '$plateno' ";
	  		$chkplate = mysqli_query($conn, $platevalidate);
	  		if (mysqli_num_rows($chkplate)>0) {
	  			$platenoerror = "Car with this plate No already exist ";
	  			$plateno = "";
	  		}
	  			$carvalidate = "SELECT * FROM tbladdcar WHERE carname = '$carname' ";
	  		$chkcar = mysqli_query($conn, $carvalidate);
	  		if (mysqli_num_rows($chkcar)>0) {
	  			$carnameerror = "Car With this name already exist";
	  			$carname = "";
	  		}

			  if ($carname !== "" && $hireprice !=="" && $plateno !=="" && $engineno !=="" && $target_file !=="") {

	  				$hireprice1 = "#".$hireprice.":00k";
				   $insert = "INSERT INTO tbladdcar(carname, plateno, engineno, hireprice, carimage) VALUES ('$carname', '$plateno', '$engineno', '$hireprice1', '$target_file')";
				    $check = mysqli_query($conn, $insert);
				    if ($check) {

				    	//if $upload is 1
						  if ($upload == 1) {

						  	if (move_uploaded_file($_FILES['carimage']['tmp_name'], $target_file)) {	
						  	}
						  	else{
						  	 $existmsg = "sorry image not uploaded";
						  	}
						  }

				  	   echo "<script>
				  	   alert('You have successfully register a new car')
				  	   
				  	   window.location='availablecar.php'</script>";
				    }
				    else{
				     	$msgwrong = "error, you have inserted wrong info <br />";
				    }
					}
					//}
				
			//else{
				//$passmsg;
			//}
		//}
		else{
			$msgfill = "fill all the empty box <br />";
		}
	}

?>
	<div class="container">
			<form class="regform1 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype ="multipart/form-data">

				<div style="text-align: center; padding: 5px 0 0;">
					<p style="font-size: 20px; color:  #ff1a1a;"><?php echo $existmsg; echo $msgfill; echo $msgwrong; ?></p>
					<span class="errmsg"><?php echo $exceedmsg; ?></span>
					<span class="errmsg"><?php echo $msg; ?></span>
				</div>
				<div><p class="regform">Car Registration</p></div>
			  <div class="col-md-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
					<div class="rows">
						<input type="text" name="carname" placeholder="Enter Car Name" value="<?php echo $carname; ?>"><br /><span class="error"><?php echo $carnameerror; ?></span>
					</div>
					<div class="rows">
						<input type="text" name="hireprice" placeholder="Enter Car Hire Price" value="<?php echo $hireprice; ?>"><br /><span class="error"><?php echo $hirepriceerror; ?></span>
					</div>
					<div class="rows">
						<input type="text" name="engineno" placeholder="Enter Engine No" value="<?php echo $engineno; ?>"><br />
						<span class="error"><?php echo $enginnoerror; ?></span>
					</div>
					<div class="rows">
						<input type="text" name="plateno" placeholder="Enter Plate No" value="<?php echo $plateno; ?>"><br />
						<span class="error"><?php echo $platenoerror; ?></span>
					</div>
					<div class="rows">
						<input type="file" name="carimage" required>
						<span style="font-size: 18px; margin-left: 10px;"><?php echo $chooseimage; ?></span>
						<span class="error"><?php echo $carimageerror; ?></span>
					</div>
					
				
					<div class="col-md-12 loginbtn">
						<div class="button row">
							<label></label>
							<input type="submit" class="regcar" name="submit" value="Add New Car">
						</div>
				  </div>

					<div class="rows">
						<label></label>
					</div>
			  </div>


			</form>
		</div>
	<?php include "adminfooter.php"; ?>
</div>
<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>
<style type="text/css">
	.rows{
	display: block;
	width: 100%;
	padding: 5px;
}

</style>
	
</body>
</html>