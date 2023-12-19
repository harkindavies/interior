<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
}
$nomsg = "";
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
		                  <li><a class="active" href="activeticket.php">View Active Ticket</a></li>
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
					<div class="dropdown">
						 <button class="dropdown-toggle activedrp" type="button" data-toggle="dropdown">Messages
		                <span class="caret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                	<li><a href="helpmessage.php">Help Request</a></li>
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
	               <div class="dropdown active2 activate">
	                <button class="dropdown-toggle activedrp actbtn active2" type="button" data-toggle="dropdown">View Ticket
	                <span class="caret activecaret" style="margin-left:10px;"></span></button>
               		<ul class="dropdown-menu uldrp uldrp2 view">
		                <li><a href="viewallticket.php">View All Ticket</a></li>
		                <li><a class="active2 activeli" href="activeticket.php">View Active Ticket</a></li>
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
					<div class="dropdown active2">
						 <button class="dropdown-toggle activedrp actbtn" type="button" data-toggle="dropdown">Messages
		                <span class="caret" style="margin-left:10px;"></span></button>
               			<ul class="dropdown-menu uldrp uldrp2 message">
	                		<li><a href="helpmessage.php">Help Request</a></li>
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
		
		<div class="capcontainer"><p class="cap">All Active Records</p></div>
        <div class="search">
          <form action="" method="post">
            <input type="search" name="search" class="searchbtn" title="Search ticket here!!" required placeholder="Search By Car or Ticket No">
            <button type="submit" name="submit" title="Search ticket here!!" class="btn btn-link glyphicon glyphicon-search"></button>
          </form>
        </div>
				

		<?php
		$date = date('Ymd');
			/*$select = "SELECT * FROM tblbookticket WHERE iddpdate >= '$date'  ORDER BY id DESC";
			$selected = mysqli_query($conn, $select);
			$result = mysqli_num_rows($selected);
			if ($result == 0) {
				echo "No record found";
			}
			else{	*/		

				if (isset($_POST['submit'])) 
				{
				    $searchq = $_POST['search'];
				    $srch = "SELECT * from tblbookticket WHERE car LIKE '%$searchq%' OR ticketno LIKE '%$searchq%' AND iddpdate >= '$date' ORDER BY iddate desc" ;
				    $ticketrslt = mysqli_query($conn, $srch);
				    $countticket = mysqli_num_rows($ticketrslt);
				    if ($countticket==0) 
				    {
				      echo'<script type="text/javascript">
				      alert("No Record Found");
				      </script>';
				      echo "No Record Found";
				    }
				    else{
				      ?>

						<div class="container-fluid">
						  <p class="caps">Ticket Search Result</p>
						    <div class='table-responsive'>
						      <table class='table table-striped table-bordered'>
						        <tr>
						          <th>S/N</th>
							        <th>Date</th>
							        <th>Firstname</th>
							        <th>Lastname</th>
							        <th>Car</th>
							        <th>Hire Date</th>
							        <th>Ticketno</th>
							        <th>Amount</th>
							        <th colspan="2">Action</th>
						        </tr>
						  <?php
						      for ($i=1; $i<=$countticket; $i++) 
						      { 
						        $result = mysqli_fetch_array($ticketrslt);
						 				 ?>
						          <tr>
						            <td><?php echo $i; ?></td>
						            <td><?php echo $result['createdate']; ?></td>
						            <td><?php echo $result['firstname']; ?></td>
						            <td><?php echo $result['lastname']; ?></td>
						            <td><?php echo $result['car']; ?></td>
						            <td><?php echo $result['departureday'].", ".$result['departuredate']; ?></td>
						            <td><?php echo $result['ticketno']; ?></td>
						            <td><?php echo $result['amount']; ?></td>
							          
							          <td>
							            	<a title="click to Edit" href="editticket.php?id=<?php echo $result ['id'];?>" onclick="return confirm ('Are you sure you want to Edit Ticket Row No <?php echo $i;?>?')" ><button  class="btn btn-primary fa fa-edit"> Edit</button></a>
							            </td>
							            <td>
								            <a title="click to delete" href="deleteticket.php?id=<?php echo $result ['id'];?>" onclick="return confirm ('Are you sure you want to cancel Ticket Row No <?php echo $i;?>?')" ><button  class="btn btn-danger fa fa-trash"> Cancel</button></a>
								        </td>
						       		</tr>
							      <?php
							    
							      }?>
						       	</table>
						      </div>
						  	</div>
						    <?Php
				    }
				}

				else{
					?>
					<div class="container-fluid">
						<div class='table-responsive'>
							<table class='table table-striped table-bordered'>
							  <tr>
				          <th>S/N</th>
					        <th>Date</th>
					        <th>Firstname</th>
					        <th>Lastname</th>
					        <th>Car</th>
					        <th>Hire Date</th>
					        <th>Ticketno</th>
					        <th>Amount</th>
					        <th colspan="2">Action</th>
				        </tr>

							 	 <?php
							    $statement = mysqli_query($conn,"select * from tblbookticket where iddpdate > '$date' order by iddate desc");
							    $count = mysqli_num_rows($statement);
							    if($count == 0){
							          echo "No record found in the database";
					        }
					        else
					        { 
					          for ($i=1; $i<= $count; $i++) { 
					            $result=mysqli_fetch_assoc($statement);
							   		 ?>
										  <tr>
						            <td><?php echo $i ?></td>
						            <td><?php echo $result['createdate']; ?></td>
						            <td><?php echo $result['firstname']; ?></td>
						            <td><?php echo $result['lastname']; ?></td>
						            <td><?php echo $result['car']; ?></td>
						            <td><?php echo $result['departureday'].", ".$result['departuredate']; ?></td>
						            <td><?php echo $result['ticketno']; ?></td>
						            <td><?php echo $result['amount']; ?></td>
						           	<td>
						            	<a title="click to Edit" href="editticket.php?id=<?php echo $result ['id'];?>" onclick="return confirm ('Are you sure you want to Edit Ticket Row No <?php echo $i;?>?')" ><button  class="btn btn-primary fa fa-edit"> Edit</button></a>
						            </td>
					            <td>
						            <a title="click to delete" href="deleteticket.php?id=<?php echo $result ['id'];?>" onclick="return confirm ('Are you sure you want to cancel Ticket Row No <?php echo $i;?>?')" ><button  class="btn btn-danger fa fa-trash"> Cancel</button></a>
						       		</td>
						        </tr>
									   <?php
										}
									}
								?>
							</table>
						</div>
					</div>
					
					<?php  
				}	
				 ?>
				
				</div>
				<?php
			//}

				include "adminfooter.php";
			?>
</body>
</html>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>