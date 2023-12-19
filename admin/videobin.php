<?php
require "../conn.php";
include "header.php";
//session_start();

if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
}
$deletevideo = "";
  if (isset($_SESSION['deletevideo'])) {
    $deletevideo = $_SESSION['deletevideo'];
    if ($deletevideo == 1) {
      ?>
        <div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
					<div class="ordermsg" id="ordermsg">
						<span> Video successfully deleted. </span>
						<div id="myProgress" class="myProgress">
								<div id="myBar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php
    }
    elseif($deletevideo == 2){
      ?>
      	<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
					<div class="ordermsg ordermsg2" id="ordermsg">
						<span> Error occur while deleting the video.</span>
						<div id="myProgress" class="myProgress2" >
								<div id="myBar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php                
    }

    elseif ($deletevideo == 3) {
      ?>
        <div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
					<div class="ordermsg" id="ordermsg">
						<span> Video successfully retrieved. </span>
						<div id="myProgress" class="myProgress">
								<div id="myBar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php
    }
    elseif($deletevideo == 4){
      ?>
      	<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
					<div class="ordermsg ordermsg2" id="ordermsg">
						<span> Error occur while retrieving the video.</span>
						<div id="myProgress" class="myProgress2" >
								<div id="myBar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php                
    }
    else{ }
    ?>

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
unset($_SESSION['deletevideo']);

 //------------select all user details from database------------
 $email = $_SESSION['adminemail'];
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

   $total_pages = $conn->query("SELECT * FROM deletedvideo ")->num_rows;
// Check if thepage number is specified and check if it's a number, if not return the default page number which is 1.

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; 
// Number of results to show on each page.
 $num_results_on_page = 2;
  if ($stmt = $conn->prepare("SELECT * FROM deletedvideo ORDER BY sn desc LIMIT ?,?")) { 
  // Calculate the page to get the results we need from our table.
$calc_page = ($page - 1) * $num_results_on_page; 
$stmt->bind_param('ii', $calc_page, $num_results_on_page);
 $stmt->execute(); // Get the results... 
 $result = $stmt->get_result(); 
 
$nomsg = "";
require "autolog.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome To admin</title>
	<link rel="stylesheet" type="text/css" href="adorder.css">

</head>
<script>
	    // Add active class to the current page
	    document.getElementById("project").className = "active";
</script>
<body>
	<div>
	<div class="container-fluid">
			<div class="row" id="addpromove">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="viewproject.php"><button class="choosepro" id="viewproject">View Project <span class="fa fa-photo" style="margin-left: 10px;"></span></button></a>
					<a href="viewvideo.php"><button class="choosepro" id="viewvideo">View Video <span class="fa fa-video-camera" style="margin-left: 10px;"></span></button></a>
					<?php if ($remove == 1){ ?>
					<a href="#"><button class="choosepro chooseactive" id="viewbin">Video Bin<span class="fa fa-trash-o" style="margin-left: 10px;"></span></button></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="capcontainer"><p class="cap">ALL PROJECT</p></div>

		<div class="container-fluid">
			<div class='table-responsive'>
				<table class='table table-striped table-bordered'>
				  <tr>
					  <th>S/N</th>
				      <th>Project Name</th>
				      <th>Project Description</th>
				      <th>Project type</th>
				      <th>Project Video</th>
				      <th>Admin-in-charge</th>
				      <th>Delete-Date</th>
				      <th colspan="2">Action</th>
				      
		        </tr>
				 	<?php
				 	while($row = $result->fetch_assoc()):
				   ?>
			         <tr>
			            <td><?php echo $row['sn']; ?></td>
			            <td><?php echo $row['projectname']; ?></td>
			            <td><?php echo $row['description']; ?></td>
			            <td><?php echo $row['projectype']; ?></td>
			            <td>
			            	<video onclick="myFunction(this)" id="myvid<?php echo $sn; ?>" controls="" height="120px" width="200px">
			            		<source src="<?php echo $row['projectvideo']; ?>"  type="video/mp4" />
			            		<source src="<?php echo $row['projectvideo']; ?>"  type="video/mp4" />
			            	</video>
			            </td>
			            <td><?php echo $row['admininfo']; ?></td>

                    	<td><?php echo $row['deletedate']; ?></td>
                    	<td style="text-align: center;">
                      <a title="click to delete" href="retrievevideo.php?sn=<?php echo $row ['sn'];?>" onclick="return confirm ('Are you sure you want to retrieve <?php echo $row ['projectname']; ?> from deleted videos ?')" ><button id="retrieve" class="btn btn-success fa fa-download"> Restore Video </button></a>
                    </td>
			            <td style="text-align: center;">
	                      <a title="click to delete" href="pdeletevideo.php?sn=<?php echo $row ['sn'];?>" onclick="return confirm ('Are you sure you want to delete <?php echo $row ['projectname']; ?> from video ?')" ><button id="deletebtn" class="btn btn-danger fa fa-trash"> Delete Video </button></a>
	                    </td>
		       	  	</tr>
				<?php endwhile;	?>
				</table>
			</div>
		</div>
		
		 <!-- pagination -->
	<?php if (ceil($total_pages / $num_results_on_page) > 0): ?> 
	<ul class="pagination"> 
	<?php if ($page > 1): ?> 
		<li class="prev"><a href="videobin.php?page=<?php echo $page-1 ?>">Prev</a></li> 
		<?php endif; ?> 


		<?php if ($page > 3): ?> 
		<li class="start"><a href="videobin.php?page=1">1</a></li> 
		<li class="dots">...</li> 
		<?php endif; ?> 


		<?php if ($page-2 > 0): ?><li class="page"><a href="videobin.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?> 
		<?php if ($page-1 > 0): ?><li class="page"><a href="videobin.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>


		<li class="currentpage"><a href="videobin.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>


		<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="videobin.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
		<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
		<li class="page"><a href="videobin.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?> 
		<li class="dots">...</li> 
		<li class="end"><a href = "videobin.php?page=<?php echo ceil($total_pages / $sum_result_no_page); ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
		<?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
		<li class="next"><a href="videobin.php?page=<?php echo $page+1 ?>">Next</a></li>
		<?php endif; ?>
	</ul>
	<div style="height: 55px;"></div>

	<?php endif;?>
  <?php include "adminfooter.php"; ?>
		
	</div>
</body>
</html>
<?php
$stmt->close();
}
?>