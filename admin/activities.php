<?php
require "../conn.php";
//session_start();
include "header.php" ;
include "changep.php";
if (!isset($_SESSION['adminemail'])) {
	
	echo '<script> window.location="login.php";</script>';
}
require "autolog.php";
$email = $_SESSION['adminemail'];
$select = "SELECT * FROM adminreg WHERE email = '$email' ";
$query = mysqli_query($conn, $select);
$rslt = mysqli_fetch_assoc($query);
$password = $rslt['password'];
$picture = $rslt['photo'];
$fname = $rslt['firstname'];
$lname = $rslt['lastname'];
?>
<!DOCTYPE html>
<html>
<title>Welcome To admin</title>
	
	<link rel="stylesheet" type="text/css" href="../admin/admincss.css">
	<style type="text/css">
	.rows{margin: 20px;	}

	.rows .fa{
		padding: 13px;
		border-style: solid;
		border-width: 1px;
		border-color: #bbb transparent #bbb #bbb;
		background: #eee;
	}

	.rows input[type=password], .rows input[type=email]{
		font-size: 16px;
		width: 70%;
		border: none;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px; 
		padding: 9px;
		border: 1px solid #bbb;
		background: #eee;
	}

	.rows input[type=password]:focus, .rows input[type=email]:focus{
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px;
		outline: none;
		background: rgb(250, 255, 189);
	}

	.rows input[type=submit]{
		border: 1px solid transparent;
		outline: 1px solid #fff;
		background: mediumseagreen;
		padding: 10px 20px;
		border-radius: 5px;
		color: #fff;
		transition: .5s;
	}
	.rows input[type=submit]:hover{
		color: mediumseagreen;
		background: transparent;
		border: 1px solid mediumseagreen;
		transition: .5s;

	}
	.error, .errmsg{
		color: #d50000;
	}
	.logintext{
		font-size: 20px;
	}

	#myactivitiespg{
		position: absolute;
		bottom:  100px;
	}

	.formbackground{
		padding: 10px;
	}

	.closebtn{
		position: absolute;
		right: 35px;
		color: #d50000;
		font-size: 30px;
		cursor: pointer;
		font-weight: bold;
	}
	.closebtn:hover{
		color: #555;
	}
	.p p{
		color: mediumseagreen;
	}
	#homepg{color: mediumseagreen;}

</style>
</head>
<body style="background-color: #ddd;">

			<script>
			    // Add active class to the current page
			    document.getElementById("myactivities").className = "active";
			</script>
				
		<div class="container">
		<div class="row">
			<div id="myactivitiespg" class="col-md-offset-3 col-md-5 col-md-offset-4 col-sm-offset-1 col-sm-7 col-sm-offset-3 col-xs-12">
				<div class="formbody" style=" margin: 15% auto;">
					<i class="closebtn" onclick="closeTab()">&times;</i>
					<div class="formbackground" style="background: rgba(255,255,255,.9); text-align: center;">
						
						<div class="avatar">
							<img src="<?php echo $picture; ?>" class="img-circle" height="100px" width="100px">
						</div>
						<div class="p" style="font-size: 17px;">
							<label>Firstname: </label><p><?php echo $fname; ?></p>
							<label>Lastname: </label><p><?php echo $lname; ?></p>
							<label>Email: </label><p><?php echo $email; ?></p>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>

	   <?php include "adminfooter.php" ?>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myactivitiespg").slideUp(0);
		setTimeout(function(){
			$("#myactivitiespg").slideDown(1000);
		}, 500);
	});

	function closeTab(){
		$("#myactivitiespg").slideUp(1000);
	}
</script>
