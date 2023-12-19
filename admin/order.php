<?php
require "../conn.php";
include "header.php";
//session_start();

if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
}

$query = "SELECT * FROM adminreg WHERE email = '$email' ";
 	$selected = mysqli_query($conn, $query);
 	$rslt = mysqli_fetch_assoc($selected); 

  	$position = $rslt['position'];
            
              if($position == 'CEO & Founder'){
                $remove = 1;
              }
              else{
                $remove = 0;
              }

  $respond = "";
  $total_pages = $conn->query("SELECT * FROM ordertbl WHERE respond = '$respond' ")->num_rows;
// Check if thepage number is specified and check if it's a number, if not return the default page number which is 1.

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; 
// Number of results to show on each page.
 $num_results_on_page = 10;
  if ($stmt = $conn->prepare("SELECT * FROM ordertbl WHERE respond = '$respond' ORDER BY sn desc LIMIT ?,?")) { 
  // Calculate the page to get the results we need from our table.
$calc_page = ($page - 1) * $num_results_on_page; 
$stmt->bind_param('ii', $calc_page, $num_results_on_page);
 $stmt->execute(); // Get the results... 
 $result = $stmt->get_result(); 
 

if (isset($_SESSION['success'])) {
		//$deleted = $_SESSION['deleted'];
		?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
				<div class="ordermsg" id="ordermsg">
					<span> You have uccessfully responded to the order</span>
					<div id="myProgress">
							<div id="myBar"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){
				var elem = document.getElementById("myBar");   
		  var width = 100;
		  var id = setInterval(frame, 15);
		  function frame() {
		    if (width <= 0) {
		      clearInterval(id);
		    } else {
		      width--; 
		      elem.style.width = width + '%'; 
		    }
		  };
			},1000);
			setTimeout(function(){
			$("#ordermsg").fadeOut(500);

			},2500);
		});
</script>
	<?php

}
unset($_SESSION['success']);

$nomsg = "";
require "autolog.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To admin</title>
	<link rel="stylesheet" type="text/css" href="adorder.css">
	<style type="text/css">
	
	</style>
</head>
<body>
	<script>
	    // Add active class to the current page
	    document.getElementById("order").className = "active";
	</script>
		
		<div class="container-fluid">
			<div class="row" id="addpromove">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<a href="#"><button class="choosepro chooseactive" id="addpicture">Unreply Order<span class="fa fa-folder" style="margin-left: 10px;"></span></button></a>
					<a href="respondedorder.php"><button class="choosepro" id="addvideo">Red Order<span class="fa fa-folder-open-o" style="margin-left: 10px;"></span></button></a>
					<?php
					if ($remove == 1) {
					?>				
						<a href="order_recycle.php"><button class="choosepro" id="deletedmsg">Order Bin<span class="fa fa-trash-o" style="margin-left: 10px;"></span></button></a>
					<?php
					}
				?>
				</div>
			</div>
		</div>
		<div class="capcontainer"><p class="cap">NEW ORDER</p></div>

		<div class="container-fluid">
			<div class='table-responsive'>
				<table class='table table-striped table-bordered'>
				  
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
				      <th>Action</th>
		        </tr>

       			<?php while ($row = $result->fetch_assoc()):
		            $pst = $row['images'];
		            $pstrim = str_replace(" ", ",", $pst);
								$temp = explode(',',$pstrim);
								$temp = array_filter($temp);

								$amnt = $row['amount'];
		            $amntrim = str_replace(" ", "_", $amnt);
								$expldamnt = explode('_',$amntrim);
								$expldamnt = array_filter($expldamnt);
				   ?>
			         <tr>
		            <td><?php echo $row['sn']; ?></td>
		            <td><?php echo $row['firstname']; ?></td>
		            <td><?php echo $row['lastname']; ?></td>
		            <td><?php echo $row['address']; ?></td>
		            <td><?php echo $row['email']; ?></td>
		            <td>
		            	<?php
				          foreach($temp as $image){
								  // Use an if here...you could use a root directory if defined previously.
								  // Use whatever you like to check if the file exists
								  //if(is_file($image))
							     	echo $imag = "<img src='../{$image}' height='50' width='40' style='margin:2px; display: inline-flex;' />";
									}
								?>
									
								</td>
		            <td><?php
		            	foreach($expldamnt as $myamnt){
							     	echo "#".$myamnt. "  ";
									}
		             ?>
		             	
		             </td>
		            <td><?php echo $row['phone']; ?></td>
		            <td><?php echo $row['site_address']; ?></td>
		            <td><?php echo $row['type']; ?></td>
		            <td><?php echo $row['orderdate']; ?></td>
		           
		            <td>
		            <a title="click to respond" href="response.php?sn=<?php echo $row['sn'];?>"><button onclick="respondb(this)" id="<?php echo $row['sn']; ?>" class="btn btn-success fa fa-reply respondbtn"> Respond</button></a>
		          </td>
		       	  </tr>
				   <?php endwhile; ?>
				</table>
			</div>
		</div>
		
		<?php include "adminfooter.php"; 
		
	?>
	
    <!-- pagination -->
	<?php if (ceil($total_pages / $num_results_on_page) > 0): ?> 
	<ul class="pagination"> 
	<?php if ($page > 1): ?> 
		<li class="prev"><a href="order.php?page=<?php echo $page-1 ?>">Prev</a></li> 
		<?php endif; ?> 


		<?php if ($page > 3): ?> 
		<li class="start"><a href="order.php?page=1">1</a></li> 
		<li class="dots">...</li> 
		<?php endif; ?> 


		<?php if ($page-2 > 0): ?><li class="page"><a href="order.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?> 
		<?php if ($page-1 > 0): ?><li class="page"><a href="order.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>


		<li class="currentpage"><a href="order.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>


		<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="order.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
		<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
		<li class="page"><a href="order.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?> 
		<li class="dots">...</li> 
		<li class="end"><a href = "order.php?page=<?php echo ceil($total_pages / $sum_result_no_page); ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
		<?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
		<li class="next"><a href="order.php?page=<?php echo $page+1 ?>">Next</a></li>
		<?php endif; ?>
	</ul>
	<div style="height: 55px;"></div>

	<?php endif;?>
  <?php include "adminfooter.php"; ?>

<script type="text/javascript">
	function respondb(mbtn){
		var dbtn = $(mbtn).attr('id');
		var mydbtn = dbtn;

      $.ajax({
        url: "orderprocess.php",
        method: "GET",
        data: {mySelt:mydbtn},
        success: function (data) {
            document.getElementById("mydemo").value = data;
        }
      });

	}
</script>
</body>
</html>
<?php
$stmt->close();
}
?>