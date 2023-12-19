<?php
session_start();
  include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AkinDavis interior</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<!-- //animation effects-css-->
	<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head><style type="text/css">
	body.body{
		background-image: url("img/bg6.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
	}
	.allservice{
		font-size: 17px;
		line-height: 1.5;
		font-family: serif;
	}
	.service{
		font-size: 3vw;
		color: #555;
		font-family: Helvital;
		text-align: center;
	}
	.general{
		margin-bottom: 20px;
		padding: 10px;
		text-indent: 30px;
	}

	h4.panel-title{font-variant: small-caps; font-size: 23px;}

	.chevup{
		position: absolute;
		left: 95%;
		color: #fff;
	}
	.servicecontent{
		width: 80%;
		margin: 0 auto;
		text-indent: 30px;
	}

	#accordion .panel-default{
		background: rgba(255,255,255,.6);
	}

	#accordion .panel-default .panel-heading{
		background: rgba(0,190,110,.6);
		color: #fff;
	}
	@media screen and (max-width: 700px){
		.chevup{left: 90%;}

		.service{font-size: 5vw;}

		.servicecontent{width: unset;}
	}
</style>
<body class="body">
		<?php include "header.php" ?>
		<script>
		    // Add active class to the current page
		    document.getElementById("servicepg").className += " active";
		</script>
		<div class="container allservice" style="margin-top: 20px;" data-aos="zoom-in">
			<div class="row">
				<p class="service">OUR SERVICES</p>
				<div class="general col-md-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
						<p class="general">Akin Davis interior & exterior decoration provide large interior  & exterior facilities for decorating homes, offices, halls among others to make them look exceptional and make it where you will always want to welcome visitor, we offer easy and stress free services to our customers and that makes us the number one choice for people who prefer excellent and perfect job done. Our integrity is what matter most which make us consistent in our service as we have pledged not to let our customers down, Our office is located at No 5 White house building Akobo in the city of Ibadan. We will soon extend our service to other state. Visit us today.</p>
					</div>
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="panel-group" id="accordion">
					    <div class="panel panel-default">
					      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					        <h4 class="panel-title">P.O.P Ceilling<span class="fa fa-chevron-down chevup"></span></h4>
					      </div>
					      <div id="collapse1" class="panel-collapse collapse in">
					        <div class="panel-body">
					        	<div style="margin: 10px auto; text-align: center;">
					        		<img class="img-rounded" src="img/landing-image.jpg" height="200px" width="300px">
					        	</div>
					        	<p class="servicecontent">At AkinDavis we offer P.O.P ceiling decortion of any type be it false plaster board design or P.O.P casting or molding design, we make creative designs that is captivating and give pleasure.</p></div>
					      </div>
					    </div>
					    <div class="panel panel-default">
					      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					        <h4 class="panel-title">Wall Screeding<span class="fa fa-chevron-down chevup"></span></h4>
					      </div>
					      <div id="collapse2" class="panel-collapse collapse">
					        <div class="panel-body">
					        	<div style="margin: 10px auto; text-align: center;">
					        		<img class="img-rounded" src="img/Ceil-with-wall-screed.jpg" height="200px" width="300px">
					        	</div><p class="servicecontent">
					        	At AkinDavis we offer screeding of any type be it wall screeding, deck screeding or exterior screeding.
					        	.</p></div>
					      </div>
					    </div>
					    <div class="panel panel-default">
					      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					        <h4 class="panel-title">Wall Divider<span class="fa fa-chevron-down chevup"></span></h4>
					      </div>
					      <div id="collapse3" class="panel-collapse collapse">
					        <div class="panel-body">
					        	<div style="margin: 10px auto; text-align: center;">
					        		<img class="img-rounded" src="img/Ceil-divider-and-pillar.jpg" height="200px" width="300px">
					        	</div><p class="servicecontent">
					        	At AkinDavis we offer wall divider of any type be it flower design or plain design that make your home look enticing.</p></div>
					      </div>
					    </div>
					    <div class="panel panel-default">
					      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					        <h4 class="panel-title">P.O.P Arc & Pillars<span class="fa fa-chevron-down chevup"></span></h4>
					      </div>
					      <div id="collapse4" class="panel-collapse collapse">
					        <div class="panel-body">
					        	<div style="margin: 10px auto; text-align: center;">
					        		<img class="img-rounded" src="img/new-pop-pillar-style.jpg" height="200px" width="300px">
					        	</div><p class="servicecontent">
					        	At AkinDavis we offer P.O.P arc & pillar of any design be it plain arc,flower pillar or plain pillar </p></div>
					      </div>
					    </div>
					</div> 				
				</div>
			</div>
		</div>
	<?php 
		include "order.php";
		//include "contact.php"; 
		include "footer.php"; 
	?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".contacts").click(function(){
			//$("#contactpage").trigger('click');
		});
	})

	function myemail(f){
			var email = $(f).parents("div");
			var mmail = email.parents("div");
			var m = mmail.children('div');
			var mm = m.children('p').attr("id");
			var ml = document.getElementById(mm).innerHTML;
			
			document.getElementById("emsg").innerHTML =ml;
			$("#contactpage").trigger('click');
		}	
</script>

<script src="script/aos.js"></script><!-- //animation effects-js-->
<script src="script/aos1.js"></script><!--