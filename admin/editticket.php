<?php
require "../conn.php";

// define variables and set to empty value

		$firstname = $lastname = $email = $address = $phone = "";
		$msg = $passmsg = $msgfill = $existmsg = $msgwrong = $sucessupd = $oldpassword = $sucessupd= $pchange = "";

	$email = $phone = $takeoff = $destination = $departuretime = $departureday = $departureweek = $noofpassenger = $distance = $hours = $perpassenger = $ticketno = $amount = $empty = "";
	
	$msg = $msgsuccess = $msgfill = "";

	session_start();
	if (!isset($_SESSION['adminemail'])) {
		# code...\
		echo '<script> window.location="login.php";</script>';
	}
	else{
		require "autolog.php";
		$nomsg = "";
		?>
		<?php 

		//to filter all the input data
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
			
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$departureday = test_input($_POST['departureday']);
			$departureweek = test_input($_POST['departureweek']);
			$car = test_input($_POST['cars']);
			$amount = $_POST['amount'];
			$ticketno = $_POST['ticketno'];

		  	//to get the date of departure
			if($departureday == 'monday' && $departureweek == "1week"){
				$d1=strtotime("next Monday");
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'monday' && $departureweek == "2weeks"){
				$d = strtotime("Monday");
				$d1=strtotime("+2 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'monday' && $departureweek == "3weeks"){
				$d = strtotime("Monday");
				$d1=strtotime("+3 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'monday' && $departureweek == "4weeks"){
				$d = strtotime("Monday");
				$d1=strtotime("+4 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'monday' && $departureweek == "5weeks"){
				$d = strtotime("Monday");
				$d1=strtotime("+5 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'monday' && $departureweek == "6weeks"){
				$d = strtotime("Monday");
				$d1=strtotime("+6 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'tuesday' && $departureweek == "1week"){
				$d1=strtotime("next Tuesday");
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'tuesday' && $departureweek == "2weeks"){
				$d = strtotime("Tuesday");
				$d1=strtotime("+2 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'tuesday' && $departureweek == "3weeks"){
				$d = strtotime("Tuesday");
				$d1=strtotime("+3 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'tuesday' && $departureweek == "4weeks"){
				$d = strtotime("Tuesday");
				$d1=strtotime("+4 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'tuesday' && $departureweek == "5weeks"){
				$d = strtotime("Tuesday");
				$d1=strtotime("+5 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'tuesday' && $departureweek == "6weeks"){
				$d = strtotime("Tuesday");
				$d1=strtotime("+6 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;	
			}

			if($departureday == 'wednesday' && $departureweek == "1week"){
				$d1=strtotime("next Wednesday");
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'wednesday' && $departureweek == "2weeks"){
				$d = strtotime("Wednesday");
				$d1=strtotime("+2 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'wednesday' && $departureweek == "3weeks"){
				$d = strtotime("Wednesday");
				$d1=strtotime("+3 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'wednesday' && $departureweek == "4weeks"){
				$d = strtotime("Wednesday");
				$d1=strtotime("+4 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'wednesday' && $departureweek == "5weeks"){
				$d = strtotime("Wednesday");
				$d1=strtotime("+5 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'wednesday' && $departureweek == "6weeks"){
				$d = strtotime("Wednesday");
				$d1=strtotime("+6 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'thursday' && $departureweek == "1week"){
				$d1=strtotime("next Thursday");
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'thursday' && $departureweek == "2weeks"){
				$d = strtotime("Thursday");
				$d1=strtotime("+2 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'thursday' && $departureweek == "3weeks"){
				$d = strtotime("Thursday");
				$d1=strtotime("+3 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'thursday' && $departureweek == "4weeks"){
				$d = strtotime("Thursday");
				$d1=strtotime("+4 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'thursday' && $departureweek == "5weeks"){
				$d = strtotime("Thursday");
				$d1=strtotime("+5 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'thursday' && $departureweek == "6weeks"){
				$d = strtotime("Thursday");
				$d1=strtotime("+6 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;	
			}
			
			if($departureday == 'friday' && $departureweek == "1week"){
				$d1=strtotime("next Friday");
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'friday' && $departureweek == "2weeks"){
				$d = strtotime("Friday");
				$d1=strtotime("+2 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'friday' && $departureweek == "3weeks"){
				$d = strtotime("Friday");
				$d1=strtotime("+3 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'friday' && $departureweek == "4weeks"){
				$d = strtotime("Friday");
				$d1=strtotime("+4 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'friday' && $departureweek == "5weeks"){
				$d = strtotime("Friday");
				$d1=strtotime("+5 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'friday' && $departureweek == "6weeks"){
				$d = strtotime("Friday");
				$d1=strtotime("+6 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;	
			}

			if($departureday == 'saturday' && $departureweek == "1week"){
				$d1=strtotime("next Saturday");
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'saturday' && $departureweek == "2weeks"){
				$d = strtotime("Saturday");
				$d1=strtotime("+2 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'saturday' && $departureweek == "3weeks"){
				$d = strtotime("Saturday");
				$d1=strtotime("+3 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'saturday' && $departureweek == "4weeks"){
				$d = strtotime("Saturday");
				$d1=strtotime("+4 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'saturday' && $departureweek == "5weeks"){
				$d = strtotime("Saturday");
				$d1=strtotime("+5 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;
			}

			if($departureday == 'saturday' && $departureweek == "6weeks"){
				$d = strtotime("Saturday");
				$d1=strtotime("+6 weeks",$d );
				$departuredate = date("d-m-Y", $d1) ;	
			}

			if($car =="" || $amount ==""){
				$empty = "Pls Select a Car";
				$car = $amount = "";
			}
			else{

			#checking ticket already exist
			$chck = "SELECT * FROM tblbookticket WHERE car ='$car' AND  departuredate = '$departuredate' AND amount = '$amount' ";
			$validate = mysqli_query($conn, $chck);
			if (mysqli_num_rows($validate)>0) {
				?>
			  	<script type="text/javascript">alert("This car has been book for that day, edit the ticket again or book a different car");
			  		window.location ="activeticket.php";
			  	</script>
			  	<?php
			}
			else{
				$update = "UPDATE tblbookticket SET departureweek = '$departureweek', departureday = '$departureday', departuredate = '$departuredate',  amount = '$amount', car= '$car' WHERE ticketno ='$ticketno' ";
				$result = mysqli_query($conn, $update);
				if ($result) {
					echo '<script> alert("ticket successfully update");
					window.location="activeticket.php"; </script>';
				}
				else{
					echo "error in editing this ticket";
					
				}
			}
		}
		}
	}
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
	<link rel="stylesheet" type="text/css" href="editbus.css">
	<link rel="stylesheet" type="text/css" href="toggle.css">
	<script type="text/javascript" src="bootstrapnew/js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrapnew/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{background-image: url("../img/paper.gif");}
		div tr td a>button{margin: 5px 2px;}
		table, tr>th{text-align: center;}
		tr>th{text-transform: uppercase;}

		#form{
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
	</style>
</head>
<body>
	
		<?php 
	   // to fetch out name,address and phone
		 	
		$get_id = $_GET['id'];
		$select = mysqli_query($conn, "SELECT * FROM tblbookticket WHERE id = '$get_id' ");
		if ($select) {
			while ($result=mysqli_fetch_array($select)){
				$amount = $result['amount'];
				$car = $result['car'];
				$departureday = $result['departureday'];
				$departuredate = $result['departuredate'];
				$departureweek = $result['departureweek'];
				$id = $result['id'];	
				$ticketno = $result['ticketno'];	
			}
		}

		?>

		<div class="container">
		   	<div class="row" style="margin: 10px 0 4%;">
		   	 	<div class="form col-md-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="form" style="padding: 0px 10px 10px;">
		   	 		<div class="legend">
			   	 		<div class="rowss">
			   	 			<div style=" display: flex; justify-content: center; align-items: center;">
							<p style="font-size: 23px; color: #33cc33;"><?php echo $msgsuccess;?></p>
							</div>
							<div style="display: flex; justify-content: center; align-items: center;">
								<p style="font-size: 23px; color:  #ff1a1a;"><?php echo $msg; echo $msgfill; ?></p>
							</div>
		   	 				<legend class="bill">EDIT TICKET</legend>
		   	 			</div>
		   	 			
		   	 			<div style=" margin-top: 20px; display: flex; justify-content: center; align-items: center;">
							<p style="font-size: 18px; color: red;"><?php echo $existmsg; ?></p>
						</div>
			   	 	    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

				   	 		<div class="col-md-12 col-sm-12 col-xs-12 formcontainer">
				   	 			<div class="rows">
				   	 			    <label for="id">ID :</label>
				   	 			    <input type="text" name="id" value="<?php echo $id; ?>" readonly id="id">
				   	 		    </div>
				   	 			<div class="rows">
			   	 			    <label for="FROM">CAR:</label>
			   	 			    <?php
			   	 			    	$selectcar = mysqli_query($conn, "select * from tbladdcar");
			   	 			    	$numrow = mysqli_num_rows($selectcar);
			   	 			    	if ($numrow == 0) {
			   	 			    	}
			   	 			    	else{
			   	 			    		?>
			   	 			    		 <select id="car" name="cars">
			   	 			    		 	<option value="<?php echo $car ?>"><?php echo $car; ?></option>

			   	 			    		<?php
			   	 			    		$myoutput = '';
			   	 			    		for ($i=1; $i <=$numrow; $i++) { 
			   	 			    			$carresult = mysqli_fetch_assoc($selectcar);
			   	 			    			$carname = $carresult['carname'];
			   	 			    			$carID = $carresult['id'];
			   	 			    			echo "$carID"; 
			   	 			    			$myoutput .= '
			   	 			    			<option class="myCID" onclick="showID()" id="'.$carID.'" value="'.$carname.'">'.$carname.'</option>
			   	 			    			';
			   	 			    		 
			   	 			    		} 
			   	 			    		echo "$myoutput";
			   	 			    		?>
			   	 			    		<input type="hidden" name="" id="selectedID">
			   	 			    	</select> 

			   	 		    </div>
			   	 		   
								<input type="hidden" id="carImg" name=""> 

			   	 		<?php
			   	 		}	
			   	 		?>    	
					   	 		<div class="rows">
				   	 			  <label for="day">PICK-UP DAY :</label>
				   	 			  <select name="departureday">
				   	 			  	<option value="<?php echo $departureday; ?>"><?php echo $departureday; ?></option>
				   	 			  	<option value="monday">Monday</option>
				   	 			  	<option value="tuesday">Tuesday</option>
				   	 			  	<option value="wednesday">Wednesday</option>
				   	 			  	<option value="thursday">Thursday</option>
				   	 			  	<option value="friday">Friday</option>
				   	 			  	<option value="saturday">Saturday</option>
				   	 			  </select>
				   	 			</div>
				   	 			<div class="rows">
				   	 			  <label for="day">PICK-UP WEEK :</label>
				   	 			  <select name="departureweek">
				   	 			  	<option  value ="<?php echo $departureweek; ?>"><?php echo $departureweek; ?></option>
				   	 			  	<option value="1week">Next Week</option>
				   	 			  	<option value="2weeks">2 Weeks</option>
				   	 			  	<option value="3weeks">3 Weeks</option>
				   	 			  	<option value="4weeks">4 Weeks</option>
				   	 			  </select>
					   	 		</div>

					   	 		<div class="rows" id="amount">
									<label for="amount">TOTAL AMOUNT :</label>
									<input id="carInfo" name="amount" placeholder="for output only" required="" readonly="">
								</div>
								  								  
								<div class="rows">
								  <label for="ticket">TICKET NO   :</label>
								  <input id="ticket" name="ticketno" placeholder="for output only" readonly="" value="<?php echo $ticketno; ?>">
								</div>
							</div>

							<div class="row ticketcontainer">
								<div class="col-md-12 col-sm-12 col-xs-12 ticket">

				   	 		    	<div class="ticketbtn" onclick="submit()" style="width: 180px; margin: 10px auto;" >
					   	 			   <input type="submit" name="submit" class="btn btn-link mybtn carsname" value="BOOK TICKET">
					   	 			</div>
					   	 		</div>
				   	 		</div>
		   	 	    	</form>
		   	 	    </div>
		   	 	</div>
		   	</div>
		</div>
		<?php 
			include "adminfooter.php"; 
		?>

	</div>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>
<script type="text/javascript">

	//to get car value for price and image proccessing
		$(document).ready(function() {
			var getID = $("#car").val();
			$('#selectedID').val(getID);
			
			//send the selected car name to getCarImg.php and load its 
			//image in the database
			var getCarID = $('#selectedID').val();
			$.ajax({
				url: "getCarImage.php",
				method: "POST",
				data: {getCImg:getCarID},
				success: function (data) { 
					//alert(data);
					//$('#carImg').val(data);
					var imgs = data;
					//var imgs1 = imgs.slice(3);
					//var imgs2 = imgs1.replace(/ /g, "");
					
					//alert(imgs2);		
					backgd = document.getElementById("form");
					backgd.style.transition = "1s";
					backgd.style.backgroundImage = "url(" + imgs + ")";

					if(data == ""){

						backgd.style.backgroundImage = "url('../audinew.jpg')";
					}
				}
			});
		//});

		//$('.carsname').click(function () {

			//get selected car name
			//var getCarID = $('#selectedID').val();
			//send the selected car name to getCarInfo.php and load its 
			//Information
			$.ajax({
				url: "getCarInfo.php",
				method: "POST",
				data: {getCInfo:getCarID},
				success: function (data) { 
					$('#carInfo').val(data);
					
					if(data == ""){
						backgd.style.backgroundImage = "url('../img/audinew.jpg')";
					}
				}
			});
			
		});


//to get car value for price and image proccessing
		$('#car').change(function() {
			var getID = $(this).val();
			$('#selectedID').val(getID);

			//send the selected car name to getCarImg.php and load its 
			//image in the database
			var getCarID = $('#selectedID').val();
			$.ajax({
				url: "getCarImage.php",
				method: "POST",
				data: {getCImg:getCarID},
				success: function (data) { 
					//alert(data);
					//$('#carImg').val(data);
					var imgs = data;
					//var imgs1 = imgs.slice(3);
					//var imgs2 = imgs1.replace(/ /g, "");
					
					//alert(imgs2);		
					backgd = document.getElementById("form");
					backgd.style.transition = "1s";
					backgd.style.backgroundImage = "url(" + imgs + ")";

					if(data == ""){
						backgd.style.backgroundImage = "url('../img/audinew.jpg')";
					}
				}
			});
		//});

		//$('.carsname').click(function () {

			//get selected car name
			//var getCarID = $('#selectedID').val();
			//send the selected car name to getCarInfo.php and load its 
			//Information
			$.ajax({
				url: "getCarInfo.php",
				method: "POST",
				data: {getCInfo:getCarID},
				success: function (data) { 
					$('#carInfo').val(data);
					
					if(data == ""){
						backgd.style.backgroundImage = "url('../img/audinew.jpg')";
					}
				}
			});
			
		});

		$('.carsname').click(function () {
			var getCarID = $("#selectedID").val();

			$.ajax({
				url: "getCarInfo.php",
				method: "POST",
				data: {getCInfo:getCarID},
				success: function (data) { 
					$('#carInfo').val(data);
					
					if(data == ""){
						document.getElementById('car').value = "";
						alert('pls select the car you wanna edit and try again');
						window.location='activeticket.php';
					}
				}
			});
		});

	</script>
<!--script type="text/javascript" src="editticket.js"></script-->
<style>
	 btn-link:focus, .btn-link:hover {
    text-decoration: none;
    background-color: transparent;
   color:steelblue; 
      outline: 1px solid #fff; 
      transition: 1s ease;}
    /*media query */

@media screen and (max-width: 620px){
.rows input, .rows select{width: 80%;}
.rows{display: block;}
}
@media screen and (max-width: 520px){
	.rows input, .rows select{width: 104%; margin: auto ; text-overflow: ellipsis;}
	.formcontainer{padding-left: unset;}
}
</style>