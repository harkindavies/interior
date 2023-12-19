<?php 
include "../conn.php";
include "header.php";
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
} 
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

require "autolog.php";
$nomsg = "";
$read = "read" ;
$total_pages = $conn->query("SELECT * FROM messagetbl WHERE msgread = '$read' AND receiver = '$email' ")->num_rows;
// Check if thepage number is specified and check if it's a number, if not return the default page number which is 1.

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; 
// Number of results to show on each page.
 $num_results_on_page = 10;
  if ($stmt = $conn->prepare("SELECT * FROM messagetbl WHERE msgread = '$read' AND receiver = '$email' ORDER BY sn LIMIT ?,?")) { 
  // Calculate the page to get the results we need from our table.
$calc_page = ($page - 1) * $num_results_on_page; 
$stmt->bind_param('ii', $calc_page, $num_results_on_page);
 $stmt->execute(); // Get the results... 
 $result = $stmt->get_result(); 
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Red messages</title>
	<link rel="stylesheet" type="text/css" href="msg.css">
	<meta charset="utf-8">
	<script>
    	// Add active class to the current page
    	document.getElementById("messages").className = "active";
	</script>
</head>
	<div class="container-fluid">
		<div class="row" id="addpromove">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<a href="messages.php"><button class="choosepro" id="unreadmsg">Unread Messages<span class="fa fa-envelope-o" style="margin-left: 10px;"></span></button></a>
				<a href="#"><button class="choosepro chooseactive" id="redmsg">Red Messages<span class="fa fa-folder-open-o" style="margin-left: 10px;"></span></button></a>
				<?php
					if ($remove == 1) {
					?>				
						<a href="messagerecycle.php"><button class="choosepro" id="deletedmsg">Messages Bin<span class="fa fa-trash-o" style="margin-left: 10px;"></span></button></a>
					<?php
					}
				?>
			</div>
		</div>
		</div>
	<div class="container-fluid">
	    <div class="row">
	      <div class="col-md-12  col-sm-12 col-xs-12">
			<div class='table-responsive'>
				<div class="capcontainer"><p class="cap">Red Messages</p></div><br />
				  	<table class='table table-striped table-bordered'>
					    <tr>
					      <th>S/N</th>
					      <th>Date</th>
					      <th>Sender</th>
					      <th>Message</th>
					      <th colspan="2">Action</th>
					      </tr>
						  </tr> 
				  <?php while ($row = $result->fetch_assoc()): ?> 
				  <tr>
				  <td><?php echo $row['sn']; ?></td>
				   <td><?php echo $row['message']; ?></td>
				    <td><?php echo $row['receiver']; ?></td>
					<td><?php echo $row['sender']; ?></td>
					<td>
						 <a title="Click to read this message again" href="readmessage.php?id=<?php echo $row['sn'];?>" ><button id="red" class="btn fa fa-folder-open"> Read Again</button></a>
					      	</td>
					        <td>
					          	<a title="Click to delete" onclick="return confirm('Are you sure you want to delete this message')" href="deletemessage.php?id=<?php echo $row['sn'];?>"><button id="delete" class="btn btn-danger fa fa-trash"> Delete</button></a>
					        </td>
				  </tr> <?php endwhile; ?> 
			    </table>
			</div>
		  </div>
		</div>
	</div>
	
<?php
	//pagination 
	if (ceil($total_pages / $num_results_on_page) > 0): ?> 
	<ul class="pagination"> 
	<?php if ($page > 1): ?> 
		<li class="prev"><a href="red_messages.php?page=<?php echo $page-1 ?>">Prev</a></li> 
		<?php endif; ?> 


		<?php if ($page > 3): ?> 
		<li class="start"><a href="red_messages.php?page=1">1</a></li> 
		<li class="dots">...</li> 
		<?php endif; ?> 


		<?php if ($page-2 > 0): ?><li class="page"><a href="red_messages.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?> 
		<?php if ($page-1 > 0): ?><li class="page"><a href="red_messages.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>


		<li class="currentpage"><a href="red_messages.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>


		<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="red_messages.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
		<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
		<li class="page"><a href="red_messages.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?> 
		<li class="dots">...</li> 
		<li class="end"><a href = "red_messages.php?page=<?php echo ceil($total_pages / $sum_result_no_page); ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
		<?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
		<li class="next"><a href="red_messages.php?page=<?php echo $page+1 ?>">Next</a></li>
		<?php endif; ?>
	</ul>
	<div style="height: 55px;"></div>

<?php endif;

	//pagination end

if(isset($_SESSION['deletemsg'])){
$deletemsg = $_SESSION['deletemsg'];
	if ($deletemsg == 1) {
	?>
 	<div class='container'>
		<div class='row'>
	        <div class='col-md-12 col-sm-12 col-xs-12'>
	            <div class='resultmodal' id='resultmodal'>
	                <div class='resultmodalcontent'>Message  successfully deleted</div>
	            </div>
	        </div>
	    </div>
	</div>
	
	<?php
	}
	elseif ($deletemsg == 2) {
		?>
		<div class='container'>
		<div class='row'>
	        <div class='col-md-12 col-sm-12 col-xs-12'>
	            <div class='resultmodal resulterror' id='resultmodal'>
	                <div class='resultmodalcontent resultcontenterror'>Unable to delete this message at the moment</div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php
	}
	else{}
	?>
	<script type="text/javascript">
		$("#resultmodal").slideUp(0);
		$("#resultmodal").slideDown(500);
		setTimeout(function(){
		  $("#resultmodal").slideUp(500);
		}, 2500);
	</script>
	<?php

		unset($_SESSION['deletemsg']);
	}
	else{}
?>
</body>
</html>
<?php
$stmt->close();
}
?>