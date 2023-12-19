<?php
	session_start();
  	include "conn.php";
  	$msgreport = $successmsg ="";
  	if (isset($_SESSION['successmsg'])) {
  		$successmsg = $_SESSION['successmsg'];
  		if ($successmsg == 0) {
  			$msgreport ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Message already sent
                              </div></div></div></div></div>";
  		}
  		elseif ($successmsg == 1) {
  			$msgreport ="<div class='container'>
                          <div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                              <div class='resultmodal' id='resultmodal'>
                                <div class='resultmodalcontent'>
                                  Message sent successfully
                                    <span><img src='img/mark.png' height='30px' width='30px' style='margin-left: 10px;'></span>
                                </div></div></div></div></div>";
  		}
  		elseif ($successmsg == 2) {
  		$msgreport ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Error in sending message
                              </div></div></div></div></div>";
        }
        else{
        	$msgreport = "";
        }
        ?>
        <script type="text/javascript">
        	$("#resultmodal").slideUp(0);
		    $("#resultmodal").slideDown(500);
		   setTimeout(function(){
		      $("#resultmodal").slideUp(500);
		   }, 3500);
        </script>
        <?php
        unset($_SESSION['successmsg']);
  	}
  	
?>
<!DOCTYPE html>
<html>
<head>
	<title>AkinDavis interior</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/order.css">
	<link rel="stylesheet" type="text/css" href="css/about.css">
	<!-- //animation effects-css-->
  	<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />

	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="body">
	<div class="nwbody">
		<?php include "header.php" ?>
		<script>
		    // Add active class to the current page
		    document.getElementById("aboutpg").className += " active";
		</script>
		<div class="container" data-aos="zoom-in" style=" margin-top: 20px;">
			<div class="row">
				<div class="col-md-3 col-sm-5 col-xs-12"  data-aos="flip-right">
					<div class="containerbox">

					<?php
						$select = "SELECT * FROM adminreg WHERE position ='CEO & Founder' ";
					  	$check = mysqli_query($conn,$select);
					  	 $count = mysqli_num_rows($check);

					  	if($count == 0){
							
					    }
					    else
					    { 
					      for ($i=1; $i<= $count; $i++) {
					        $result=mysqli_fetch_assoc($check);
					        $pstrim = $result['photo'];
					        $temp = str_replace('../','',$pstrim);
					      ?>
					      
					     
						<img src="<?php echo $temp; ?>" width="100%" height="200px">
						<p id="signature">Davis</p>
						<p class="name"><?php echo $result['firstname'].' '.$result['lastname']; ?></p>
						<p class="post">CEO & Founder</p>
						<p class="info">The founder & CEO of Akindavis interior decoration,
						also a programmer & web developer.</p>
						<div class="mail-phone"><h4 class="phone" style="padding-top: 10px;"><?php echo $result['phone']; ?></h4><p  id="pmail"><?php echo $result['email']; ?></p></div>
						<div class="contact"><button id="contact" class="contacts" onclick="myemail(this)">Contact</button></div>
					</div>
				</div>

				<?php

					      }
						}
					?>
				<div class="col-md-9 col-sm-7 col-xs-12">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="about">
							<p class="about-title">About <span style="color: grey;">Akin</span><span style="color: mediumseagreen;">Davis</span> Design</p>
							<p class="aboutcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo lorem ipsum dolor sit amet, consectetur adipisicing elit, sed  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
							<p class="aboutcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris sed  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row" data-aos="zoom-in">
				<div class="col-md-12 col-sm-12 col-xs-12 other-pro">
					<div class="col-md-offset-2 col-md-8 col-md-offset-2">
					<?php
						$select2 = "SELECT * FROM adminreg WHERE position !='CEO & Founder' ";
					  	$check2 = mysqli_query($conn,$select2);
					  	 $count2 = mysqli_num_rows($check2);
					  	
					  	if($count2 == 0){
							
					    }
					    else
					    { 
					      for ($j=1; $j<= $count2; $j++) {
					        $result2=mysqli_fetch_assoc($check2);
					        $pstrim2 = $result2['photo'];
					        $temp2 = str_replace('../','',$pstrim2);
					      ?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="containerbox">
								<img class="img-rounded" src="<?php echo $temp2; ?> ">
								<p class="other-name"><?php echo $result2['firstname'].' '.$result2['lastname']; ?></p>
								<p class="other-post">Co-Worker</p>
								<p class="info"><?php echo $result2['position']; ?></p>
								<div class="mail-phone">
									<h4 class="phone<?php echo $count2; ?>"><?php echo $result2['phone']; ?></h4>
									<p id="pmail<?php echo $count2; ?>"><?php echo $result2['email']; ?></p>
								</div>
								<div class="contact"><button id="contact<?php echo $count2; ?>" class="contacts" onclick="myemail(this)">Contact</button></div>
							</div>
						</div>
						<?php

					      }
						}
					?>
						
					</div>
				</div>
			</div>
		</div>
	<?php 
	echo $msgreport;
		include "order.php";
		include "contact.php"; 
		include "footer.php"; 
	?>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".contacts").click(function(){
			//$("#contactpage").trigger('click');
		})
	})

	function myemail(f){
			var email = $(f).parents("div");
			var mmail = email.parents("div");
			var m = mmail.children('div');
			var mm = m.children('p').attr("id");
			var ml = document.getElementById(mm).innerHTML;
			var epic = mmail.children('img').attr("src");
			document.getElementById("epic").src = epic;
			document.getElementById("emsg").value =ml;
			$("#contactpage").trigger('click');
		}	

</script>


<script src="script/aos.js"></script><!-- //animation effects-js-->
<script src="script/aos1.js"></script>
