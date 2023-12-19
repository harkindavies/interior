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
	<link rel="stylesheet" type="text/css" href="css/linericon/style.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<!-- //animation effects-css-->
	<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body id="mycontainer" data-aos="">
	<div id="landing">
		<?php include ("header.php");?>
		<div class="row" style="height: 100%; width: 100%;" data-aos="">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3>Akindavis P.O.P Interior decoration<br>for new innovation</h3>
				<h4>The peak of false p.o.p interior decoration with innovative that is out of this world</h4>	
				<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center">
					<a href="project.php"><button class="submitbtn" type="submit" value="Explore">Explore <i class="fa fa-long-arrow-right" style="color: #fff; padding-left: 10px;"> </i> </button></a>
					<a href="#parallax"><button class="submitbtn" type="submit" name="" value="Order">Order <i class="fa fa-long-arrow-down" style="color: #fff; padding-left: 10px;"> </i></button></a>
				</div>
			</div>	
		</div>
	</div>
	<div class="mycontainer">

		<div class="parallax" id="parallax" titles="sitting">
		  <script>
		    // Add active class to the current page
		    document.getElementById("homepg").className += " active";
			</script>
			
			<div class="content1" data-aos="">
				<div class="description"><span>Sitting Room</span></div>
				<!-- image modal -->
				<div class="row" id="imagerow">
			<?php
			$select = "SELECT * FROM project WHERE projectype ='sitting' ";
		  	$check = mysqli_query($conn,$select);
		  	 $count = mysqli_num_rows($check);

		  	if($count == 0){
				
		    }
		    else
		    { 
		    	if($count > 4){
		    		$mycount = 4;
		    	}
		    	else{
		    		$mycount = $count;
		    	}
		      for ($i=1; $i<= $mycount; $i++) {
		        $result=mysqli_fetch_assoc($check);
		        $pstrim = $result['projectimage'];
		        $temp = str_replace('../','',$pstrim);
		        ?>

		        <div class="column">
			  	<div class="imgcontainer">
				    <img src="<?php echo $temp; ?>" style="" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor">
				    <div class="text"  onclick="openModal();currentSlide(<?php echo $i; ?>)" ><p class="clicktoview fa fa-hand-o-up" style="font-size: 2vw;"></p>
						<i class="fa fa-refresh fa-spin"></i></div>
					</div>
				  </div>
				  <?php
			      }
			      }	
			      ?>
		      
				</div>

				<div id="myModal" class="modal">
					<div class="orderbtn">
						<input class="ordercart" type="submit" value="Order" style="display: none;">
					</div>
				  <span class="close cursor" id="closemodaldiv1" onclick="closeModal(this)">&times;</span>
				  <div class="modal-content" id="modal-content">

				<?php
		      	$select1 = "SELECT * FROM project WHERE projectype ='sitting' ";
			  	$check1 = mysqli_query($conn,$select1);
			  	 $count1 = mysqli_num_rows($check1);

			  	if($count1 == 0){
					
			    }
			    else
			    { 
			    	if($count1 > 4){
				    		$mycount1 = 4;
				    	}
				    	else{
				    		$mycount1 = $count1;
				    	}
			  	  for ($j=1; $j<= $mycount1; $j++) {
			        $result1=mysqli_fetch_assoc($check1);
			        $pstrim1 = $result1['projectimage'];
			        $proprice = $result1['projectprice'];
			        $prostar = $result1['star'];
			        $prouser = $result1['user'];
			        if ($prouser == 0) {
			        	$prorate = 0;	
			        }
			        else{
			        	$prorate = round($prostar/$prouser,1);
			        }
			        $prosn = $result1['sn'];
			        $temp1 = str_replace('../','',$pstrim1);
			        ?>
			  	
				    <div class="mySlides">
				      <div class="numbertext">&#8358; <i id="numbertxts<?php echo $j; ?>"><?php echo $proprice; ?></i>&#9585;m<sup>2</sup></div>
				      <img class="imgs" src="<?php echo $temp1; ?>" style="width:100%;">
				      <span id='norder'>
				      	<img src='img/mark.png' class='norder' value='Order' style='display:none;'>
				    	</span>
				      <div class="mytooltip" id="mytooltips<?php echo $j; ?>">Click to Add to Cart & Pls Rate This Work</div>
				      <div id="likes<?php echo $j; ?>" src="<?php echo $temp1; ?>" class="fa fa-cart-plus" onclick="like(this)"></div>

				      <!-- for star-->
				      <?php
				      	for ($w=1; $w <=5 ; $w++) {  
				      		?>
				      		<span id="<?php echo 'sitting'.$prosn.$w;?>" onmouseover="functionmv(this)" onclick="functionst(this)" class=" fa fa-star"></span>
				      		<?php
				      	}
				      ?>
						  
					  <small class="star" id="stara<?php echo $j; ?>"><?php echo $prorate; ?></small>
					  <span class="lnr lnr-users" id="users<?php echo $j; ?>"></span>
					  <strong class="user" id="usera<?php echo $j; ?>"><?php echo $prouser; ?></strong>
				    </div>
				    
				  <?php
				  }
				}
				?> 
				    
				    <a class="previt" onclick="plusSlides(-1)">&#10094;</a>
				    <a class="nextit" onclick="plusSlides(1)">&#10095;</a>

				    <div class="caption-container">
				      <p id="caption"></p>
				    </div>

				    <div id="mydemo">

				   <?php
			      	$select2 = "SELECT * FROM project WHERE projectype ='sitting' ";
				  	$check2 = mysqli_query($conn,$select2);
				  	 $count2 = mysqli_num_rows($check2);

				  	if($count2 == 0){

				    }
				    else
				    { 
				    	if($count2 > 4){
				    		$mycount2 = 4;
				    	}
				    	else{
				    		$mycount2 = $count2;
				    	}
				  		for ($j=1; $j<= $mycount2; $j++) {
				        $result2=mysqli_fetch_assoc($check2);
				        $pstrim2 = $result2['projectimage'];
				        $temp2 = str_replace('../','',$pstrim2);
				        $alttemp = str_replace('../projectimage/','', $pstrim2);
				        ?>
					    <div class="column">
					      <img class="demo cursor" src="<?php echo $temp2; ?>" onclick="currentSlide(<?php echo $j; ?>)" alt="<?php echo $alttemp; ?>">
					    </div>
					    <?php
						}
					}
						?>
					</div>
				  </div>
				</div>
				
				<!-- image modal end-->
				<P id="details-head"></P>
				<p id="details">
				This is AkinDavis P.O.P interior decoration some of design from our gallery of available P.O.P designs for sitting room which make the sitting room look exceptional, we design to suit our customer request and according to the size, shape and height of your living room. </p>
				<div class="scroll">
					<span class="pre" onclick="myprevious(this)" id="previous">&#10094;</span>
					<span class="nxt" onclick="mynext(this)" id="next">&#10095;</span>
				</div>
			</div>
		</div>


		<div class="parallax2" id="parallax2" titles="bedroom">
			<div class="content2" data-aos="">
				<div class="description"><span>Bedroom</span></div>

				<!-- image modal -->
				<div class="row" id="imagerow2">

				<?php
					$selectbed = "SELECT * FROM project WHERE projectype ='bedroom' ";
				  	$checkbed = mysqli_query($conn,$selectbed);
				  	 $countbed = mysqli_num_rows($checkbed);

				  	if($countbed == 0){
						
				    }
				    else
				    { 
				    	if($countbed > 4){
				    		$mycountbed = 4;
				    	}
				    	else{
				    		$mycountbed = $countbed;
				    	}
				      for ($a=1; $a<= $mycountbed; $a++) {
				        $resultbed=mysqli_fetch_assoc($checkbed);
				        $pstrimbed = $resultbed['projectimage'];
				        $tempbed = str_replace('../','',$pstrimbed);
				        ?>

				        <div class="column">
					  	<div class="imgcontainer">
						    <img src="<?php echo $tempbed; ?>" style="" onclick="openModal2();currentSlide2(<?php echo $a; ?>)" class="hover-shadow cursor">
						    <div class="text"  onclick="openModal2();currentSlide2(<?php echo $a; ?>)" ><p class="clicktoview fa fa-hand-o-up" style="font-size: 2vw;"></p>
								<i class="fa fa-refresh fa-spin"></i></div>
							</div>
						  </div>
						  <?php
				      }
				    }	
				?>

				</div>

				<div id="myModal2" class="modal">
					<div class="orderbtn">
						<input class="ordercart" type="submit" value="Order" style="display: none;">
					</div>
				  <span class="close cursor" id="closemodaldiv2" onclick="closeModal(this)">&times;</span>
				  <div class="modal-content" id="modal-content">


				  	<?php
		      	$selectbed1 = "SELECT * FROM project WHERE projectype ='bedroom' ";
			  	$checkbed1 = mysqli_query($conn,$selectbed1);
			  	 $countbed1 = mysqli_num_rows($checkbed1);

			  	if($countbed1 == 0){
					
			    }
			    else
			    { 
			    	if($countbed1 > 4){
				    		$mycountbed1 = 4;
				    	}
				    	else{
				    		$mycountbed1 = $countbed1;
				    	}
			  	  for ($b=1; $b<= $mycountbed1; $b++) {
			        $resultbed1=mysqli_fetch_assoc($checkbed1);
			        $pstrimbed1 = $resultbed1['projectimage'];
			        $propricebed = $resultbed1['projectprice'];
			        $prosnbed = $resultbed1['sn'];
			        $prostarbed = $resultbed1['star'];
			        $prouserbed = $resultbed1['user'];
			        if ($prouserbed == 0) {
			        	$proratebed = 0;	
			        }
			        else{
			        	$proratebed = round($prostarbed/$prouserbed,1);
			        }
			        $prosn = $result1['sn'];
			        //echo $prosn;
			        $tempbed1 = str_replace('../','',$pstrimbed1);
			        ?>
			  	
				    <div class="mySlides2">
				      <div class="numbertext">&#8358; <i id="numbertxtbr<?php echo $b; ?>"><?php echo $propricebed; ?></i>&#9585;m<sup>2</sup></div>
				      <img class="imgs" src="<?php echo $tempbed1; ?>" style="width:100%;">
				      <span id='norder'>
				      	<img src='img/mark.png' class='norder' value='Order' style='display:none;'>
				    	</span>
				      <div class="mytooltip" id="mytooltipbr<?php echo $b; ?>">Click to Add to Cart & Pls Rate This Work</div>
				      <div id="likesb<?php echo $b; ?>" src="<?php echo $tempbed1; ?>" class="fa fa-cart-plus" onclick="like(this)"></div>

				      <!-- for star-->
				      <?php
				      	for ($x=1; $x <=5 ; $x++) { 
				      		?>
				      		<span id="<?php echo 'bed'.$prosnbed.$x;?>" onmouseover="functionmv(this)" onclick="functionst(this)" class=" fa fa-star"></span>
				      		<?php
				      	}
				      	?>
						  
						  <small class="star" id="starb<?php echo $b; ?>"><?php echo $proratebed; ?></small>
						  <span class="lnr lnr-users" id="users<?php echo $b; ?>"></span>
						  <strong class="user" id="userb<?php echo $b; ?>"><?php echo $prouserbed; ?></strong>
				    </div>
				    
				  <?php
				  }
				}
				?> 
				    
				    <a class="previt" onclick="plusSlides2(-1)">&#10094;</a>
				    <a class="nextit" onclick="plusSlides2(1)">&#10095;</a>

				    <div class="caption-container">
				      <p id="caption2"></p>
				    </div>

				    <div id="mydemo">
					   
					<?php
			      	$selectbed2 = "SELECT * FROM project WHERE projectype ='bedroom' ";
				  	$checkbed2 = mysqli_query($conn,$selectbed2);
				  	 $countbed2 = mysqli_num_rows($checkbed2);

				  	if($countbed2 == 0){
						
				    }
				    else
				    { 
				    	if($countbed2 > 4){
				    		$mycountbed2 = 4;
				    	}
				    	else{
				    		$mycountbed2 = $countbed2;
				    	}
				  		for ($b=1; $b<= $mycountbed2; $b++) {
				        $resultbed2=mysqli_fetch_assoc($checkbed2);
				        $pstrimbed2 = $resultbed2['projectimage'];
				        $tempbed2 = str_replace('../','',$pstrimbed2);
				        $alttempbed = str_replace('../projectimage/','', $pstrimbed2);
				        ?>
					    <div class="column">
					      <img class="demo2 cursor" src="<?php echo $tempbed2; ?>" onclick="currentSlide2(<?php echo $b; ?>)" alt="<?php echo $alttempbed; ?>">
					    </div>
					    <?php
						}
					}
					?>
					</div>
				  </div>
				</div>
				
				<!-- image modal end-->
				<P id="details2-head"></P>
				<p id="details2">
				This is AkinDavis P.O.P interior decoration some of design from our gallery of P.O.P designs for Bedroom which make your Bedroom look outstanding, we design to suit your taste and give  your Room the best of modern P.O.P design it can ever have. Call for our service today to turn your home into a palace. </p>
				<div class="scroll">
					<span class="pre" onclick="myprevious(this)" id="previous2">&#10094;</span>
					<span class="nxt" onclick="mynext(this)" id="next2">&#10095;</span>
				</div>
			</div>
		</div>

		<div class="parallax3" id="parallax3" titles="dining">
			<div class="content3" data-aos="">
				<div class="description"><span>Dining</span></div>

				<!-- image modal -->
				<div class="row" id="imagerow3">

				<?php
					$selectdin = "SELECT * FROM project WHERE projectype ='dining' ";
				  	$checkdin = mysqli_query($conn,$selectdin);
				  	 $countdin = mysqli_num_rows($checkdin);

				  	if($countdin == 0){
						
				    }
				    else
				    { 
				    	if($countdin > 4){
				    		$mycountdin = 4;
				    	}
				    	else{
				    		$mycountdin = $countdin;
				    	}
				      for ($c=1; $c<= $mycountdin; $c++) {
				        $resultdin=mysqli_fetch_assoc($checkdin);
				        $pstrimdin = $resultdin['projectimage'];
				        $tempdin = str_replace('../','',$pstrimdin);
				        ?>

				        <div class="column">
					  	<div class="imgcontainer">
						    <img src="<?php echo $tempdin; ?>" style="" onclick="openModal3();currentSlide3(<?php echo $c; ?>)" class="hover-shadow cursor">
						    <div class="text"  onclick="openModal3();currentSlide3(<?php echo $c; ?>)" ><p class="clicktoview fa fa-hand-o-up" style="font-size: 2vw;"></p>
								<i class="fa fa-refresh fa-spin"></i></div>
							</div>
						  </div>
						  <?php
				      }
				    }	
				?>

				</div>

				<div id="myModal3" class="modal">
					<div class="orderbtn">
						<input class="ordercart" type="submit" value="Order" style="display: none;">
					</div>
				  <span class="close cursor" id="closemodaldiv3" onclick="closeModal(this)">&times;</span>
				  <div class="modal-content" id="modal-content">

				  	<?php
		      	$selectdin1 = "SELECT * FROM project WHERE projectype ='dining' ";
			  	$checkdin1 = mysqli_query($conn,$selectdin1);
			  	 $countdin1 = mysqli_num_rows($checkdin1);

			  	if($countdin1 == 0){
					
			    }
			    else
			    { 
			    	if($countdin1 > 4){
				    		$mycountdin1 = 4;
				    	}
				    	else{
				    		$mycountdin1 = $countdin1;
				    	}
			  	  for ($d=1; $d<= $mycountdin1; $d++) {
			        $resultdin1=mysqli_fetch_assoc($checkdin1);
			        $pstrimdin1 = $resultdin1['projectimage'];
			        $propricedin = $resultdin1['projectprice'];
			        $prosndin = $resultdin1['sn'];
			        $prostardin = $resultdin1['star'];
			        $prouserdin = $resultdin1['user'];
			        if ($prouserdin == 0) {
			        	$proratedin = 0;	
			        }
			        else{
			        	$proratedin = round($prostardin/$prouserdin,1);
			        }
			
			        $prosn = $result1['sn'];
			        $tempdin1 = str_replace('../','',$pstrimdin1);
			        ?>
			  	
				    <div class="mySlides3">
				      <div class="numbertext">&#8358; <i id="numbertxtdn<?php echo $d; ?>"><?php echo $propricedin; ?></i>&#9585;m<sup>2</sup></div>
				      <img class="imgs" src="<?php echo $tempdin1; ?>" style="width:100%;">
				      <span id='norder'>
				      	<img src='img/mark.png' class='norder' value='Order' style='display:none;'>
				    	</span>
				      <div class="mytooltip" id="mytooltipd<?php echo $d; ?>">Click to Add to Cart & Pls Rate This Work</div>
				      <div id="likedn<?php echo $d; ?>" src="<?php echo $tempdin1; ?>" class="fa fa-cart-plus" onclick="like(this)"></div>

				      <!-- for star-->
				      <?php
				      	for ($y=1; $y <=5 ; $y++) { 
				      		?>
				      		<span id="<?php echo 'dining'.$prosndin.$y;?>" onmouseover="functionmv(this)" onclick="functionst(this)" class=" fa fa-star"></span>
				      		<?php
				      	}
				      	?>
					      
						  <small class="star" id="starc<?php echo $d; ?>"><?php echo $proratedin; ?></small>
						  <span class="lnr lnr-users" id="users<?php echo $d; ?>"></span>
						  <strong class="user" id="userc<?php echo $d; ?>"><?php echo $prouserdin; ?></strong>
				    </div>
				    
				  <?php
				  }
				}
				?> 
				    
				    <a class="previt" onclick="plusSlides3(-1)">&#10094;</a>
				    <a class="nextit" onclick="plusSlides3(1)">&#10095;</a>

				    <div class="caption-container">
				      <p id="caption3"></p>
				    </div>

				    <div id="mydemo">
					   
					<?php
			      	$selectdin2 = "SELECT * FROM project WHERE projectype ='dining' ";
				  	$checkdin2 = mysqli_query($conn,$selectdin2);
				  	 $countdin2 = mysqli_num_rows($checkdin2);

				  	if($countdin2 == 0){
						
				    }
				    else
				    { 
				    	if($countdin2 > 4){
				    		$mycountdin2 = 4;
				    	}
				    	else{
				    		$mycountdin2 = $countdin2;
				    	}
				  		for ($d=1; $d<= $mycountdin2; $d++) {
				        $resultdin2=mysqli_fetch_assoc($checkdin2);
				        $pstrimdin2 = $resultdin2['projectimage'];
				        $tempdin2 = str_replace('../','',$pstrimdin2);
				        $alttempdin = str_replace('../projectimage/','', $pstrimdin2);
				        ?>
					    <div class="column">
					      <img class="demo3 cursor" src="<?php echo $tempdin2; ?>" onclick="currentSlide3(<?php echo $d; ?>)" alt="<?php echo $alttempdin; ?>">
					    </div>
					    <?php
						}
					}
					?>
					</div>
				  </div>
				</div>
				
				<!-- image modal end-->
				
				<P id="details3-head"></P>
				<p id="details3">
					This is AkinDavis P.O.P interior decoration some of design from our gallery of available P.O.P designs for Dining room that make your dining look attractive, we design to suit your taste and give  your Dining the best of modern P.O.P design it deserve. Call for our service today to turn your home into a palace. 
				</p>
				<div class="scroll">
					<span class="pre" onclick="myprevious(this)" id="previous3">&#10094;</span>
					<span class="nxt" onclick="mynext(this)" id="next3">&#10095;</span>
				</div>
			</div>
		</div>

		<div class="parallax4" id="parallax4" titles="kitchen">
			<div class="content4" data-aos="">

				<div class="description"><span>Kitchen</span></div>

				<!-- image modal -->
				<div class="row" id="imagerow4">

				<?php
					$selectkin = "SELECT * FROM project WHERE projectype ='kitchen' ";
				  	$checkkin = mysqli_query($conn,$selectkin);
				  	 $countkin = mysqli_num_rows($checkkin);

				  	if($countkin == 0){
						
				    }
				    else
				    { 
				    	if($countkin > 4){
				    		$mycountkin = 4;
				    	}
				    	else{
				    		$mycountkin = $countkin;
				    	}
				      for ($e=1; $e<= $mycountkin; $e++) {
				        $resultkin=mysqli_fetch_assoc($checkkin);
				        $pstrimkin = $resultkin['projectimage'];
				        $tempkin = str_replace('../','',$pstrimkin);
				        ?>

				        <div class="column">
					  	<div class="imgcontainer">
						    <img src="<?php echo $tempkin; ?>" style="" onclick="openModal4();currentSlide4(<?php echo $e; ?>)" class="hover-shadow cursor">
						    <div class="text"  onclick="openModal4();currentSlide4(<?php echo $e; ?>)" ><p class="clicktoview fa fa-hand-o-up" style="font-size: 2vw;"></p>
								<i class="fa fa-refresh fa-spin"></i></div>
							</div>
						  </div>
						  <?php
				      }
				    }	
				?>

				</div>

				<div id="myModal4" class="modal">
					<div class="orderbtn">
						<input class="ordercart" type="submit" value="Order" style="display: none;">
					</div>
				  <span class="close cursor" id="closemodaldiv4" onclick="closeModal(this)">&times;</span>
				  <div class="modal-content" id="modal-content">


				  	<?php
		      	$selectkin1 = "SELECT * FROM project WHERE projectype ='kitchen' ";
			  	$checkkin1 = mysqli_query($conn,$selectkin1);
			  	 $countkin1 = mysqli_num_rows($checkkin1);

			  	if($countkin1 == 0){
					
			    }
			    else
			    { 
			    	if($countkin1 > 4){
			    		$mycountkin1 = 4;
			    	}
			    	else{
			    		$mycountkin1 = $countkin1;
			    	}
			  	  for ($f=1; $f<= $mycountkin1; $f++) {
			        $resultkin1=mysqli_fetch_assoc($checkkin1);
			        $pstrimkin1 = $resultkin1['projectimage'];
			        $propricekin = $resultkin1['projectprice'];
			        $prosnkin = $resultkin1['sn'];
			        $prostarkin = $resultkin1['star'];
			        $prouserkin = $resultkin1['user'];
			        if ($prouserkin == 0) {
			        	$proratekin = 0;	
			        }
			        else{
			        	$proratekin = round($prostarkin/$prouserkin,1);
			        }
			        
			        $prosn = $result1['sn'];
			        $tempkin1 = str_replace('../','',$pstrimkin1);
			        ?>
			  	
				    <div class="mySlides4">
				      <div class="numbertext">&#8358; <i id="numbertxtkt<?php echo $f; ?>"><?php echo $propricekin; ?></i>&#9585;m<sup>2</sup></div>
				      <img class="imgs" src="<?php echo $tempkin1; ?>" style="width:100%;">
				      <span id='norder'>
				      	<img src='img/mark.png' class='norder' value='Order' style='display:none;'>
				    	</span>
				      <div class="mytooltip" id="mytooltipk<?php echo $f; ?>">Click to Add to Cart & Pls Rate This Work</div>
				      <div id="likek<?php echo $f; ?>" src="<?php echo $tempkin1; ?>" class="fa fa-cart-plus" onclick="like(this)"></div>

				  		<!-- for star-->
				      <?php
				      	for ($z=1; $z <=5 ; $z++) { 
				      		?>
				      		<span id="<?php echo 'kitchen'.$prosnkin.$z;?>" onmouseover="functionmv(this)" onclick="functionst(this)" class=" fa fa-star"></span>
				      		<?php
				      	}
				      	?>
						  
						  <small class="star" id="stard<?php echo $f; ?>"><?php echo $proratekin; ?></small>
						  <span class="lnr lnr-users" id="users<?php echo $f; ?>"></span>
						  <strong class="user" id="userd<?php echo $f; ?>"><?php echo $prouserkin; ?></strong>
				    </div>
				    
				  <?php
				  }
				}
				?> 
				    
				    <a class="previt" onclick="plusSlides4(-1)">&#10094;</a>
				    <a class="nextit" onclick="plusSlides4(1)">&#10095;</a>

				    <div class="caption-container">
				      <p id="caption4"></p>
				    </div>

				    <div id="mydemo">
					   
					<?php
			      	$selectkin2 = "SELECT * FROM project WHERE projectype ='kitchen' ";
				  	$checkkin2 = mysqli_query($conn,$selectkin2);
				  	 $countkin2 = mysqli_num_rows($checkkin2);

				  	if($countkin2 == 0){
						
				    }
				    else
				    { 
				    	if($countkin2 > 4){
				    		$mycountkin2 = 4;
				    	}
				    	else{
				    		$mycountkin2 = $countkin2;
				    	}
				  		for ($g=1; $g<= $mycountkin2; $g++) {
				        $resultkin2=mysqli_fetch_assoc($checkkin2);
				        $pstrimkin2 = $resultkin2['projectimage'];
				        $tempkin2 = str_replace('../','',$pstrimkin2);
				        $alttempkin = str_replace('../projectimage/','', $pstrimkin2);
				        ?>
					    <div class="column">
					      <img class="demo4 cursor" src="<?php echo $tempkin2; ?>" onclick="currentSlide4(<?php echo $g; ?>)" alt="<?php echo $alttempkin; ?>">
					    </div>
					    <?php
						}
					}
					?>
					</div>
				  </div>
				</div>
				
				<!-- image modal end-->

				<P id="details4-head"></P>
				<p id="details4">
					This is AkinDavis P.O.P interior decoration some of design from our gallery of available P.O.P designs for Kitchen, we design to ensure its up to your taste and give  your Kitchen the best of modern P.O.P design it deserve. Call for our service today to turn your Kitchen into a palace.
				</p>
				<div class="scroll">
					<span class="pre" onclick="myprevious(this)" id="previous4">&#10094;</span>
					<span class="nxt" onclick="mynext(this)" id="next4">&#10095;</span>
				</div>
			</div>
		</div>

		<div class="parallax5" id="parallax5" titles="hall">
			<div class="content5" data-aos="">

				<div class="description"><span>Hall</span></div>

				<!-- image modal -->
				<div class="row" id="imagerow5">

				<?php
					$selecthall = "SELECT * FROM project WHERE projectype ='hall' ";
				  	$checkhall = mysqli_query($conn,$selecthall);
				  	 $counthall = mysqli_num_rows($checkhall);

				  	if($counthall == 0){
						
				    }
				    else
				    { 
				    	if($counthall > 4){
				    		$mycounthall = 4;
				    	}
				    	else{
				    		$mycounthall = $counthall;
				    	}
				      for ($h=1; $h<= $mycounthall; $h++) {
				        $resulthall=mysqli_fetch_assoc($checkhall);
				        $pstrimhall = $resulthall['projectimage'];
				        $temphall = str_replace('../','',$pstrimhall);
				        ?>

				        <div class="column">
					  	<div class="imgcontainer">
						    <img src="<?php echo $temphall; ?>" style="" onclick="openModal5();currentSlide5(<?php echo $h; ?>)" class="hover-shadow cursor">
						    <div class="text"  onclick="openModal5();currentSlide5(<?php echo $h; ?>)" ><p class="clicktoview fa fa-hand-o-up" style="font-size: 2vw;"></p>
								<i class="fa fa-refresh fa-spin"></i></div>
							</div>
						  </div>
						  <?php
				      }
				    }	
				?>

				</div>

				<div id="myModal5" class="modal">
					<div class="orderbtn">
						<input class="ordercart" type="submit" value="Order" style="display: none;">
					</div>
				  <span class="close cursor" id="closemodaldiv5" onclick="closeModal(this)">&times;</span>
				  <div class="modal-content" id="modal-content">


				  	<?php
		      	$selecthall1 = "SELECT * FROM project WHERE projectype ='hall' ";
			  	$checkhall1 = mysqli_query($conn,$selecthall1);
			  	 $counthall1 = mysqli_num_rows($checkhall1);

			  	if($counthall1 == 0){
					
			    }
			    else
			    { 
			    	if($counthall1 > 4){
			    		$mycounthall1 = 4;
			    	}
			    	else{
			    		$mycounthall1 = $counthall1;
			    	}
			  	  for ($k=1; $k<= $mycounthall1; $k++) {
			        $resulthall1=mysqli_fetch_assoc($checkhall1);
			        $pstrimhall1 = $resulthall1['projectimage'];
			        $propricehall1 = $resulthall1['projectprice'];
			        $prosnhall = $resulthall1['sn'];
			        $prostarhall = $resulthall1['star'];
			        $prouserhall = $resulthall1['user'];
			        if ($prouserhall == 0) {
			        	$proratehall = 0;	
			        }
			        else{
			        	 $proratehall = round($prostarhall/$prouserhall,1);
			        }
			       
			        $prosn = $result1['sn'];
			        $temphall1 = str_replace('../','',$pstrimhall1);
			        ?>
			  	
				    <div class="mySlides5">
				      <div class="numbertext">&#8358; <i id="numbertxth<?php echo $k; ?>"><?php echo $propricehall1; ?></i>&#9585;m<sup>2</sup></div>
				      <img class="imgs" src="<?php echo $temphall1; ?>" style="width:100%;">
				      <span id='norder'>
				      	<img src='img/mark.png' class='norder' value='Order' style='display:none;'>
				    	</span>
				      <div class="mytooltip" id="mytooltiph<?php echo $k; ?>">Click to Add to Cart & Pls Rate This Work</div>
				      <div id="likeh<?php echo $k; ?>" src="<?php echo $temphall1; ?>" class="fa fa-cart-plus" onclick="like(this)"></div>

				  		<!-- for star-->
				      <?php
				      	for ($v=1; $v <=5 ; $v++) { 
				      		?>
				      		<span id="<?php echo 'hall'.$prosnhall.$v;?>" onmouseover="functionmv(this)" onclick="functionst(this)" class=" fa fa-star"></span>
				      		<?php
				      	}
				      	?>
						  
						  <small class="star" id="stare<?php echo $k; ?>"><?php echo $proratehall; ?></small>
						  <span class="lnr lnr-users" id="users<?php echo $k; ?>"></span>
						  <strong class="user" id="usere<?php echo $k; ?>"><?php echo $prouserhall; ?></strong>
				    </div>
				    
				  <?php
				  }
				}
				?> 
				    
				    <a class="previt" onclick="plusSlides5(-1)">&#10094;</a>
				    <a class="nextit" onclick="plusSlides5(1)">&#10095;</a>

				    <div class="caption-container">
				      <p id="caption5"></p>
				    </div>

				    <div id="mydemo">
					   
					<?php
			      	$selecthall2 = "SELECT * FROM project WHERE projectype ='hall' ";
				  	$checkhall2 = mysqli_query($conn,$selecthall2);
				  	 $counthall2 = mysqli_num_rows($checkhall2);

				  	if($counthall2 == 0){
						
				    }
				    else
				    { 
				    	if($counthall2 > 4){
				    		$mycounthall2 = 4;
				    	}
				    	else{
				    		$mycounthall2 = $counthall2;
				    	}
				  		for ($l=1; $l<= $mycounthall2; $l++) {
				        $resulthall2=mysqli_fetch_assoc($checkhall2);
				        $pstrimhall2 = $resulthall2['projectimage'];
				        $temphall2 = str_replace('../','',$pstrimhall2);
				        $alttemphall = str_replace('../projectimage/','', $pstrimhall2);
				        ?>
					    <div class="column">
					      <img class="demo5 cursor" src="<?php echo $temphall2; ?>" onclick="currentSlide5(<?php echo $l; ?>)" alt="<?php echo $alttemphall; ?>">
					    </div>
					    <?php
						}
					}
					?>
					</div>
				  </div>
				</div>

				<!-- image modal end-->

				<P id="details5-head"></P>
				<p id="details5">
					This is AkinDavis P.O.P interior decoration some of design from our gallery of available P.O.P designs for Halls, Churches, mosques and many more that make them look attractive and exceptional, we design to suit your taste and give  your Hall the best of modern P.O.P design it deserve. Call for our service today to turn your home into a palace.
				</p>
				<div class="scroll">
					<span class="pre" onclick="myprevious(this)" id="previous5">&#10094;</span>
					<span class="nxt" onclick="mynext(this)" id="next5">&#10095;</span>
				</div>
			</div>
		</div>

		<div class="parallax6" id="parallax6" titles="other">
			<div class="content6" data-aos="">

				<div class="description"><span>Other Design</span></div>

				<!-- image modal -->
				<div class="row" id="imagerow6">

				<?php
					$selectother = "SELECT * FROM project WHERE projectype ='other' ";
				  	$checkother = mysqli_query($conn,$selectother);
				  	 $countother = mysqli_num_rows($checkother);

				  	if($countother == 0){
						
				    }
				    else
				    { 
				    	if($countother > 4){
				    		$mycountother = 4;
				    	}
				    	else{
				    		$mycountother = $countother;
				    	}
				      for ($m=1; $m<= $mycountother; $m++) {
				        $resultother=mysqli_fetch_assoc($checkother);
				        $pstrimother = $resultother['projectimage'];
				        $tempother = str_replace('../','',$pstrimother);
				        ?>

				        <div class="column">
					  	<div class="imgcontainer">
						    <img src="<?php echo $tempother; ?>" style="" onclick="openModal6();currentSlide6(<?php echo $m; ?>)" class="hover-shadow cursor">
						    <div class="text"  onclick="openModal6();currentSlide6(<?php echo $m; ?>)" ><p class="clicktoview fa fa-hand-o-up" style="font-size: 2vw;"></p>
								<i class="fa fa-refresh fa-spin"></i></div>
							</div>
						  </div>
						  <?php
				      }
				    }	
				?>

				</div>

				<div id="myModal6" class="modal">
					<div class="orderbtn">
						<input class="ordercart" type="submit" value="Order" style="display: none;">
					</div>
				  <span class="close cursor" id="closemodaldiv6" onclick="closeModal(this)">&times;</span>
				  <div class="modal-content" id="modal-content">


				  	<?php
		      	$selectother1 = "SELECT * FROM project WHERE projectype ='other' ";
			  	$checkother1 = mysqli_query($conn,$selectother1);
			  	 $countother1 = mysqli_num_rows($checkother1);

			  	if($countother1 == 0){
					
			    }
			    else
			    { 
			    	if($countother1 > 4){
			    		$mycountother1 = 4;
			    	}
			    	else{
			    		$mycountother1 = $countother1;
			    	}
			  	  for ($n=1; $n<= $mycountother1; $n++) {
			        $resultother1=mysqli_fetch_assoc($checkother1);
			        $pstrimother1 = $resultother1['projectimage'];
			        $propriceother1 = $resultother1['projectprice'];
			        $prosnother = $resultother1['sn'];
			        $prostarother = $resultother1['star'];
			        $prouserother = $resultother1['user'];
			        if ($prouserother == 0) {
			        	$prorateother = 0;	
			        }
			        else{
			        	$prorateother = round($prostarother/$prouserother,1);
			        }
			       
			        $prosn = $result1['sn'];
			        $tempother1 = str_replace('../','',$pstrimother1);
			        ?>
			  	
				    <div class="mySlides6">
				      <div class="numbertext">&#8358; <i id="numbertxtot<?php echo $n; ?>"><?php echo $propricehall1; ?></i>&#9585;m<sup>2</sup></div>
				      <img class="imgs" src="<?php echo $tempother1; ?>" style="width:100%;">
				      <span id='norder'>
				      	<img src='img/mark.png' class='norder' value='Order' style='display:none;'>
				    	</span>
				      <div class="mytooltip" id="mytooltipot<?php echo $n; ?>">Click to Add to Cart & Pls Rate This Work</div>
				      <div id="likeo<?php echo $n; ?>" src="<?php echo $tempother1; ?>" class="fa fa-cart-plus" onclick="like(this)"></div>

				  		<!-- for star-->
				      <?php
				      	for ($u=1; $u <=5 ; $u++) { 
				      		?>
				      		<span id="<?php echo 'other'.$prosnother.$u;?>" onmouseover="functionmv(this)" onclick="functionst(this)" class=" fa fa-star"></span>
				      		<?php
				      	}
				      	?>
						  
						  <small class="star" id="starf<?php echo $n; ?>"><?php echo $prorateother; ?></small>
						  <span class="lnr lnr-users" id="users<?php echo $n; ?>"></span>
						  <strong class="user" id="userf<?php echo $n; ?>"><?php echo $prorateother; ?></strong>
				    </div>
				    
				  <?php
				  }
				}
				?> 
				    
				    <a class="previt" onclick="plusSlides6(-1)">&#10094;</a>
				    <a class="nextit" onclick="plusSlides6(1)">&#10095;</a>

				    <div class="caption-container">
				      <p id="caption6"></p>
				    </div>

				    <div id="mydemo">
					   
					<?php
			      	$selectother2 = "SELECT * FROM project WHERE projectype ='other' ";
				  	$checkother2 = mysqli_query($conn,$selectother2);
				  	 $countother2 = mysqli_num_rows($checkother2);

				  	if($countother2 == 0){
						
				    }
				    else
				    { 
				    	if($countother2 > 4){
				    		$mycountother2 = 4;
				    	}
				    	else{
				    		$mycountother2 = $countother2;
				    	}
				  		for ($p=1; $p<= $mycountother2; $p++) {
				        $resultother2=mysqli_fetch_assoc($checkother2);
				        $pstrimother2 = $resultother2['projectimage'];
				        $tempother2 = str_replace('../','',$pstrimother2);
				        $alttempother = str_replace('../projectimage/','', $pstrimother2);
				        ?>
					    <div class="column">
					      <img class="demo6 cursor" src="<?php echo $tempother2; ?>" onclick="currentSlide5(<?php echo $p; ?>)" alt="<?php echo $alttempother; ?>">
					    </div>
					    <?php
						}
					}
					?>
					</div>
				  </div>
				</div>

				<!-- image modal end-->
				
				<P id="details6-head"></P>
				<p id="details6">
					This is AkinDavis P.O.P interior decoration some of design from our gallery of available P.O.P designs for Offices, Malls, Bars and many more that make them look attractive and exceptional, we design to suit your taste and give  your Office the best of modern P.O.P design it deserve. Call for our service today to turn your home into a palace.
				</p>
				<div class="scroll">
					<span class="pre" onclick="myprevious(this)" id="previous6">&#10094;</span>
					<span class="nxt" onclick="mynext(this)" id="next6">&#10095;</span>
				</div>
			</div>
		</div>
	</div>

	<?php include "order.php"; ?>
	<?php include ("footer.php"); ?>

</body>
</html>
<script type="text/javascript" src="script/main.js"></script>
<script type="text/javascript" src="script/order.js"></script>
<script type="text/javascript">

	$("#imagerow,#imagerow2,#imagerow3,#imagerow4,#imagerow5,#imagerow6").click(function(){
		document.getElementById("inforow").style.zIndex = "-999";
	})

	$(document).ready(function(){
		$(".fa-cart-plus").hover(function(){
			$(".mytooltip").fadeIn(500);
		}, 
		function(){
			$(".mytooltip").fadeOut(500);
		});
	});

	setInterval(function(){
		$(".fa-hand-o-up").fadeOut(1000);
		$(".fa-hand-o-up").fadeIn(1000);
	},1000);

	$(".ordercart").click(function(){
		/* this lines of code holds d value of image
		 	   selected and send it to selectedimg page */
		if (count == 0){
		} else{
			var mySelect = imgsrc2;
			$.ajax({
				url: "selectedImg.php",
				method: "GET",
				data: {mySelt:mySelect},
				success: function (data) {
					//document.getElementById("imgsrc").src = data;
					document.getElementById("projecta2").value = data;
				}
			});

			var myAmount = imguse;
			$.ajax({
				url: "price.php",
				method: "GET",
				data: {myAmnt:myAmount},
				success: function (allamnt) {
					//alert(data);
					//document.getElementById("amntbox").src = allamnt;
				}
			});

			var mySelectimg = imgall;
			$.ajax({
				url: "selectedallimg.php",
				method: "GET",
				data: {mySeltimg:mySelectimg},
				success: function (allsimg) {

				    document.getElementById("images").value = allsimg;
			        var myStr = allsimg;
	                var stArray = myStr.split(" ");
	     
	                for (var i = 0; i < stArray.length-1; i++) {
	                   if (stArray.length-1 < 5) {
	                       $('<img />')
	                       .attr('src',stArray[i])
	                       .attr('class','appendim')
	                       .css('margin','2px')
	                       .appendTo($('#imgpreview'));
	                    }
		                    else {
	                       $('#imgpreview').css({'overflow-y':'scroll','height':'85px'});
	                       $('<img />')
	                       .attr('src',stArray[i])
	                       .css('margin','2px')
	                       .width('80px').height('80px')
	                      .appendTo($('#imgpreview'));
	                    }
	                }
		 		}
			
			});

			var mytAmount = amnt;
			$.ajax({
				url: "amnt.php",
				method: "GET",
				data: {mytAmnt:mytAmount},
				success: function (tmnt) {
					//alert(tmnt);
					document.getElementById("amount").value = tmnt;
				}
			});

			document.getElementById("mycontainer").style.overflow = "visible";
			$('#order').trigger('click');
			$(".ordercart").css('display','none');
			$(".cursor").css('display','none');
		}
	})

	function functionmv(a){
		
		var rst = $(a).attr("id");
		rst2 = rst.slice(-1);
		rstlen = rst.length-1
		rst3 = rst.slice(0, rstlen);
		
		/*for(var j= 1; j <=5; j++){ 

			var cl = document.getElementById(rst3 + j)
            cl.style.color = "#fff"
            cl.style.transition = ".2s"
		}
		
		for (var i = 1; i <= rst2; i++) {
		    var rst4 = document.getElementById(rst3 + i)
            rst4.style.color = "orange"
            rst4.style.transition = ".2s"
        }*/
	}	

	function functionst(b){
		var rst = $(b).attr("id");
		var rstparent = $(b).parents('div');
		var rstimg = $(rstparent).children('img')[0];
		var rstsrc = $(rstimg).attr('src');
		var newsrc = '../'+rstsrc
		var smallel = $(rstparent).children('small');
		var smallid = $(smallel).attr('id');
		var strongel = $(rstparent).children('strong');
		var strongid = $(strongel).attr('id');

		rst2 = rst.slice(-1);
		rstlen = rst.length-1
		rst3 = rst.slice(0, rstlen);
		
		for(var j= 1; j <=5; j++){
			var cl = document.getElementById(rst3 + j)
            cl.style.color = "#fff"
            cl.style.transition = ".2s"
		}
		
		for (var i = 1; i <= rst2; i++) {
		    var rst4 = document.getElementById(rst3 + i)
            rst4.style.color = "orange"
            rst4.style.transition = ".2s"
		}

		var star = rst2;
		var stimg = newsrc;
		$.ajax({
			url: "star.php",
			method: "GET",
			data: {mypstar:star,myimg:stimg},
			success: function (srate) {
				//alert(srate);
				//var processrst = srate;
				var processrst = srate.split(" ");
			document.getElementById(strongid).innerHTML = processrst[0];

				document.getElementById(smallid).innerHTML = processrst[1];
				//document.getElementById(strongid).innerHTML = sumsr;

			}
		});
		
	}

	/* for next*/
	var i = 0;
	function mynext(z){
	    imgnxt = $(z).attr("id");
	    nxtparent = $(z).parents("div");
	    getprvelement = $(nxtparent).children("span").first();
	    getprvid = getprvelement.attr("id");
	    nxtgrndp = nxtparent.parents("div");
	    nxtggrndp = nxtgrndp.parents("div")
	    nxtid = nxtggrndp.attr("id");
	    imgnxtelmnt = document.getElementById(nxtid);
	    nxtptitle = nxtggrndp.attr("titles");
	    $(getprvelement).css("visibility", "visible");
	   
	    var bgimg = nxtptitle;
		$.ajax({
			url: "bgimage.php",
			method: "GET",
			data: {mybgimg:bgimg},
			success: function (bgimages) {
				var splitimg = bgimages.split(" ")
				var countrw = bgimages.slice(-1)
				
		    	imgnxtelmnt.style.transition = "1.3s";	
		    	if(i < countrw-1){
		    		i++;
		    		imgnxtelmnt.style.backgroundImage = "url(" + splitimg[i] + ")";
		    		setTimeout(function(){
		    		}, 500);
		       	}
		    	if(i == countrw-1){
		    		$(z).css("visibility", "hidden");
		    		imgnxtelmnt.style.backgroundImage = "url(" + splitimg[i] + ")";
		    		setTimeout(function(){
		    		}, 500);
		    	}
		    	else{}

		    	if(i > countrw-1){
		    		i = countrw-1
		    		$(z).css("visibility", "hidden");
		    		imgnxtelmnt.style.backgroundImage = "url(" + splitimg[i] + ")";
		    		setTimeout(function(){
		    		}, 500);
		    	}
		    	else{}
			}
		});
	}
  
    function myprevious(y){
    	imgnxt = $(y).attr("id");
	    nxtparent = $(y).parents("div");
	    getprvelement = $(nxtparent).children("span").last();
	    getprvid2 = getprvelement.attr("id");
	    nxtgrndp = nxtparent.parents("div");
	    nxtggrndp = nxtgrndp.parents("div")
	    nxtid = nxtggrndp.attr("id");
	    imgnxtelmnt = document.getElementById(nxtid);
	    nxtptitle = nxtggrndp.attr("titles");
	  	$(getprvelement).css("visibility", "visible");

	    var bgimg = nxtptitle;
		$.ajax({
			url: "bgimage.php",
			method: "GET",
			data: {mybgimg:bgimg},
			success: function (bgimages) {
				var splitimg = bgimages.split(" ")
				var countrw = bgimages.slice(-1)

		    	if(i < countrw){
		    		i--;
		    		imgnxtelmnt.style.backgroundImage = "url(" + splitimg[i] + ")";
		    		setTimeout(function(){
		    		}, 500);	
		    	}
		    	if(i < 0){
		    		i++;
		    		imgnxtelmnt.style.backgroundImage = "url(" + splitimg[i] + ")";
		    		setTimeout(function(){
		    		}, 500);
		    	}
		    	if(i > countrw){
		    		i = countrw-1;
		    		imgnxtelmnt.style.backgroundImage = "url(" + splitimg[i] + ")";
		    		setTimeout(function(){
		    		}, 500);
		    	}
		    	else{}

		    	if(i == 0){
		    		$(y).css("visibility", "hidden");
		    	}
		    	else{}	
		    }
	    });
	}

</script>

<script src="script/aos.js"></script><!-- //animation effects-js-->
<script src="script/aos1.js"></script>