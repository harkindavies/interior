<?php
 include "conn.php";
 ?>
 <!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>AkinDavis interior</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
		#mypopmodal{
			display: none;
		}
	</style>
</head>
<?php
$newsemail = $successmsg = $msgwrong = $displaymodal = "";
	
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	if(isset($_GET["submit"])){
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if (empty($_GET["newsemail"])) {
				$newsemail = "";
  					$displaymodal ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Email is require for subscription.
                              </div></div></div></div></div>";
			} 
			else {
				$newsemail = test_input($_GET["newsemail"]);
	    		$newsemail = filter_var($newsemail, FILTER_SANITIZE_EMAIL);

				//check mail valid or well formed
				if (!filter_var($newsemail, FILTER_VALIDATE_EMAIL)) {
					$newsemail="";
					$displaymodal ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Invalid email address.
                              </div></div></div></div></div>";
				}
				else{
					$select = "SELECT * FROM subscribetbl WHERE email = '".$newsemail."' ";
					$chkmail = mysqli_query($conn, $select);
				  if (mysqli_num_rows($chkmail)>0) {
				  	$displaymodal ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Email already been use to subscribe.
                              </div></div></div></div></div>";
				  }
				  else{
			  		$subdate = date("Y-m-d");
						$insert = "INSERT INTO subscribetbl(email,subdate) VALUES ('$newsemail', '$subdate')";
						$check = mysqli_query($conn, $insert);
						if ($check) {
							mysqli_close($conn);	
							$newsemail = "";
							$displaymodal="<div class='container'>
                          <div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                              <div class='resultmodal' id='resultmodal'>
                                <div class='resultmodalcontent'>
                                  You have successfully subscribe to our newsletter.
                                    <span><img src='img/mark.png' height='30px' width='30px' style='margin-left: 10px;'></span>
                                </div></div></div></div></div>";
						}
					  else{
					    $displaymodal ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Error occur, You have inserted invalid data.
                              </div></div></div></div></div>";
					  }
							# code...
						//}
				  }
				}
			}
		}

		$conn->close();
	}
	?>
		<?php
	
?>

<body id="footerbody">
	<div class="footer">
		<div class="container" id="footercontainer">
			<div class="row">
				<div class="chev col-md-12  col-sm-12 col-xs-12"><span class="fa fa-chevron-down" id="down-footer"></span></div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-3 col-xs-6">
					<p class="top-project">Full P.O.P</p>
					<div class="project">
						<p><a id="house">House Ceilling</a></p>
						<p><a id="hallceil">Hall Ceilling</a></p>
					</div>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-6">
					<p class="top-project">Screeding</p>
					<div class="project">
						<p><a id="deckscreed">Deck screeding</a></p>
						<p><a id="wallscreed">Wall Screeding</a></p>
					</div>
				</div>

				<div class="col-md-2 col-sm-3 col-xs-6">
					<p class="top-project">Pillars</p>
					<div class="project">
						<p><a id="poppillars">P.O.P Pillars</a></p>
						<p><a id="walldivider">Wall Dividers</a></p>

					</div>
				</div>

				<div class="col-md-2 col-sm-3 col-xs-6">
					<p class="top-project">Other Project</p>
					<div class="project">
						<p><a id="otherceil">Other Ceilling</a></p>
						<p><a id="walltv">Wall TV Set</a></p>
					</div>
				</div>

				
				<div class="mail col-md-4 col-sm-12 col-xs-12">
					<p class="top-project">Subscribe to Neswletter</p>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
						<div class="newsmailcontainer"><input class="newsmail" type="email" name="newsemail" id="mail" onkeyup="subcribemail(this)" onblur="blursubcribemail(this)" value="<?php echo $newsemail; ?>" required><button type="submit" class="subscribe fa fa-long-arrow-right" name="submit"></button></div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 copyright">
					<p class="copy">Copyright &copy; <?php echo date("Y");?>, We <span class="fa fa-heart-o" style="color: limegreen; opacity: 0.7;"></span> You at <span style="color: limegreen; opacity: 0.7;">AkinDavis</span><span> Ineterior Decoration</span></p>
				</div>
			</div>
			<div class="row">
				<div class="fontcontainer col-md-12 col-sm-12 col-xs-10">
					 <a href="https://api.whatsapp.com/send?phone=2348164028503"><div class="font fa fa-whatsapp"></div></a>
					<a href="https://www.facebook.com/akindavis4u"><div class="font fa fa-facebook"></div></a>
					<a href="https://www.twitter.com/harkindavis"><div class="font fa fa-twitter"></div></a>
					<a href="https://www.instagram.com/harkindavis4u"><div class="font fa fa-instagram"></div></a>
					<a href="https://www.skype.com/harkindavis"><div class="font fa fa-skype"></div></a>
					<a href="https://www.youtube.com/harkindavis"><div class="font fa fa-youtube"></div></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="chev col-md-12 col-sm-12 col-xs-12"><span class=" fa fa-chevron-up" id="up-footer"></span></div>
		</div>
			<p class="copy2" style="text-align: center;">Copyright &copy; <?php echo date("Y");?>, We <span class="fa fa-heart-o" style="color: limegreen; opacity: 0.7;"></span> You at <span style="color: limegreen; opacity: 0.7;">AkinDavis</span><span> Ineterior Decoration</span></p>
	</div>
	<?php echo $displaymodal; ?>
	<?php include "houseimg.php"; ?>
	<?php include "hallceil.php"; ?>
	<?php include "otherceil.php"; ?>
	<?php include "wallscreed.php"; ?>
	<?php include "deckscreed.php"; ?>
	<?php include "walltv.php"; ?>
	<?php include "walldivider.php"; ?>
	<?php include "poppillars.php"; ?>
	<?php include "poparc.php"; ?>

</body>
</html>
   		
<script type="text/javascript">
	$(document).ready(function(){
    $("#down-footer").click(function(){
	    $("#footercontainer").slideUp(1000);
	    $("#up-footer").fadeIn(2000);
	    $("#down-footer").fadeOut(1000);
	    $(".copy2").fadeIn(2000);
		});

	  $("#up-footer").click(function(){
	   	//var mn = window.top.innerHeight;
	   	$("#footercontainer").slideDown(1000);
	      $("#down-footer").fadeIn(2000);
	      $("#up-footer").fadeOut(200);
	      $(".copy2").fadeOut(200);
	      //window.scrollTo(0, mn);
	  });

	$("#mypopmodal").slideUp(0);
    $("#mypopmodal").slideDown(500);
   setTimeout(function(){
      $("#mypopmodal").slideUp(500);
   	//$("#mypopmodal").fadeOut(1000);
   }, 3500);

   $("#house").click(function(){
   	$("#housebody").fadeIn(500);
   		$('#housebody').trigger('click');
   });

   $("#hallceil").click(function(){
   	$("#hallbody").fadeIn(500);
   		$('#hallbody').trigger('click');
   });

   $("#otherceil").click(function(){
   	$("#otherbody").fadeIn(500);
   		$('#otherbody').trigger('click');
   });

   $("#wallscreed").click(function(){
   	$("#wallscreedbody").fadeIn(500);
   		$('#wallscreedbody').trigger('click');
   });

   $("#deckscreed").click(function(){
   	$("#deckscreedbody").fadeIn(500);
   		$('#deckscreedbody').trigger('click');
   });

   $("#walltv").click(function(){
   	$("#walltvbody").fadeIn(500);
   		$('#walltvbody').trigger('click');
   });

   $("#walldivider").click(function(){
   	$("#walldividerbody").fadeIn(500);
   		$('#walldividerbody').trigger('click');
   });

   $("#poppillars").click(function(){
   	$("#poppillarsbody").fadeIn(500);
   		$('#poppillarsbody').trigger('click');
   });

   $("#poparc").click(function(){
   	$("#arcbody").fadeIn(500);
   		$('#arcbody').trigger('click');
   });

   /*pop-up */
   $("#resultmodal").slideUp(0);
   $("#resultmodal").slideDown(500);
   setTimeout(function(){
      $("#resultmodal").slideUp(500);
   }, 5000);

});

function subcribemail(ml){
      var ordermpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (ml.value.match(ordermpattern)) {
        ml.style.color = "mediumseagreen";
      }
      else{
        ml.style.color = "red";
      }
    }

    function blursubcribemail(bml){
    	if(bml.style.color =="red"){
    		bml.value = "";
    	}
    }
</script>