<?php 
require '../conn.php';
require "header.php" ;

//session_start();
if (!isset($_SESSION['adminemail'])) {
	header('location:login.php?e=login to have access to this page');
}
else{

$welcomemsg ="";
$welcomemsg = $_SESSION['adminfirstname']." ".$_SESSION['adminlastname'];

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
		height: 200vh;
		
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
	    text-transform: capitalize;
	  }

		.infocontent{
			font-family: helvital;
			width: 60%;
			margin: 17% 20%;
			font-size: 18px;
			outline: 1px solid mediumseagreen;
			color: #fff;	
			height: auto;
		}

		.infocontent2{
			height: inherit;
			padding: 15px;
			padding-bottom: ;
			background: rgba(0,0,0,0.4);
			
		}
		.welcome{
			text-align: center;
		}
		.welcomeadmin{
			text-align: center;
			font-size: 22px;
			color: mediumseagreen;
		}

		@media screen and (max-width: 768px){
			.resultmodalcontent{
				font-size: 100%;
			}
		}
	</style>
</head>
	<body id="indexbody">
		<div class='container'>
			<div class='row'>
	            <div class='col-md-12 col-sm-12 col-xs-12'>
	                <div class='resultmodal' id='resultmodal'>
	                    <div class='resultmodalcontent'>Welcome Admin: <?php echo $welcomemsg;  ?></div>
	                </div>
	            </div>
	        </div>
	    </div>
			<div class="infocontent">
				<div class="infocontent2">
					<div class="welcome">
					<span style="color: #fff;">Welcome Admin: </span><span class="welcomeadmin"><?php echo $welcomemsg;  ?> </span></div>
					<p>This is the managing aspect of Akindavis interior decoration, we implore you to make only necessary changes as it will affect the whole data storage.</p><p>On this page you can check all the existing customer order you can as well edit or delete any uneeded data and you can also add a new admin or delete admin.</p><p>Handle with care!</p>
				</div>
			</div>	
<?php

	}
	include "adminfooter.php";
?>
</body>
</html>
<script type="text/javascript">
	$("#resultmodal").slideUp(0);
	$("#resultmodal").slideDown(500);
	setTimeout(function(){
	  $("#resultmodal").slideUp(500);
	//$("#mypopmodal").fadeOut(1000);
	}, 2500);
</script>