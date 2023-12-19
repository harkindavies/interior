<?php 
require '../conn.php';
require "header.php" ;
//include"dashboard.php";
//session_start();
if (!isset($_SESSION['adminemail'])) {
	header('location:login.php?e=login to have access to this page');
}
else{

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
                 
//require "autolog.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome To admin</title>
	<style>
		body#indexbody{
			background-image: url("../img/Double-lighting-drop-and-recess-rectangle.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position:center;
			overflow-x: hidden;
		}

		.newmessage{
			position: fixed; right: 1%; top: 7.5%;
		}

		#bodycontainer{
			margin: 5% auto;
		}

		.infocontent{
			font-family: helvital;
			background: rgba(0,0,0,0.4);
			font-size: 18px;
			outline: 1px solid mediumseagreen;
			color: #fff;	
			height: auto;
			padding: 20px;
		}

		.infocontent2{
			height: inherit;
			padding: 15px;	
		}
		.welcome{
			text-align: center;
			margin-bottom: 10px;
		}
		.welcomeadmin{
			text-align: center;
			font-size: 22px;
			color: mediumseagreen;
		}		

		nav ul li a:focus, nav ul li a:active{
			text-decoration: none;
			color: rgba(255,255,255,.8);
			background:  mediumseagreen;
		}

		#dashmenu{
			margin: 5.3% 0 0 0px;
		}

		nav ul li{
			margin: 0;
			padding: 10px 0;
			font-variant: normal;
			display: inline-block;
		}

		nav ul{
			margin: -5px 0 0 5px;
			text-align: left;
		}

		nav ul li a{
			background: rgba(255,255,255,.8);
			color: mediumseagreen;
			padding: 8px;
			margin: 0;
			font-size: 14px;
			font-variant: unset;
			transition: .5s;
			text-decoration: none;
		}

		nav ul li a:hover{
			transition: .5s;
			color: #fff;
			background: rgba(60,179,113,.7);
		}
		#homepg{color: mediumseagreen;}

		@media screen and (max-width: 768px){
			#dashmenu{
			 margin: 0px 0 0 38px;
			}

		}
		
	</style>
</head>
	<body id="indexbody"><a id="editprofilepg" href="editprofile.php"></a>
		<div class="">
		<div id="dashmenu" class="row">
				<nav>
					<ul>
					<li id="editprofile1">
					<a class="a"  onclick="editp(this)" href="editprofile.php">Edit Profile</a></li>
					<li  id="changepassword">
					<a class="a" onclick="editp(this)" href="changepassword.php">Change Password</a></li>
					<li id="myprofile">
					<a class="a" onclick="editp(this)" href="myProfile.php">My Profile</a></li>
					<?php 
		              if ($remove == 1) {
		                ?>
							<li>
							<a id="myactivities" class="a" onclick="editp(this)" href="activities.php">Activities</a></li>
					  <?php
		              }
		              else{

		              }
		           ?>
				</ul>
			</nav>
				
			</div>
		<div id="bodycontainer">
		
				<div class=" infocontent col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-offset-1 col-xs-10 col-xs-offset-1">
					<div class="infocontent2">
						<div class="welcome">
							<span style="color: #fff;">Welcome Admin </span><span class="welcomeadmin"><?php echo $welcomemsg;  ?> </span>
						</div>
						<p>This is the managing aspect of Akindavis interior decoration, we implore you to make only necessary changes as it will affect the whole data storage.</p><p>On this page you can check all the existing customer order you can as well edit or delete any uneeded data and you can also add a new admin or delete admin.</p><p>Handle with care!</p>
					</div>
				</div>
		</div>
		</div>	
<?php

	}
	include "adminfooter.php";
?>
</body>
</html>
<!-- javascript -->
<script type="text/javascript">
	function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("closein").style.display ="none";
    document.getElementById("dashmenu").style.transition =".5s";
    document.getElementById("dashmenu").style.marginLeft ="248px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("dashmenu").style.transition =".5s";
    
    $("#closein").fadeIn(1300);
    if(window.innerWidth > 768){
    	document.getElementById("dashmenu").style.marginLeft ="0px";
    }
    else{
    	document.getElementById("dashmenu").style.marginLeft ="38px";
    }
}

</script>
