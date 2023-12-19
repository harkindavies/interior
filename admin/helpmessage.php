<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
} 
require "autolog.php";
$nomsg = "";
	$msgcnt = "read";
	$msgstatement = mysqli_query($conn,"select * from tblhelp where msgread != '$msgcnt'order by msgdate desc");
	$countalert = mysqli_num_rows($msgstatement);

    if($countalert == 0)
    {
    	$msgalert = "";
    }
    else
    { 
    	$msgalert ="<span style='color:red;'>New Message* </span><span class='badge' style='background-color:red;'> $countalert</span>";
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
	<link rel="stylesheet" type="text/css" href="toggle.css">
	
	<script type="text/javascript" src="bootstrapnew/js/jQuery.js"></script><script type="text/javascript" src="bootstrapnew/js/bootstrap.min.js"></script>
	<style type="text/css">
		/*body{background-image: url("../img/paper.gif");}*/
		div tr td a>button{margin: 5px 2px;}
		table, tr>th{text-align: center;}
		div>table{ font-size:; background-color: rgba(101,101,50,.2);}
		tr>th{text-transform: uppercase;}
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

		<span class="newmessage"><?php echo $msgalert;?></span>
		<div class="capcontainer"><p class="cap">Help Messages</p></div><br />
		
			<div class="container-fluid">
			    <div class="row">
			      <div class="col-md-12  col-sm-12 col-xs-12">
			 
					<div class='table-responsive'>
					    <table class='table table-striped table-bordered'>
						    <tr>
						      <th>S/N</th>
						      <th>Date</th>
						      <th>Firstname</th>
						      <th>Lastname</th>
						      <th>Car Name</th>
						      <th>Ticket No</th>
						      <th colspan="2">Action</th>
						      
						    </tr>
						  	<?php
						  	$msg = "read";
						    $statement = mysqli_query($conn,"select * from tblhelp where msgread != '$msg'order by msgdate desc");
						    $count = mysqli_num_rows($statement);

						        if($count == 0)
						        {

						          echo "No New Message";
						        }
						        else
						        { 
						          for ($i=1; $i<= $count; $i++) 
						          { 
						            $result=mysqli_fetch_assoc($statement);
						   		 ?>
						   		 	<tr>
							        <td><?php echo $i; ?></td>
							        <td><?php echo $result['msgdate']; ?></td>
							        <td><?php echo $result['firstname']; ?></td>
							        <td><?php echo $result['lastname']; ?></td>
							        <td><?php echo $result['carname']; ?></td>
							        <td><?php echo $result['ticketno']; ?></td>

							        <td>
							          <a title="click to Read" href="readhelpmessage.php?id=<?php echo $result ['id'];?>" onclick="return confirm ('Are you sure you want to read Message No <?php echo $i;?>?')" ><button  class="btn btn-success fa fa-file"> Read</button></a>
							      	</td>
							        <td>
							          	<a title="click to delete" href="deletehelpmessage.php?id=<?php echo $result ['id'];?>" onclick="return confirm ('Are you sure you want to delete Message No <?php echo $i;?>?')" ><button  class="btn btn-danger fa fa-trash"> Delete</button></a>
							        </td>
					        </tr>
								<?php
								    }
								  }

								  $msg ="read";
								  $statementr = mysqli_query($conn,"select * from tblhelp where msgread = '$msg' order by msgdate desc");
						    $countr = mysqli_num_rows($statementr);

						        if($countr == 0)
						        {
						          //echo "No record found in the database";
						        }
						        else
						        { 
						          for ($r=1; $r<= $countr; $r++) 
						          { 
						            $resultr=mysqli_fetch_assoc($statementr);
						   		 ?>
						   		 	<tr>
							        <td><?php echo $r; ?></td>
							        <td><?php echo $resultr['msgdate']; ?></td>
							        <td><?php echo $resultr['firstname']; ?></td>
							        <td><?php echo $resultr['lastname']; ?></td>
							        <td><?php echo $resultr['carname']; ?></td>
							        <td><?php echo $resultr['ticketno']; ?></td>
							        
							        <td>
							          <a title="click to Read" href="readhelpmessage.php?id=<?php echo $resultr['id'];?>" onclick="return confirm ('Are you sure you want to read Message No <?php echo $i;?> again ?')" ><button  class="btn fa fa-folder-open"> Red</button></a>
							      	</td>
							        <td>
							          	<a title="click to delete" href="deletehelpmessage.php?id=<?php echo $resultr['id'];?>" onclick="return confirm ('Are you sure you want to delete Message No <?php echo $i;?>?')" ><button  class="btn btn-danger fa fa-trash"> Delete</button></a>
							        </td>
					        </tr>
								<?php
								    }
								  }
							
								?>
					    </table>
					      </div>
					    </div>
					</div>
				</div>
				<div style="height: 55px;"></div>
				<?php
				 include "adminfooter.php"; 
			
		 	?>
	</div>
</body>
</html>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>