<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
} 
else{
	require "autolog.php";
$nomsg = "";
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
	
	<script type="text/javascript" src="bootstrapnew/js/jQuery.js"></script><script type="text/javascript" src="bootstrapnew/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{background-image: url("../img/paper.gif");}
		.messages{
			margin: 10px auto;
			width: 600px;
			border: 1px solid #aaa;
			border-radius: 5px;
			min-height: 450px;
			background: rgba(255,255,255,.5);
		}
		a.fa-arrow-circle-o-left{
			border-radius: 50%;
			color: steelblue;
			font-size: 35px;
			margin: 5px 0 0 20px;
			text-decoration: none;
			transition: 0.5s;
		}
		a.fa-arrow-circle-o-left:hover,a.fa-arrow-circle-o-left:hover{
			color: rgba(0,0,0,.6);
			text-decoration: none;
			transition: 0.5s;
		}
	</style>
</head>
<body>
	<div class="linecontainer" style="position: fixed;z-index: 1;">
  <div class="topimage">
	  <img class="footerimg" src="../img/newheaderlogo2.png" alt="no image found" width="80px" height="80px" style="margin-top: 5px;">
	</div>
		<div class="line">
			<ol class="linecontent">
				<li class="other"><a href="../index.php" onclick="return confirm('Are you sure you want to leave the admin page and go to Memak home page?')" title="Goto Memak Homepage">Home</a></li>
				
			    <li>
		            <div class="dropdown">
		                <button class="dropdown-toggle activedrp" type="button" data-toggle="dropdown">View Ticket
		                <span class="caret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                  <li><a href="viewallticket.php">View All Ticket</a></li>
		                  <li><a href="activeticket.php">View Active Ticket</a></li>
		                  <li><a href="availablecar.php">Car Gallery</a></li>
		                  <li><a href="registeredcustomer.php">View Customer</a></li>

		                  <li onmouseleave="clickme()"><div id="a" onmouseover="clickm()"> On Board Car <span class="fa fa-caret-right" style="margin-left: 10px;"></span></div>
		                  	<ul class="pickrent" id="pickrent" onmouseleave="leaveme()"  onmouseover="leavem()">
		                  		<li><a href="pickcar.php">Await Picking Cars</a></li>
		                  		<li><a href="returncar.php">Await Return Cars</a></li>
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
					<div class="dropdown active">
						 <button class="dropdown-toggle activedrp  active" type="button" data-toggle="dropdown">Messages
		                <span class="caret  activecaret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                	<li><a class="active" href="helpmessage.php">Help Request</a></li>
		                	<li><a href="messages.php">Contact Message</a></li>
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
	               <div class="dropdown active2">
	                <button class="dropdown-toggle activedrp actbtn" type="button" data-toggle="dropdown">View Ticket
	                <span class="caret" style="margin-left:10px;"></span></button>
               		<ul class="dropdown-menu uldrp uldrp2 view">
		                <li><a href="viewallticket.php">View All Ticket</a></li>
		                <li><a href="activeticket.php">View Active Ticket</a></li>
		                <li><a href="availablecar.php">Car Gallery</a></li>
		                <li><a href="registeredcustomer.php">View Customer</a></li>

		                <li onmouseleave="clickmeb()"><div id="a" onmouseover="clickmb()"> On Board Car <span class="fa fa-caret-right" style="margin-left: 10px;"></span></div>
		                  	<ul class="pickrentb" id="pickrentb" onmouseleave="leavemeb()"  onmouseover="leavemb()">
		                  	<li><a href="pickcar.php">Await Picking</a></li>
		                  	<li><a href="returncar.php">Await Return</a></li>
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
					<div class="dropdown active2  activate">
						 <button class="dropdown-toggle activedrp actbtn active2" type="button" data-toggle="dropdown">Messages
		                <span class="caret  activecaret" style="margin-left:10px;"></span></button>
               			<ul class="dropdown-menu uldrp uldrp2 message">
	                		<li><a class="active2 activeli" href="helpmessage.php">Help Request</a></li>
	                		<li><a href="messages.php">Contact Message</a></li>
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
			?>
			<!---search finish -->
			<a class="fa fa-arrow-circle-o-left" href="helpmessage.php"></a>
			<div class="container">
			    <div class="row">
			    	<div class="messages">
						      <p style="text-align: center; padding: 10px 10px 2px; font-size: 2em; border-bottom: 1px solid #aaa">Message</p>
						  	<?php
						  	$read = "read" ;
						  		$get_id = $_GET['id'];
						    $statement = mysqli_query($conn,"select * from tblhelp where id = '$get_id' order by msgdate asc");

						    $updateread = "UPDATE tblhelp SET msgread = '$read' WHERE id = '$get_id' ";
						    $rq = mysqli_query($conn, $updateread);
						    if ($rq) {
						    }
						    $count = mysqli_num_rows($statement);
						            $result=mysqli_fetch_assoc($statement);
						            ?>

 <p style="padding: 5px; line-height: 1.5; font-size: 
 17px; font-family: serif;"><?php echo $result['message'];?></p>
					
					</div>
				</div>
			</div>
				<div style="height: 43px;"></div>
				<?php
			
		 	 include "adminfooter.php";
		 	}
		 	  ?>
	</div>
</body>
</html>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>