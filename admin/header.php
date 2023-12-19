<?php 
	include "../conn.php";
	session_start();
	//$profilepic = "";
	if (!isset($_SESSION['adminemail'])) {
		echo '<script>window.location="login.php";</script>';
	}
	else{
		$picture = $_SESSION['profilepic'];
		$email = $_SESSION['adminemail'];
		$newread = "read";
		$newmsg = mysqli_query($conn, "select * from messagetbl where msgread !='$newread' and receiver ='$email'");
		$qnew = mysqli_num_rows($newmsg);
		if ($qnew == 0) {
			$newmessageno = "";
		}
		else{
			$mymsg = "<a href='messages.php' style=' right:35px; top:19px';><span class='fa fa-envelope' style='color:orange; font-size:20px; position:absolute; right:30px; top:19px;'></span><span class='fa' style='position:absolute; right:36px; top:24px; font-size:17px; color:#fff;'>*</span>
				<span class='badge' style='background-color:transparent; font-size:12px; position:absolute; right:14px; top:12px;color:red;'> $qnew</span>
			</a>";
		}

			$welcomemsg ="";
			$welcomemsg = $_SESSION['adminfirstname']." ".$_SESSION['adminlastname'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>AkinDavis interior</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../admin/admincss.css">
	<script type="text/javascript" src="../bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid"  id="">
		<div class="row">
			<div class="top col-md-12 col-sm-12 col-xs-12">
				
				<div class="google col-md-4 col-sm-6 col-xs-12 fa fa-google-plus-circle"><span> Harkinpardeydavid@gmail.com</span></div>
				<div class="phone col-md-3 col-sm-6 col-xs-5 fa fa-phone"><span> +2348164028503</span></div>
				<div class="location-arrow col-md-5 col-sm-6 col-xs-7 fa fa-location-arrow"><span> N0 2, Akinpade Layout Akobo Ibadan <span class="oyo">Oyo State.</span></span></div>
			</div>
		</div>
	</div>
		
</body>
</html>
	
<style>

</style>
</head>
<body>

<span id="closein" onclick="openNav()">&#9776;</span>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <span class="name">Akin<span>Davis</span></span><br><br>
	<img src="<?php echo $picture; ?>" class="img-circle" height="100px" width="100px"><br /><br />

	<p><a id="homepg" class="dashboard"  href="dashboard.php" >My Dashboard <span class="glyphicon glyphicon-dashboard"  style="margin-left: 10px;"></span></a></p>

	<ul>
		<li class="dropdown"><a id="project" class="list dropdown-toggle" type="button" data-toggle="dropdown"> Project <span class="fa fa-leanpub"  style="margin-left: 10px;"></span><span class="caret" style="position: relative; left: 50%;"></span></a>
			<ul id="menulist" class="dropdown-menu dropdown-menu-right" style="background: #222;">
				<li><a href="addproject.php">Add Project   <span class="fa fa-plus-square-o" style="margin-left: 10px;"></span></a></li>
				<li><a href="viewproject.php">View Project   <span class="fa fa-database" style="margin-left: 10px;"></span></a></li>
			</ul>

		</li>

		<li><a id ="order" class="list" href="order.php"> Order <span class="fa fa-book" style="margin-left: 10px;"></span></a></li>
		<li><a id="messages" class="list"  href="messages.php"> Messages <span class="fa fa-envelope" style="margin-left: 10px;"></span></a></li>
		<li><a id="addadmin" class="list" href="addadmin.php"> New Admin <span class="fa fa-user-plus" style="margin-left: 10px;"></span></a></li>
		<li><a id="viewadmin" class="list" href="viewadmin.php"> View Admin <span class="fa fa-user-times" style="margin-left: 10px;"></span></a></li>
		<li><a id="newsletter" class="list" href="newsletter.php"> Newsletter <span class="fa fa-newspaper-o" style="margin-left: 10px;"></span></a></li>


		<li><a id ="logout" class="list" href="logout.php"> Logout <span class="fa fa-sign-out" style="margin-left: 10px;"></span></a></li>
	</ul>

</div>
<style type="text/css">
	body{
	}
	@media screen and (max-width: 768px){
		.top{
			display: none;
		}
	}
	
	</style>

	<script>
	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	    document.getElementById("closein").style.display ="none";
	    //document.getElementById("addpromove").style.marginLeft ="230px";
	    //document.getElementById("addpromove").style.transition ="0.5s";
	}

	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	    $("#closein").fadeIn(1300);
    	//document.getElementById("addpromove").style.marginLeft ="0";
	    //document.getElementById("addpromove").style.transition ="0.5s";

	}

	function closeblur(){
		document.getElementById("mySidenav").style.width = "0";
	    $("#closein").fadeIn(1300);
    	//document.getElementById("addpromove").style.marginLeft ="0";
    	//document.getElementById("addpromove").style.transition ="0.5s";
	}
	</script>

<?php 	
} 
?>