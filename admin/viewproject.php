<?php
require "../conn.php";
include "header.php";
//session_start();

if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
}
$deleteproject = "";
  if (isset($_SESSION['deleteproject'])) {
    $deleteproject = $_SESSION['deleteproject'];
    if ($deleteproject == 1) {
      ?>
        <div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
					<div class="ordermsg" id="ordermsg">
						<span> Project successfully deleted. </span>
						<div id="myProgress" class="myProgress">
								<div id="myBar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php
    }
    elseif($deleteproject == 2){
      ?>
      	<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
					<div class="ordermsg ordermsg2" id="ordermsg">
						<span> Error occur while deleting the project.</span>
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
unset($_SESSION['deleteproject']);
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

   $total_pages = $conn->query("SELECT * FROM project ")->num_rows;
// Check if thepage number is specified and check if it's a number, if not return the default page number which is 1.

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; 
// Number of results to show on each page.
 $num_results_on_page = 5;
  if ($stmt = $conn->prepare("SELECT * FROM project ORDER BY sn desc LIMIT ?,?")) { 
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
					<a href="#"><button class="choosepro chooseactive" id="addpicture">View Project <span class="fa fa-photo" style="margin-left: 10px;"></span></button></a>
					<?php if ($remove == 1){ ?>
					<a href="projectbin.php"><button class="choosepro " id="viewbin">View Project Bin<span class="fa fa-trash-o" style="margin-left: 10px;"></span></button></a>
					<?php } ?>
					<a href="viewvideo.php"><button class="choosepro" id="addvideo">View Video <span class="fa fa-video-camera" style="margin-left: 10px;"></span></button></a>
				</div>
			</div>
		</div>
		<div class="capcontainer"><p class="cap">ALL PROJECT</p></div>

		<div class="container-fluid">
			<div class='table-responsive'>
				<table class='table table-striped table-bordered'>
				  <tr>
	           <tr>
		          <th>S/N</th>
				      <th>Project name</th>
				      <th>Project price</th>
				      <th>Project type</th>
				      <th>Promo type</th>
				      <th>Project Image</th>
				      <th>Admin-in-charge</th>
				      <th>Upload-Date</th>
				      <th>Action</th>
				      
		        </tr>
			        <tr>
        			<?php while ($row = $result->fetch_assoc()): ?> 
			            <td><?php echo $row['sn']; ?></td>
			            <td><?php echo $row['projectname']; ?></td>
			            <td><?php echo $row['projectprice']; ?></td>
			            <td><?php echo $row['projectype']; ?></td>
			            <td><?php echo $row['promotype']; ?></td>
			            <td><img src="<?php echo $row['projectimage']; ?>" height="80px" width="150px"/></td>

			            <td><?php echo $row['admininfo']; ?></td>

                    	<td><?php echo $row['uploadate']; ?></td>

			            <td style="text-align: center;">
                      <a title="click to delete" href="deleteproject.php?sn=<?php echo $row ['sn'];?>" onclick="return confirm ('Are you sure you want to remove <?php echo $row ['projectname']; ?> from project?')" ><button id="deletebtn" class="btn btn-danger fa fa-trash"> Remove Project </button></a>
                    </td>
		       	  	</tr>
         			<?php endwhile; ?>
				</table>
			</div>
		</div>

 <!-- pagination -->
	<?php if (ceil($total_pages / $num_results_on_page) > 0): ?> 
	<ul class="pagination"> 
	<?php if ($page > 1): ?> 
		<li class="prev"><a href="viewproject.php?page=<?php echo $page-1 ?>">Prev</a></li> 
		<?php endif; ?> 


		<?php if ($page > 3): ?> 
		<li class="start"><a href="viewproject.php?page=1">1</a></li> 
		<li class="dots">...</li> 
		<?php endif; ?> 


		<?php if ($page-2 > 0): ?><li class="page"><a href="viewproject.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?> 
		<?php if ($page-1 > 0): ?><li class="page"><a href="viewproject.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>


		<li class="currentpage"><a href="viewproject.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>


		<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="viewproject.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
		<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
		<li class="page"><a href="viewproject.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?> 
		<li class="dots">...</li> 
		<li class="end"><a href = "viewproject.php?page=<?php echo ceil($total_pages / $sum_result_no_page); ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
		<?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
		<li class="next"><a href="viewproject.php?page=<?php echo $page+1 ?>">Next</a></li>
		<?php endif; ?>
	</ul>
	<div style="height: 55px;"></div>

	<?php endif;?>
  <?php include "adminfooter.php"; ?>
</body>
</html>
<?php
$stmt->close();
}
?>