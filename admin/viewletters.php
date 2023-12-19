<?php
require "header.php";
//session_start();
include '../conn.php';
if(!isset($_SESSION['adminemail']))
  {
    echo "<script> alert('login first to have access')</script>";
    header('location:login.php?e=login first to have access to the page');
  }
  require "autolog.php";
  if (isset($_SESSION['deleteletter'])) {
    $deleteletter = $_SESSION['deleteletter'];
    if ($deleteletter == 1) {
      ?>
        <div class='container'>
          <div class='row'>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                    <div class='resultmodal' id='resultmodal'>
                        <div class='resultmodalcontent'>Newsletter successfully deleted.</div>
                    </div>
                </div>
            </div>
        </div>
      <?php
    }
    elseif($deleteletter == 2){
      ?>

      <div class='container'>
        <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                      <div class='resultmodalcontent resultcontenterror'>Error in deleting Newsletter.</div>
                  </div>
              </div>
          </div>
      </div>
      <?php                
    }
    else{ }
  }
unset($_SESSION['deleteletter']);
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

  $total_pages = $conn->query("SELECT * FROM newslettertbl ")->num_rows;
// Check if thepage number is specified and check if it's a number, if not return the default page number which is 1.

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; 
// Number of results to show on each page.
 $num_results_on_page = 10;
  if ($stmt = $conn->prepare("SELECT * FROM newslettertbl ORDER BY sn desc LIMIT ?,?")) { 
  // Calculate the page to get the results we need from our table.
$calc_page = ($page - 1) * $num_results_on_page; 
$stmt->bind_param('ii', $calc_page, $num_results_on_page);
 $stmt->execute(); // Get the results... 
 $result = $stmt->get_result(); 
 
 ?>    
<!DOCTYPE html>
<html>
<title>Welcome To admin</title>
<head>
  <link rel="stylesheet" type="text/css" href="msg.css">
</head>
<script>
      // Add active class to the current page
      document.getElementById("newsletter").className = "active";
    </script>
<div class="container">

      <a href="newsletter.php"><button id="viewletters">Newsletter</button></a>

    <h2 id="subcount">All Newsletter</h2>
  <div class='table-responsive' style="max-width: 100%; margin: 1% auto 0%;">
    <table class='table table-striped table-bordered'>
   <tr>
      <th>S/N</th>
      <th>Message</th>
      <th>Admin Info</th>
      <th>Message Date</th>
      <?php
        if ($remove == 1) {
           ?>
           <th>Action</th>
           <?php
         } 
      ?>
    </tr>

    <tr>
        <?php while ($row = $result->fetch_assoc()): ?> 
        	<td><?php echo $row['sn']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['admininfo']; ?></td>
            <td><?php echo $row['msgdate']; ?></td>
            <?php 
              if ($remove == 1) {
             ?>
            <td>
                  <a title="click to delete" href="deletenewsletter.php?sn=<?php echo $row ['sn'];?>" onclick="return confirm ('Are you sure you want to delete Newsletter <?php echo 'No: '.$row['sn'];?> permanently ?')" ><button id="delete" class="btn btn-danger fa fa-trash"> Delete</button></a>
              </td>
              <?php
                }
              ?>
           </tr>
         <?php endwhile; ?>
    </table>
    </div>
    </div>

    <!-- pagination -->
	<?php if (ceil($total_pages / $num_results_on_page) > 0): ?> 
	<ul class="pagination"> 
	<?php if ($page > 1): ?> 
		<li class="prev"><a href="viewletters.php?page=<?php echo $page-1 ?>">Prev</a></li> 
		<?php endif; ?> 


		<?php if ($page > 3): ?> 
		<li class="start"><a href="viewletters.php?page=1">1</a></li> 
		<li class="dots">...</li> 
		<?php endif; ?> 


		<?php if ($page-2 > 0): ?><li class="page"><a href="viewletters.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?> 
		<?php if ($page-1 > 0): ?><li class="page"><a href="viewletters.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>


		<li class="currentpage"><a href="viewletters.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>


		<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="viewletters.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
		<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
		<li class="page"><a href="viewletters.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?> 
		<li class="dots">...</li> 
		<li class="end"><a href = "viewletters.php?page=<?php echo ceil($total_pages / $sum_result_no_page); ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
		<?php endif; ?>


		<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
		<li class="next"><a href="viewletters.php?page=<?php echo $page+1 ?>">Next</a></li>
		<?php endif; ?>
	</ul>
	<div style="height: 55px;"></div>

	<?php endif;?>
  <?php include "adminfooter.php"; ?>

<script type="text/javascript">
  $("#resultmodal").slideUp(0);
  $("#resultmodal").slideDown(500);
  setTimeout(function(){
    $("#resultmodal").slideUp(500);
  }, 2500);

</script>
</body>
</html>
<?php
$stmt->close();
}
?>