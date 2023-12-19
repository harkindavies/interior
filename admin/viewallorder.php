<?php
require "../conn.php";
include "header.php";
//session_start();

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
	<style type="text/css">
		/*body{background-image: url("../img/paper.gif");}*/
		div tr td a>button#deletebtn{
			margin: 5px 2px; 
			background: red; 
			opacity: .7;
			transition:.5s;
			border: 1px solid transparent;
		}
		#deletebtn:hover{
			background: transparent;
			border:1px solid red;
			color: red;
			opacity: unset;
			transition: .5s;
		}
		#respondbtn{
			background: mediumseagreen;
			margin: 5px 2px; 
			opacity: 1;
			transition:.5s;
			border: 1px solid transparent;
			padding: 10px 5px;
		}
		#respondbtn:hover{
			background: transparent;
			border:1px solid mediumseagreen;
			color: mediumseagreen;
			opacity: unset;
			transition: .5s;
		}
		table, tr>th{text-align: center;}
		div>table{background-color: rgba(101,101,50,.2);}
		tr>th{text-transform: uppercase;}
		td{text-transform: ;}
		div .capcontainer{
			font-size: 2.3em; 
			text-align: center; 
			margin: 70px 0 0px; 
			clear: both;
		}
		.table-responsive{
			margin-bottom: 5%;
		}
	</style>
</head>
<body>
	<div onclick="closefunction()">
		<div class="capcontainer"><p class="cap">ALL ORDER</p></div>

		<div class="container-fluid">
			<div class='table-responsive'>
				<table class='table table-striped table-bordered'>
				  <tr>
	           <tr>
		          <th>S/N</th>
				      <th>Firstname</th>
				      <th>Lastname</th>
				      <th>Address</th>
				      <th>Email</th>
				      <th>Project Image</th>
				      <th>Amount</th>
				      <th>Phone</th>
				      <th>Site Address</th>
				      <th>Building Type</th>
				      <th>Order Date</th>
		        </tr>

				 	 <?php
				 	 $respond = "";
				 	 $statements = "SELECT * FROM ordertbl ORDER BY sn ASC";
				    $statement = mysqli_query($conn, $statements);
				    $count = mysqli_num_rows($statement);
				    if($count == 0){
				          echo "No record found in the database";
		        }
		        else
		        { 
		          for ($i=1; $i<= $count; $i++) {
		            $result=mysqli_fetch_assoc($statement);
		            $pst = $result['images'];
		            $pstrim = str_replace(" ", ",", $pst);
								$temp = explode(',',$pstrim);
								$temp = array_filter($temp);

								$amnt = $result['amount'];
		            $amntrim = str_replace(" ", "_", $amnt);
								$expldamnt = explode('_',$amntrim);
								$expldamnt = array_filter($expldamnt);
				   ?>
			         <tr>
		            <td><?php echo $i; ?></td>
		            <td><?php echo $result['firstname']; ?></td>
		            <td><?php echo $result['lastname']; ?></td>
		            <td><?php echo $result['address']; ?></td>
		            <td><?php echo $result['email']; ?></td>
		            <td>
		            	<?php
				          foreach($temp as $image){
								  // Use an if here...you could use a root directory if defined previously.
								  // Use whatever you like to check if the file exists
								  //if(is_file($image))
							     	echo $imag = "<img src='../{$image}' height='50' width='50' style='margin:2px; display: inline-flex;' />";
									}
								?>
									
								</td>
		            <td><?php
		            	foreach($expldamnt as $myamnt){
							     	echo "#".$myamnt." ";
									}
		             ?>
		             	
		             </td>
		            <td><?php echo $result['phone']; ?></td>
		            <td><?php echo $result['site_address']; ?></td>
		            <td><?php echo $result['type']; ?></td>
		            <td><?php echo $result['orderdate']; ?></td>
		       	  </tr>

				<?php
					}
				?>
				</table>
			</div>
		</div>
		
		<?php include "adminfooter.php"; 
		}
	?>
		
	</div>
</body>
</html>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>