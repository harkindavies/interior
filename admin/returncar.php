<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
}
$nomsg = $pickyes = $returnyes = "";
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
	<script type="text/javascript" src="../bootstrapnew/js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrapnew/js/bootstrap.min.js"></script>
	<style type="text/css">
		/*body{background-image: url("../img/paper.gif");}*/
		div tr td a>button{margin: 5px 2px;}
		table, tr>th{text-align: center;}
		div>table{ font-size:; background-color: rgba(101,101,50,.2);}
		tr>th{text-transform: uppercase;}
		td{text-transform: capitalize;}
		td:nth-child(7){text-transform: unset;}
		div .capcontainer{font-size: 2.3em; text-align: center; margin: 20px 0 -20px;}
	</style>
</head>
<body style="background-color: #ddd;">
	<div class="linecontainer" style="position: fixed;z-index: 1;">
  		<div class="topimage">
	   	  	     <img class="footerimg" src="../img/newheaderlogo2.png" alt="no image found" width="80px" height="80px" style="margin-top: 5px;">
	   	  	</div>
		<div class="line">
			<ol class="linecontent">
				<li class="other"><a href="../index.php" onclick="return confirm('Are you sure you want to leave the admin page and go to Memak home page?')" title="Goto Memak Homepage">Home</a></li>
				
			    <li>
		            <div class="dropdown active">
		                <button class="dropdown-toggle activedrp active" type="button" data-toggle="dropdown">View Ticket
		                <span class="caret activecaret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                  <li><a href="viewallticket.php">View All Ticket</a></li>
		                  <li><a href="activeticket.php">View Active Ticket</a></li>
		                  <li><a href="availablecar.php">Car Gallery</a></li>
		                  <li><a href="registeredcustomer.php">View Customer</a></li>

		                  <li onmouseleave="clickme()"><div id="a" onmouseover="clickm()" class="active "> On Board Car <span class="active fa fa-caret-right" style="margin-left: 10px;"></span></div>
		                  	<ul class="pickrent" id="pickrent" onmouseleave="leaveme()"  onmouseover="leavem()">
		                  	<li><a href="pickcar.php">Await Picking Cars</a></li>
		                  	<li><a class="line active" href="returncar.php">Await Return Cars</a></li>
		                  </ul>
		                  </li>
		                </ul>
		            </div>
		        </li>

		        <li>
		            <div class="dropdown">
		                <button class="dropdown-toggle activedrp" type="button" data-toggle="dropdown">Admin
		                <span class="caret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                  <li><a href="addadmin.php">New Admin</a></li>
		                  <li><a href="changepassword.php">Change Password</a></li>
		                  <li><a href="viewadmin.php">View Admin</a></li>
		                  <li><a href="addcar.php">Add New Car</a></li>
			            </ul>
			        </div>
			    </li>
					
				<li>
					<div class="dropdown">
						 <button class="dropdown-toggle activedrp" type="button" data-toggle="dropdown">Messages
		                <span class="caret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                	<li><a href="helpmessage.php">Help Request</a></li>
		                	<li><a href="messages.php">Message</a></li>
		                </ul>
					</div>
				</li>
				<li class="other"><a href="logout.php">Logout</a></li>
			</ol>
		</div>
	</div>


	<div class="navcontainer">
		<button onclick="toggle()" id="click"><span class="fa fa-bars"></span></button>
		<button onclick="toggle()" id="click2"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>
		<div id="menu">
			<ol class="blockline">
				<li><a href="../index.php"  onclick="return confirm('Are you sure you want to leave the admin page and go to Memak home page?')" title="Goto Memak Homepage">Home</a></li>
				
				 <li>
	               <div class="dropdown active2 activate">
	                <button class="dropdown-toggle activedrp actbtn active2" type="button" data-toggle="dropdown">View Ticket
	                <span class="caret activecaret" style="margin-left:10px;"></span></button>
               		<ul class="dropdown-menu uldrp uldrp2 view">
		                <li><a href="viewallticket.php">View All Ticket</a></li>
		                <li><a href="activeticket.php">View Active Ticket</a></li>
		                <li><a href="availablecar.php">Car Gallery</a></li>
		                <li><a href="registeredcustomer.php">View Customer</a></li>

		                <li onmouseleave="clickmeb()"><div id="a" onmouseover="clickmb()" class="active "> On Board Car <span class="active fa fa-caret-right" style="margin-left: 10px;"></span></div>
		                  	<ul class="pickrentb" id="pickrentb" onmouseleave="leavemeb()"  onmouseover="leavemb()">
		                  	<li><a href="pickcar.php">Await Picking</a></li>
		                  	<li><a class="blk active" href="returncar.php">Await Return</a></li>
		                  </ul>
		                  </li>
		                
	                </ul>
	              </div>
	            </li>

	            <li>
	               <div class="dropdown active2">
	                <button class="dropdown-toggle activedrp actbtn" type="button" data-toggle="dropdown">Admin
	                <span class="caret" style="margin-left:10px;"></span></button>
               		<ul class="dropdown-menu uldrp uldrp2 admin">
		                <li><a href="addadmin.php">New Admin</a></li>
		                <li><a href="changepassword.php">Change Password</a></li>
		                <li><a href="viewadmin.php">View Admin</a></li>
		                <li><a href="addcar.php">Add New Car</a></li>
		            </ul>
		          </div>
		        </li>
				
				<li>
					<div class="dropdown active2">
						 <button class="dropdown-toggle activedrp actbtn" type="button" data-toggle="dropdown">Messages
		                <span class="caret" style="margin-left:10px;"></span></button>
               			<ul class="dropdown-menu uldrp uldrp2 message">
	                		<li><a href="helpmessage.php">Help Request</a></li>
	                		<li><a href="messages.php">Message</a></li>
		            	</ul>
					</div>
				</li>
				<li><a href="logout.php">Logout</a></li>
			</ol>
		</div>
	</div>

	<div class="space"></div>
	<div onclick="closefunction()">
		
		<?php
		$date = date('Ymd');

		?>
	<div class="capcontainer"><p class="cap">All Pending Return Car</p></div><br />
	<div class="container-fluid">
		<div class='table-responsive'>
			<table class='table '>
				  <tr style="background-color: #fff;">
		          	<th id="bordered">S/N</th>
			        <th id="bordered">Firstname</th>
			        <th id="bordered">Lastname</th>
			        <th id="bordered">Passport</th>
			        <th id="bordered">Car Name</th>
			        <th id="bordered">Car image</th>
			        <th id="bordered">Hire Date</th>
			        <th colspan="2">Action</th>
		        </tr>
				<?php
			 	$picked = "picked";

			 	$chk = mysqli_query($conn,"select * from tblbookticket where picked = '$picked' ");
			    $cnt = mysqli_num_rows($chk);
			    if($cnt == 0){
			          echo "No Awaiting Return Car";
		        }

			
			    $rstatement = mysqli_query($conn,"select * from tblbookticket where iddpdate = '$date' and picked = '$picked' order by iddate asc");
			    $countr2 = mysqli_num_rows($rstatement);
			    if($countr2 == 0){
			          //echo "No record found in the database";
		        }
		        else
		        {
		          for ($l=1; $l<= $countr2; $l++) { 
		            $retresult=mysqli_fetch_assoc($rstatement);
		            //echo $retresult['id'];

		           		$ticketemailret = $retresult['email'];
		           		$fetchimgret = "SELECT * FROM tblregistration WHERE email = '$ticketemailret' ";
		           		$queryimgret = mysqli_query($conn, $fetchimgret);
		           		$fetchrsltret = mysqli_fetch_assoc($queryimgret);
		           		$passportret = $fetchrsltret['passport'];

		           		$ticketcarret = $retresult['car'];
		           		$fetchcarimgret = "SELECT * FROM tbladdcar WHERE carname = '$ticketcarret' ";
		           		$querycarimgret = mysqli_query($conn, $fetchcarimgret);
		           		$fetchcarrsltret = mysqli_fetch_assoc($querycarimgret);
		           		$carimgret = $fetchcarrsltret['carimage'];
		          
				   			?>
					<tr style="background-color: #eee;">
			            <td><?php echo $l ?></td>
			            <td><?php echo $retresult['firstname']; ?></td>
			            <td><?php echo $retresult['lastname']; ?></td>
			            <td><img src="<?php echo"../". $passportret; ?>" width="70px" height="70px" alt="image not found"></td>
			            <td><?php echo $retresult['car']; ?></td>
			            <td><img src="<?php echo $carimgret; ?>" width="70px" height="70px" alt="image not found"></td>
			            <td><?php echo $retresult['departureday'].", ".$retresult['departuredate']; ?></td>

			            <td>
			            	<a href='pick.php?id=<?php echo $retresult ['id'];?>' onclick="return confirm ('Are you sure you want to mark this car as picked car?')" ><button class='btn btn-primary' disabled=""><span class='fa fa-share'></span> Picked</button></a>
			        		</td>





				        <td>
		          		<a class="" href="return.php?id=<?php echo $retresult ['id'];?>" onclick="return confirm ('Are you sure you want to approve returning of this car?')" ><button class="btn btn-success">Return <span class="fa fa-reply"></span></button></a>
				        </td>
			        </tr>
			  
				   	<?php

					}	
				}
			?>
					
			<!--last 7 days start -->
			
				<?php
				$daysdt1 = strtotime("-1 week");
				$daysdt = date("Ymd", $daysdt1);
				//echo $daysdt;
				$tdate = strtotime("-1 day");
				$tdat = date("Ymd", $tdate);
				//echo $tdat;
					//echo $daysdate."<br>";
					
					//echo $daysdate;

				    $dayslate = mysqli_query($conn,"select * from tblbookticket where iddpdate >= '$daysdt' and iddpdate <= '$tdat' and picked = '$picked' order by iddate asc");
				    $countday = mysqli_num_rows($dayslate);
				    if($countday == 0){
				        //  echo "no record foundin the database";
		       		}
		       		else{
		       			for ($d=1; $d <= $countday; $d++) { 
		       				$daysresult = mysqli_fetch_assoc($dayslate);
		       				# code...
		       				//echo $daysresult['id']."<br />";
		       		
			       			$daysemail = $daysresult['email'];
			           		$fetchdays = "SELECT * FROM tblregistration WHERE email = '$daysemail' ";
			           		$querydays = mysqli_query($conn, $fetchdays);
			           		$fetchrsltdays = mysqli_fetch_assoc($querydays);
			           		$passportdays = $fetchrsltdays['passport'];

			           		$ticketcardays = $daysresult['car'];
			           		$fetchcarimgdays = "SELECT * FROM tbladdcar WHERE carname = '$ticketcardays' ";
			           		$querycarimgdays = mysqli_query($conn, $fetchcarimgdays);
			           		$fetchcarrsltdays = mysqli_fetch_assoc($querycarimgdays);
			           		$carimgdays = $fetchcarrsltdays['carimage'];
		          
				   			?>
					<tr   class="yellow">
			            <td><?php echo $d ?></td>
			            <td><?php echo $daysresult['firstname']; ?></td>
			            <td><?php echo $daysresult['lastname']; ?></td>
			            <td><img src="<?php echo"../". $passportdays; ?>" width="70px" height="70px" alt="image not found"></td>
			            <td><?php echo $daysresult['car']; ?></td>
			            <td><img src="<?php echo $carimgdays; ?>" width="70px" height="70px" alt="image not found"></td>
			            <td><?php echo $daysresult['departureday'].", ".$daysresult['departuredate']; ?></td>

			            <td>
			            	<a href='pick.php?id=<?php echo $daysresult ['id'];?>' onclick="return confirm ('Are you sure you want to mark this car as picked car?')" ><button class='btn btn-primary' disabled=""><span class='fa fa-share'></span> Picked</button></a>
			        	</td>
				        <td>
		          		<a class="" href="return.php?id=<?php echo $daysresult ['id'];?>" onclick="return confirm ('Are you sure you want to approve returning of this car?')" ><button class="btn btn-success">Return <span class="fa fa-reply"></span></button></a>
				        </td>
				    </tr>

		       			<?php
		       			}
		       		}
			?>
			<!--last 7 days end -->

			<!--last 14 days start -->
				<?php
				$datte = date("Ymd");
					$dt = strtotime("-3 week");
					$dpdate1 = date("Ymd", $dt);
					$dt2 = strtotime("-1week");
					$dpdate2 = date("Ymd", $dt2);

					//echo $dpdate2;
					//echo $dpdate1;
					//echo $daysdate."<br>";
					//echo $daysdate;

				    $dayslate2 = mysqli_query($conn,"select * from tblbookticket where iddpdate >= '$dpdate1' and iddpdate < '$dpdate2' and  picked = '$picked' order by iddate asc");
				    $countday = mysqli_num_rows($dayslate2);
				    //echo $countday;
				    if($countday == 0){
				        //  echo "no record foundin the database";
		       		}
		       		else{
		       			for ($d=1; $d <= $countday; $d++) { 
		       				$daysresult = mysqli_fetch_assoc($dayslate2);
		       				# code...
		       				//echo $daysresult['id']."<br />";
		       		
			       			$daysemail = $daysresult['email'];
			           		$fetchdays = "SELECT * FROM tblregistration WHERE email = '$daysemail' ";
			           		$querydays = mysqli_query($conn, $fetchdays);
			           		$fetchrsltdays = mysqli_fetch_assoc($querydays);
			           		$passportdays = $fetchrsltdays['passport'];

			           		$ticketcardays = $daysresult['car'];
			           		$fetchcarimgdays = "SELECT * FROM tbladdcar WHERE carname = '$ticketcardays' ";
			           		$querycarimgdays = mysqli_query($conn, $fetchcarimgdays);
			           		$fetchcarrsltdays = mysqli_fetch_assoc($querycarimgdays);
			           		$carimgdays = $fetchcarrsltdays['carimage'];
		          
				   			?>
							<tr  class="warn">
					            <td><?php echo $d ?></td>
					            <td><?php echo $daysresult['firstname']; ?></td>
					            <td><?php echo $daysresult['lastname']; ?></td>
					            <td><img src="<?php echo"../". $passportdays; ?>" width="70px" height="70px" alt="image not found"></td>
					            <td><?php echo $daysresult['car']; ?></td>
					            <td><img src="<?php echo $carimgdays; ?>" width="70px" height="70px" alt="image not found"></td>
					            <td><?php echo $daysresult['departureday'].", ".$daysresult['departuredate']; ?></td>

					            <td>
					            	<a href='pick.php?id=<?php echo $daysresult ['id'];?>' onclick="return confirm ('Are you sure you want to mark this car as picked car?')" ><button class='btn btn-primary' disabled=""><span class='fa fa-share'></span> Picked</button></a>
					        	</td>
						        <td>
				          		<a class="" href="return.php?id=<?php echo $daysresult ['id'];?>" onclick="return confirm ('Are you sure you want to approve returning of this car?')" ><button class="btn btn-success">Return <span class="fa fa-reply"></span></button></a>
						        </td>
						    </tr>

		       			<?php
		       			}
		       		}
		       		
		       	?>

	   		   	<!--last 14 days start -->

				<?php
						$d1=strtotime("-4 weeks");
						$dpdate = date("Ymd", $d1) ;

				    $dayslate2 = mysqli_query($conn,"select * from tblbookticket where iddpdate <= '$dpdate' and picked = '$picked' order by iddate asc");
				    $countday2 = mysqli_num_rows($dayslate2);
				    if($countday2 == 0){
				        //  echo "no record foundin the database";
		       		}
		       		else{
		       			for ($d=1; $d <= $countday2; $d++) { 
		       				$daysresult = mysqli_fetch_assoc($dayslate2);
		       				# code...
		       				//echo $daysresult['id']."<br />";
		       		
			       			$daysemail = $daysresult['email'];
			           		$fetchdays = "SELECT * FROM tblregistration WHERE email = '$daysemail' ";
			           		$querydays = mysqli_query($conn, $fetchdays);
			           		$fetchrsltdays = mysqli_fetch_assoc($querydays);
			           		$passportdays = $fetchrsltdays['passport'];

			           		$ticketcardays = $daysresult['car'];
			           		$fetchcarimgdays = "SELECT * FROM tbladdcar WHERE carname = '$ticketcardays' ";
			           		$querycarimgdays = mysqli_query($conn, $fetchcarimgdays);
			           		$fetchcarrsltdays = mysqli_fetch_assoc($querycarimgdays);
			           		$carimgdays = $fetchcarrsltdays['carimage'];
		          
				   			?>
							<tr  class="dangerred">
					            <td><?php echo $d ?></td>
					            <td><?php echo $daysresult['firstname']; ?></td>
					            <td><?php echo $daysresult['lastname']; ?></td>
					            <td><img src="<?php echo"../". $passportdays; ?>" width="70px" height="70px" alt="image not found"></td>
					            <td><?php echo $daysresult['car']; ?></td>
					            <td><img src="<?php echo $carimgdays; ?>" width="70px" height="70px" alt="image not found"></td>
					            <td><?php echo $daysresult['departureday'].", ".$daysresult['departuredate']; ?></td>

					            <td>
					            	<a href='pick.php?id=<?php echo $daysresult ['id'];?>' onclick="return confirm ('Are you sure you want to mark this car as picked car?')" ><button class='btn btn-primary' disabled=""><span class='fa fa-share'></span> Picked</button></a>
					        	</td>
						        <td>
				          		<a class="" href="return.php?id=<?php echo $daysresult ['id'];?>" onclick="return confirm ('Are you sure you want to approve returning of this car?')" ><button class="btn btn-success">Return <span class="fa fa-reply"></span></button></a>
						        </td>
						    </tr>

		       				<?php
		       			}
		       		}
		       		//$daysdate-- ;
				?>
			</table>
		</div>
	</div>
	<!--last 14 days end -->
		<?php
		include "adminfooter.php";
 		?>
	</div>			
	</body>
</html>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>
<style type="text/css">
	.yellow{
		background-color: rgba(255, 150, 0,.7);
		color: ;
	}
	.warn{
		background-color: rgb(255, 70, 0,.9);
		color: #ccc;
	}
	.dangerred{
		background-color: rgb(255, 0, 0,.9);
		color: #fff;
	}
	#bordered{
		border-right: 1px solid #bbb;
	}
</style>