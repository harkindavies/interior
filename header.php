<!DOCTYPE html>
<html>
<head>
	<title>AkinDavis interior</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid"  id="inforow">
		<div class="row">
			<div class="top col-md-12 col-sm-12 col-xs-12">
				<div class="google col-md-4 col-sm-6 col-xs-12 fa fa-google-plus-circle"><span> Harkinpardeydavid@gmail.com</span></div>
				<div class="phone col-md-3 col-sm-6 col-xs-5 fa fa-phone"><span> +2348164028503</span></div>
				<div class="location-arrow col-md-5 col-sm-6 col-xs-7 fa fa-location-arrow"><span> N0 2, Akinpade Layout Akobo Ibadan <span class="oyo">Oyo State.</span></span></div>
			</div>
		</div>
		<div class="row" id = "bannerrow">
			<div id="banner" class="banner col-md-12 col-sm-12 col-xs-12">
				<nav>
					<div class="name-container col-md-3 col-sm-12 col-xs-12">
						<a href="index.php"><span class="name">Akin<span>Davis</span></span></a>
					</div>
					<div id="navul" class="navul col-md-9 col-sm-12 col-xs-12">
						<ul>
							<li><a id="homepg" class="list"  href="index.php">Home <span class="fa fa-home"></span></a></li>
							<li><a id="projectpg" class="list" href="project.php">Projects <span class="fa fa-pencil-square-o"></span></a></li>
							<li><a id="aboutpg" class="list" href="about.php">About <span class="glyphicon glyphicon-user"></span></a></li>
							<li><a id="servicepg" class="list" href="service.php">Services <span class="fa fa-server"></span></a></li>
							<i id ="order"></i>
							<li><a id ="training" class="list" href="training.php">Training <span class="fa fa-book"></span></a></li>
							<li><a id ="calculator" onclick="calculatorp()" class="list" href="#"><span class="fa fa-calculator"></span></a></li>
						</ul>
					</div>
					<div id="menubar" class="menubar">
 						<div class="bar1"></div>
  						<div class="bar2"></div>
  						<div class="bar3"></div>
					</div>
				</nav>
			</div>
		</div>
	</div>

      <?php  include "calculator.php"; ?>
</body>
</html>

<script>
	$(document).ready(function(){
		$("#menubar").click(function(){
			var x  = document.getElementById("menubar");
			x.classList.toggle("change");

			var menu = document.getElementById("navul");
			if (menu.style.display !== "block") {
				$("#navul").slideDown(500);
				$(".bar1, .bar3, .bar2").css("background-color", "#d50000");
			}
			else{
				$("#navul").slideUp(500);
				$(".bar1, .bar3, .bar2").css("background-color", "#fff");
			}		
		});
	})

	function calculatorp(){
			$('#calculatorp').trigger('click');
		}

	var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
	var currentScrollPos = window.pageYOffset;
	  if (prevScrollpos < 130) {
	    document.getElementById("inforow").style.top = "-200px";
	    document.getElementById("inforow").style.position ="";
	  } else {
	    document.getElementById("inforow").style.top = "-50px";
	    document.getElementById("inforow").style.position ="fixed";
	    document.getElementById("inforow").style.transition ="0.5s";;
	  }
	  prevScrollpos = currentScrollPos;
	}

	var prevScrollpos = window.pageYOffset;
	window.onload = function() {
	var currentScrollPos = window.pageYOffset;
	  if (prevScrollpos < 130) {
	    document.getElementById("inforow").style.top = "-200px";
	  } else {
	    document.getElementById("inforow").style.top = "-50px";
	    document.getElementById("inforow").style.position ="fixed";
	    document.getElementById("inforow").style.transition ="0.5s";
	    document.getElementById("banner").style.backgroundColor = "rgba(0,0,0,0.5)";
	    document.getElementById("bannerrow").style.backgroundColor = "rgba(0,0,0,0.5)";
	  }
	  prevScrollpos = currentScrollPos;
	}
</script>