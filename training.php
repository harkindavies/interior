<style type="text/css">
	/* modal */
	#footerbody > div.page-content > div > div > form{
		margin-bottom: 0;
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
    font-size: 150%;
    text-align: center;
    padding: 10px;
    font-family: Helvital;
    word-spacing: 3px;
  }

  .resulterror{
    border: 1px solid #d50000;
    /*background: rgba(255,0,0,0.3);*/
    background: rgba(255,90,80,0.7);

  }
	/* modal end*/
</style>

<?php
	require "conn.php";
	require "header.php";
	

	$resultmodal =$fname =$lname = $firstname = $lastname = $address = $mail = $phone = $dob = $gender = $target_file = $state = $local = $city = $plan = $parent = $maiden = $paddress = $pphone = $gname = $gphone = $gaddress =$kinname = $kinstatus = $kinphone = $kinaddress = $nmail = $nphone = $existmail = $imageerror = $nameErr = $existphone = $upstatus = $data2 = "";

  function test_input2($data2) {
    $data2 = trim($data2);
    $data2 = stripslashes($data2);
    $data2 = htmlspecialchars($data2);
    return $data2;
  }
  $pattern = '/^\(?([+234]{4})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
  $orderdate = date("Y-m-d");
  $ordernum = "";
  //if (isset($_POST["submit"])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	if(!empty($_POST["firstname"])){
	    $fname = test_input2($_POST["firstname"]);
	    $firstname = str_replace(" ", "", $fname);
	    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
		  	$nameErr = "Only letters and white space are allow for Firstname"; 
		  	$upstatus = 0;
			}
		}
		if (!empty($_POST["lastname"])) {
	    $lname = test_input2($_POST["lastname"]);
	    $lastname = str_replace(" ", "", $lname);
	    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
			  	$nameErr = "Only letters and white space are allow for Lastname"; 
			  	$upstatus = 0;
				}
		}
		if(!empty($_POST["address"])){
    	$address = test_input2($_POST["address"]);
		}
		if (!empty($_POST["your_email"])) {
			$mail = test_input2($_POST["your_email"]);
    //check mail valid or well formed
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
     $ordernum ="<div class='container'>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='resultmodal resulterror' id='resultmodal'>
                  <div class='resultmodalcontent resultcontenterror'>Inavalid Email address.</div></div></div></div></div>";
      $upstatus = 0;
    }
		}
    
  	
  if(!empty( $_POST["phone"] ) ) 
	{
	$phone = test_input2($_POST["phone"]);
    if( !preg_match( $pattern, $phone ) )
    {
    	$nameErr = 'Inavalid phone Number';
    	$upstatus = 0; 
    }
    else{}
	}
    
    //age calcution
  	if (empty($_POST["dateofbirth"])) {
  		$upstatus = 0;
  	}
  	else{
    	$dob = test_input2($_POST["dateofbirth"]);
  		$today = date("Y-m-d");
			$date1 = date_create($dob);
			$date2=date_create($today);
			$diff=date_diff($date1,$date2);
			$diff2 = $diff->format("%R%a");
			$age = ($diff2 / 365);
  	}
  	
    if (empty($_POST["gender"])) {
    	$upstatus = 0;
    }
    else{
    	$gender = test_input2($_POST["gender"]);
    }
    if(!empty($_POST['state'])){
    	$state = test_input2($_POST["state"]);
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
	  	$nameErr = "Only letters and white space are allow for State"; 
	  	$upstatus = 0;
		}
		if(!empty($_POST['local_government'])){
    	$local = test_input2($_POST["local_government"]);
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$local)) {
	  	$nameErr = "Only letters and white space are allow for Local Government"; 
	  	$upstatus = 0;
		}
		if(!empty($_POST['city'])){
    	$city = test_input2($_POST["city"]);
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
	  	$nameErr = "Only letters and white space are allow for City"; 
	  	$upstatus = 0;
		}
		if (!empty($_POST['plan'])) {
    	$plan = test_input2($_POST["plan"]);
		}
		if(!empty($_POST["parent_name"])){
    	$parent = test_input2($_POST["parent_name"]);
		}
    if (!preg_match("/^[a-zA-Z ]*$/",$parent)) {
	  	$nameErr = "Only letters and white space are allow for Parent Name"; 
	  	$upstatus = 0;
		}
		if(!empty($_POST["maiden_name"])){
    	$maiden = test_input2($_POST["maiden_name"]);
		}
    if (!preg_match("/^[a-zA-Z ]*$/",$maiden)) {
	  	$nameErr = "Only letters and white space are allow or Maiden Name"; 
	  	$upstatus = 0;
		}
		if (!empty($_POST['parent_address'])) {
    	$paddress = test_input2($_POST["parent_address"]);
		}
		if(!empty($_POST["parent_phone"])){
    	$pphone = test_input2($_POST["parent_phone"]);
	    if( !preg_match( $pattern, $pphone ) )
	    {
	    	$nameErr = 'Inavalid parent phone Number';
	    	$upstatus = 0; 
	    }
	    else {}
		}
    
    if(!empty($_POST["guarantor_name"])){
    	$gname = test_input2($_POST["guarantor_name"]);
		}
  	if (!preg_match("/^[a-zA-Z ]*$/",$gname)) {
	  	$nameErr = "Only letters and white space are allow for Guarantor Name"; 
	  	$upstatus = 0;
		}
		if (!empty($_POST["gurantor_phone"])) {
	    $gphone = test_input2($_POST["gurantor_phone"]);
	    if( !preg_match( $pattern, $gphone ) )
	    {
	    	$nameErr = 'Inavalid guarantor phone Number';
	    	$upstatus = 0; 
	    }
	    else {}
	  }

    if(!empty($_POST["guarantor_address"])){
    	$gaddress = test_input2($_POST["guarantor_address"]);
		}
		if(!empty($_POST["kin_name"])){
     $kinname =test_input2($_POST["kin_name"]);
   	}
		if (!preg_match("/^[a-zA-Z ]*$/",$kinname)) {
			$nameErr = "Only letters and white space are allow";
 			$upstatus = 0;
 		}
 		if(!empty($_POST["kin_status"])){
			$kinstatus = test_input2($_POST["kin_status"]);
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$kinstatus)) {
	  	$nameErr = "Only letters and white space are allow for Guarantor Name"; 
	  	$upstatus = 0;
		}
		if(!empty($_POST["kin_phone"])){
			$kinphone = test_input2($_POST["kin_phone"]);
			if( !preg_match( $pattern, $kinphone ) )
	    {
	    	$nameErr = 'Inavalid next-of-kin phone Number';
	    	$upstatus = 0; 
	    }
	    else {}
		}
		if(!empty($_POST["kin_address"])){
			$kinaddress = test_input2($_POST["kin_address"]);
		}
		if ($nameErr !== "") {
				$imageerror = "Select the image again.";
		}
		
	    $target_dir = "trainee/";
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
			$imageerror = "file is not an image or too big.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>File is not an image or too big.</div></div></div></div></div>
  			<?php
			$upload = 0;
			//echo "<script>alert('file is not an image'); window.location='addcar.php';</script>";
		}
		//if fileexist
		if (file_exists($target_file)) {
			$imageerror = "Image already exist.Pls rename the image";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>Image already exist.</div></div></div></div></div>
  			<?php
			$upload = 0;
		}
		 //if file size too large
		if ($_FILES["passport"]["size"]>150000) {
			# code...
			$imageerror = "Image too large, must not above 150Kb.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>Image too large, must not above 150Kb.</div></div></div></div></div>
  			<?php
			$upload = 0;
		}
	  //allow certain file
		if ($imagefiletype != "jpg" && $imagefiletype != "jpeg" && $imagefiletype != "png" && $imagefiletype != "gif") {
			$imageerror = "file is not an image, format not supported.";
			?>

				<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>File is not an image, format not supported.</div></div></div></div></div>
  			<?php
			$upload = 0;	  	
	 	}
	    
		if ($fname !== "" && $lname !== "" && $address !== "" && $mail !== "" && $phone !== "" && $dob !== "" && $gender !== "" && $target_file !== "" && $state !== "" && $local !== "" && $city !== "" && $plan !== "" && $parent !== "" && $maiden !== "" && $paddress !== "" && $pphone !== "" && $gname !== "" && $gphone !== "" && $gaddress !== "" && $kinname !== "" && $kinstatus !== "" && $kinphone !== "" && $kinaddress !== "") {

			$mailvalidate = "SELECT * FROM trainingtbl WHERE email = '$mail' ";
			$chkmail = mysqli_query($conn, $mailvalidate);
			if (mysqli_num_rows($chkmail) > 0) {
				$existmail = "email already exist. <br />";
				$imageerror = "Select the image again.";
				$nmail = 1;
				?>
					<div class='container'>
						<div class='row'>
			        <div class='col-md-12 col-sm-12 col-xs-12'>
		            <div class='resultmodal resulterror' id='resultmodal'>
		              <div class='resultmodalcontent resultcontenterror'>Email already exist.</div></div></div></div></div>
	  		<?php 			
	  	}
 			else{}

				$phonevalidate = "SELECT * FROM trainingtbl WHERE phone ='$phone' ";
			  $chkphone = mysqli_query($conn, $phonevalidate);
				if (mysqli_num_rows($chkphone) > 0) {
					$existphone = "phone number already exist. <br />";
					$imageerror = "Select the image again.";
					$nphone = 1;
					?>
						<div class='container'>
							<div class='row'>
						        <div class='col-md-12 col-sm-12 col-xs-12'>
						            <div class='resultmodal resulterror' id='resultmodal'>
						                <div class='resultmodalcontent resultcontenterror'>Your Phone number already exist.</div></div></div></div></div>
  				<?php  			
	  		}
				else{}

	  		$selectreg = "SELECT * FROM trainingtbl where firstname = '$firstname' AND lastname = '$lastname' AND email = '$mail' AND address = '$address' AND phone = '$phone' AND dob  = '$dob' AND gender = '$gender' AND images = '$target_file' AND state = '$state' AND local = '$local' AND city = '$city' AND plan = '$plan' AND parent = '$parent' AND maiden  = '$maiden' AND paddress = '$paddress' AND pphone = '$pphone' AND gname = '$gname' AND gphone = '$gphone' AND gaddress  = '$gaddress' AND kinname = '$kinname' AND kinstatus = '$kinstatus' AND kinphone = '$kinphone' AND kinaddress = '$kinaddress' " ;
      $selectorderchk = mysqli_query($conn, $selectreg);
      
      if (mysqli_num_rows($selectorderchk) > 0) {
         $ordernum ="<div class='container'>
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='resultmodal resulterror' id='resultmodal'>
                  <div class='resultmodalcontent resultcontenterror'>You have submitted this form before.</div></div></div></div></div>";
      }
      else{}
				//check if $upload is set to 0 by an error
		  	if ($upload == 0) {
					$target_file ="";
		  		$chooseimage = "";
		  	}
				
				if ($upload == 1 && $nmail !== 1 && $nphone !== 1 && $upstatus !== 0) {
					$insert = "INSERT INTO trainingtbl (firstname, lastname, email, address, phone, dob, gender, images, state, local, city, plan, parent, maiden, paddress, pphone, gname, gphone, gaddress, kinname, kinstatus, kinphone, kinaddress) VALUES ('$firstname', '$lastname', '$mail', '$address', '$phone', '$dob', '$gender', '$target_file', '$state', '$local', '$city', '$plan', '$parent', '$maiden', '$paddress', '$pphone', '$gname', '$gphone', '$gaddress', '$kinname', '$kinstatus', '$kinphone', '$kinaddress')";

					$check = mysqli_query($conn, $insert);
					if($check){
						if (move_uploaded_file($_FILES['passport']['tmp_name'], $target_file)) {
							?>
							<div class='container'>
								<div class='row'>
							        <div class='col-md-12 col-sm-12 col-xs-12'>
							            <div class='resultmodal' id='resultmodal'>
							                <div class='resultmodalcontent'>Registration successfully. <span><img src='img/mark.png' height='30px' width='30px' style='margin-left: 10px;'></span>
							                </div></div></div></div></div>
											  		
					    <script>
						    setTimeout(function(){
				  	    		//window.location='viewadmin.php'
						    },3100)
		  	    	</script>
		  	   		<?php
				  	}
					}
					else{
							$existmsg = "sorry, Regisration failed.";
							?>
							<div class='container'>
								<div class='row'>
									<div class='col-md-12 col-sm-12 col-xs-12'>
										<div class='resultmodal resulterror' id='resultmodal'>
											<div class='resultmodalcontent resultcontenterror'>Sorry, Regisration failed.</div></div></div></div></div>
							<?php
					}		
				}
		    else{
		    	?>
		    	<div class='container'>
						<div class='row'>
						  <div class='col-md-12 col-sm-12 col-xs-12'>
						    <div class='resultmodal resulterror' id='resultmodal'>
						      <div class='resultmodalcontent resultcontenterror'><?php echo $nameErr; ?></div></div></div></div></div>
						<?php
		     	//$msgwrong = "error, you have inserted wrong info <br />";
		    }
		}
		else{
			?>
			<div class='container'>
					<div class='row'>
				        <div class='col-md-12 col-sm-12 col-xs-12'>
				            <div class='resultmodal resulterror' id='resultmodal'>
				                <div class='resultmodalcontent resultcontenterror'>Pls fill all the empty boxes</div></div></div></div></div>
			<?php
		}
  }
  echo $ordernum;
?>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Training registration form</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/regform.css"/>
</head>
<script>
		    // Add active class to the current page
		    document.getElementById("training").className += " active";
		</script>
<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
		    <form id="form-register" name="register" class="form-register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		      <div id="form-total">
        		<!-- SECTION 1 -->
            <h2>
            	<p class="step-icon"><span>01</span></p>
            	<span class="step-text">Peronal Infomation</span>
            </h2>
            <section>
              <div class="inner">
              	<div class="wizard-header">
									<h3 class="heading">Peronal Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your account.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
											<legend>First Name</legend>
											<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required value="<?php echo $firstname; ?>">
									</div>
									<div class="form-holder">
											<legend>Last Name</legend>
											<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required value="<?php echo $lastname; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Your Email</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" oninput="existmail()" required value="<?php echo $mail; ?>">
										<span class="perror" id="existmail"><?php echo $existmail; ?></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Your <span class="fa fa-phone" style="margin: 0 5px;"></span>  Number</legend>
											<input oninput="inphone(this)" type="text" class="form-control phones" id="phone" name="phone" placeholder="+234 888-999-7777" required value="<?php echo $phone; ?>">
										<span class="perror"><?php echo $existphone; ?></span>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Date of Birth</legend>
											<input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required  value="<?php echo $dob; ?>">
									</div>
								</div>		

								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Home Address</legend>
											<input type="text" class="form-control" id="address" name="address" placeholder="Home Address" required value="<?php echo $address; ?>">
									</div>
								</div>	
							</div>
	          </section>
	          <div id="noticetxt1" style="margin-top:5px; text-align: center; height: 20px;">
			         <span id="noticetxt" style="color: red; font-weight: 550; font-size: 15px;">Make sure all the fields are fill with correct information</span> <span id="notice" class="fa fa-exclamation-triangle" style="color: orange;"></span>
			      </div>

	          <!-- SCTION 2 !-->
	          <h2>
            	<p class="step-icon"><span>02</span></p>
            	<span class="step-text">Contact infommation</span>
            </h2>
            <section>
              <div class="inner">
              	<div class="wizard-header">
									<h3 class="heading">Contact Infomation</h3>
									<p>Please enter your contact infomation and proceed to the next step so we can build your account.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
											<legend>Parent / Guardian </legend>
											<input type="text" class="form-control" id="parent_name" name="parent_name" placeholder="Parent / Guardian Name" required value="<?php echo $parent; ?>">
									</div>
									<div class="form-holder">
											<legend>Mother maiden Name</legend>
											<input type="text" class="form-control" id="maiden_name" name="maiden_name" placeholder="Mother maiden Name" required value="<?php echo $maiden; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Parent Address</legend>
											<input type="text" class="form-control" id="parent_address" name="parent_address" placeholder="Parent address" required value="<?php echo $paddress; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Parent /  Guardian <span class="fa fa-phone"  style="margin: 0 5px;"></span> Number</legend>
											<input oninput="inphone(this)" type="text" class="form-control phones" id="parent_phone" name="parent_phone" placeholder="+234 888-999-7777" required value="<?php echo $pphone; ?>">
										<span class="perror"></span>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
											<legend>Gurantor Name</legend>
											<input type="text" class="form-control" id="guarantor_name" name="guarantor_name" placeholder="Guarantor Name" required value="<?php echo $gname; ?>">
									</div>
									<div class="form-holder">
											<legend>Guarantor <span class="fa fa-phone"  style="margin: 0 5px;"></span> Number</legend>
											<input oninput="inphone(this)" type="text" class="form-control phones" id="gurantor_phone" name="gurantor_phone" placeholder="+234 888-999-7777" required value="<?php echo $gphone; ?>">
										<span class="perror"></span>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Guarantor Address</legend>
											<input type="text" class="form-control" id="guarantor_address" name="guarantor_address" placeholder="Guarantor address" required value="<?php echo $gaddress; ?>">
									</div>
								</div>
							
							</div>
			      </section>

						<!-- SECTION 3 -->
            
             <h2>
            	<p class="step-icon"><span>03</span></p>
            	<span class="step-text">Other Information</span>
            </h2>
      			<section>
              <div class="inner">
              	<div class="wizard-header">
									<h3 class="heading">Other Infomation</h3>
									<p>Please enter your other infomation and proceed to the next step so we can build your account.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
											<legend>Next of Kin Name</legend>
											<input type="text" class="form-control" id="kin_name" name="kin_name" placeholder="Next of Kin Name" required value="<?php echo $kinname; ?>">
									</div>
									<div class="form-holder">
											<legend>Next of Kin Status</legend>
											<input type="text" class="form-control" id="kin_status" name="kin_status" placeholder="Who is he / she to you" required value="<?php echo $kinstatus; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Next of Kin Address</legend>
											<input type="text" class="form-control" id="kin_address" name="kin_address" placeholder="Next of Kin Address" required value="<?php echo $kinaddress; ?>">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Next of Kin <span class="fa fa-phone"  style="margin: 0 5px;"></span> Number</legend>
											<input oninput="inphone(this)" type="text" class="form-control phones" id="kin_phone" name="kin_phone" placeholder="+234 888-999-7777" required value="<?php echo $kinphone; ?>">
										<span class="perror"></span>
									</div>
								</div>	
							</div>
			      </section>

            <!-- SECTION 4 -->

            <h2>
            	<p class="step-icon"><span>04</span></p>
            	<span class="step-text">More about you</span>
            </h2>

	          <section>
              <div class="inner">
              	<div class="wizard-header">
									<h3 class="heading">More information about you</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								<div style="text-align: center;" id="imgpreview">
									<img id="thumbnil" class="img-rounded"  height="120px" width="120px">
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
											<legend>Your passport</legend>
											<input type="file" class="form-control2" id="passport" name="passport" placeholder="select your passport" accept="image/*" onchange="showMyImage(this)" required >
										<span class="perror" id="imgerr"><?php echo $imageerror; ?></span>
									</div>
								</div>	
	              <div class="form-row">
									<div class="form-holder">
										<legend>Gender</legend>
										<select class="form-control" name="gender" id="gender" value="<?php echo $gender; ?>" required>
											<option value="" disabled selected>Select Gender</option>
											<option value="m">Male</option>
											<option value="f">Female</option>
										</select>
									</div>
									<div class="form-holder">
											<legend>State of Origin</legend>
												<input type="text" class="form-control" id="state" name="state" placeholder="State of origin" required value="<?php echo $state; ?>">	
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										
											<legend>Local Government</legend>
											<input type="text" class="form-control" id="local_government" name="local_government" placeholder="local government" required value="<?php echo $local; ?>">
										
									</div>
									<div class="form-holder">
										
											<legend>City / Town</legend>
											<input type="text" class="form-control" id="city" name="city" placeholder="City / Town" required value="<?php echo $city; ?>">
										
									</div>
								</div>

								<div>
									<label class="special-label">Select a plan:</label>
									<input class="plan" type="radio" name="plan" value="basic" id="basicradio" required>
									<i onclick="basic()" onmouseover="basicm()" onmouseleave="basicl()"><span value="basic" id="basic" class="fa fa-circle-thin check"></span> <span>Basic </span></i>
									<input class="plan" type="radio" name="plan" value="regular" id="regularradio" required>
									<i onclick="regular()" onmouseover="regularm()" onmouseleave="regularl()"><span value="regular" id="regular" class="fa fa-circle-thin check"></span> <span>Regular </span></i>
									<input class="plan" type="radio" name="plan" value="advance" id="advanceradio" required>
									<i onclick="advance()" onmouseover="advancem()" onmouseleave="advancel()"><span value="advance" id="advance" class="fa fa-circle-thin check"></span> <span>Advance </span></i>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										
										<input type="submit" value="Register" id="submit">
										
									</div>
								</div>
          		</div>
	          </section>

						<div class="output" id="basicoutput">
							<p>Basic plan is a six month training that allow you to know all the basics of P.O.P decoration. It cost Thirty thousand naira (#30,000) to know.</p>		
						</div> 
						<div class="output" id="regularoutput">
							<p>Regular plan is a one year training that allow you to know all the Regular uses and appilications of P.O.P decoration,it involve client interaction. It cost seventy thousand naira (#70,000) to know.</p>		
						</div> 
						<div class="output" id="advanceoutput" >
							<p>Advance plan is a one year and six month training that allow you to know both Basic, Regular and Advance uses and application of P.O.P decoration, it also involve client interaction and management. It cost one hundred thousand naira (#100,000) to know.</p>		
						</div>
		      </div>
		      </form>
			</div>
		</div>
	</div>
	    	
</body>
</html>
	<?php
	include "footer.php";
?>

<script src="script/jquery.steps.js"></script>
<script src="script/regform.js"></script>
    
<script type="text/javascript">
	function showMyImage(fileInput) {
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

    $('#thumbnil').fadeIn(500);
    $('#imgerr').fadeOut(100); 
  }

    function basic(){
    	$('#basic').attr('class','fa fa-circle check');
    	$('#regular').attr('class','fa fa-circle-thin check');
    	$('#advance').attr('class','fa fa-circle-thin check');
    	$('#basicradio').attr('checked','on');
    }

    function regular(){
    	$('#regular').attr('class','fa fa-circle check');
    	$('#advance').attr('class','fa fa-circle-thin check');
    	$('#basic').attr('class','fa fa-circle-thin check');
    	$('#regularradio').attr('checked','on');
    }

    function advance(){
    	$('#advance').attr('class','fa fa-circle check');
    	$('#basic').attr('class','fa fa-circle-thin check');
    	$('#regular').attr('class','fa fa-circle-thin check'); 
    	$('#advanceradio').attr('checked','on');
    }

    function basicm(){
    		$("#basicoutput").fadeIn(500);
    }

    function basicl(){
    		$("#basicoutput").fadeOut(100);
    }

    function regularm(){
    		$("#regularoutput").fadeIn(500);
    }
    
    function regularl(){
    		$("#regularoutput").fadeOut(100);
    }

    function advancem(){
    		$("#advanceoutput").fadeIn(500);
    }
    
    function advancel(){
    		$("#advanceoutput").fadeOut(100);
    }

    function existmail(){
    	var exmail = document.getElementById('your_email');
    	if (exmail.style.color == "mediumseagreen") {
    		$('#existmail').fadeOut(100);
    	}
    }

    function inphone(phon){
    	var selct = $(phon).attr('id');
    	var sparent = $(phon).parents('div');
    	var pspan = sparent.children('span')[0];
    	
    	var pattern2 = /^\(?([+234]{4})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	    if(phon.value.match(pattern2) )
	    {
	    	phon.style.color = 'mediumseagreen';
	    	pspan.innerHTML = "";
	    }
	    else{
	    	phon.style.color = 'red';
	    	pspan.innerHTML = "Pls follow this pattern +234 888-999-7777";
	    }
    }
setInterval(function(){
	var f = 1;
	var phchk = 1;
	mchk = 1;
	var demail = document.getElementById('your_email').value;
	var mpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (demail.match(mpattern)) {
		document.getElementById('your_email').style.color = "mediumseagreen";
		mchk = 1;
	}
	else{
		document.getElementById('your_email').style.color = "red";
		mchk = 0;
	}

	var reg = document.getElementById('regularradio').checked;
	var bas = document.getElementById('basicradio').checked;
	var adv = document.getElementById('advanceradio').checked;
	var b = document.getElementsByClassName('form-control');
	var phones = document.getElementsByClassName('phones');
	for (var j = 0; j <= phones.length - 1; j++) {
		var phne  = $('.phones')[j];
		var phnn  = $(phne).attr('id');
		var pval = $(phne).val();
		var phonenw = document.getElementById(phnn);
		if (phonenw.style.color =="red" || pval == "") {
			phchk = 0;
		}
	}
	var imgchk = document.getElementById('thumbnil').src;
	for (var i = 0; i <= b.length - 1;  i++) {
		var c = $('.form-control')[i];
		var d = $(c).attr('id');
		var e = $(c).val();
	if(e == "" || e == null || imgchk =="" || phchk == 0 || mchk == 0){
		f = 0;
	}
	else{	}
	}

if ((f == 1) && (reg || bas || adv)) {
	$('#submit').fadeIn(500)
	$('#noticetxt1').fadeOut(500);
}
else{
	$('#noticetxt1').fadeIn(500);
	document.getElementById('noticetxt').innerHTML ="Make sure all the fields are fill with correct information";
	$('#submit').fadeOut(500)
	$('#noticetxt').css('color','red');
	$('#notice').fadeIn(1000);
	$('#notice').fadeOut(1000);
}
},1000)
</script>