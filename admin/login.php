<?php 
	include "../conn.php";

	//require "header.php" ;

	$time = time();
	session_start();
?>

<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../admin/admincss.css">
	<script type="text/javascript" src="../bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php

// define variables and set to empty values
	$passworderr = $emailerr = "";
	$password = $email = "";
	$msg = $passmsg = $welcomemsg = $ticketno = "";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["password"])) {
			$passworderr = "Password is required*";
		} else {
			$password = test_input($_POST["password"]);
			$password = mysqli_real_escape_string($conn, $password);
		}

		if (empty($_POST["email"])) {
			$emailerr = "Email is required*";
		} else {
			$email = test_input($_POST["email"]);
			//check mail valid or well formed
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailerr = "invalid email address";
				$email = "";
			}
		}
	   
		if (empty($password)) {
			# code...
			$passworderr = "Password is required*";
		}
		else{
		}

		$select = "SELECT * FROM adminreg WHERE email = '".$email."'";
		$check = mysqli_query($conn, $select);
		$chkresult = mysqli_num_rows($check);
		if (($chkresult == 1) && (!empty($password))) {
			if ($result = mysqli_fetch_assoc($check)) {
				$dp = $result['password'];
				if (password_verify($password, $dp)) {
					$_SESSION['adminemail'] = $email;
					$_SESSION['profilepic'] = $result['photo'];
					$_SESSION['adminfirstname'] = $result['firstname'];
					$_SESSION['adminlastname'] = $result['lastname'];
					$_SESSION['adminpassword'] = $password;
					$_SESSION['admintime'] = $time;
					$_SESSION['position'] = $result['position'];
					header("location:index.php");
				}
				else{
					$passworderr =  "Incorrect Password";
				}
			
			}
			else{}
		}
		elseif($chkresult == 1 && (empty($password))){
			$passworderr = "Password is required*";
		}
		elseif($chkresult < 1 && (!empty($email))){
			$emailerr = "Not a Registered Email";
		} else{}
		
	}
?>

	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="formbody" style=" margin: 25% auto;">
					<div class="formbackground" style="background:; text-align: center;">
						<div class="avatar">
							<img src="../img/avatar.png" class="img-circle" height="100px" width="100px">
						</div>
						<span class="logintext">Login</span>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="subform">
							<div class="rows">
								<span class="fa fa-user" for="email"></span><input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" id="email" autocomplete oninput="chang(this)"><br /><span id="selectml" class="error"><?php echo $emailerr; ?></span>
							</div>
							<div class="rows">
								<span class="fa fa-lock" for="password"></span><input type="password" name="password" placeholder="Enter your Password" id="password" autocomplete="off" oninput="chang(this)"><br />
								<span id="selectps" class="error"><?php echo $passworderr; echo $passmsg; ?></span>
							</div>
							<div class="button">
								<label></label>
								<button type="submit" id="mysubmit" class="login" name="submit" onclick="submitit(this)"><span id="loading" class="fa fa-circle-o-notch fa-spin"></span> Login</button><!--i class="iload"><span class="fa fa-circle-o-notch fa-spin loading" id="loading"></span><i-->

							</div>
							<div class="">
								<label></label>
							<span class="errmsg" id="msg"><?php echo $msg; ?></span>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>

	<div class="footer container-fluid">
	   	<footer id=adminfooter>
	   	  <p class="copy2" style="text-align: center;">Copyright &copy; <?php echo date("Y");?>, We<span class="fa fa-heart-o" style="color: limegreen; opacity: 0.7;"></span> You at <span style="color: limegreen; opacity: 0.7;">AkinDavis</span><span> Ineterior Decoration</span></p>
	   </footer>
	</div>

</div>

</body>
<style type="text/css">
	.rows{
		margin: 25px auto;
		background: #eee;
		padding: 0;
		height: 38px;
		width: 296px;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px; 

	}
	
	.rows .fa{
		padding: 10px;
		border-style: none/*solid*/;
		border-width: 1px;
		border-color: /*#bbb transparent #bbb #bbb*/;
		background: #eef;
		transform: translate(0%, 1%);
		font-size: 15.7px;
	}

	.rows input[type=password], .rows input[type=email]{
		font-size: 17px;
		width: 260px;
		border: none;
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px; 
		padding: 7px;
		border:none /*1px solid #bbb*/;
		background: #eee;
	}

	.rows input[type=password]:focus, .rows input[type=email]:focus{
		border-top-right-radius: 7px;
		border-bottom-right-radius: 7px;
		outline: none;
		background: rgb(250, 255, 189);
	}

	.button button#mysubmit{
		border: 1px solid transparent;
		outline: 1px solid #fff;
		background: mediumseagreen;
		padding: 8px 30px 8px 10px;
		border-radius: 5px;
		color: #fff;
		transition: .5s;
		font-size: 18px;
	}
	.button button#mysubmit:hover{
		color: mediumseagreen;
		background: transparent;
		border: 1px solid mediumseagreen;
		transition: .5s;

	}
	#loading{
		font-size: 20px;
		visibility: hidden;
	}
	.error, .errmsg{
		color: #d50000;
	}
	.logintext{
		font-family: sans-serif;
		font-size: 30px;
		font-variant: small-caps;

	}

    footer#adminfooter{

	    font-family: arial, sans-serif;
		text-align: center;
		width: 100%;
		font-size: 18px;
		height: auto;
		color: #eee;
		padding: 10px 0 0;
		text-transform: capitalize;
		position: fixed;
		bottom: 0;
		background-color: rgba(0,0,0,0.7);
		box-sizing: border-box;
		right: 0;	
	}

</style>
<style type="text/css">
	@media screen and (min-width: 200px) and (max-width: 450px){
		#formid  div{
			min-width: 70%;
			margin: 3px auto;
		}	
	}
	@media screen and (max-width: 1204px){
		#formid  div{
			margin: 3px auto;
		}
		#formid > div.rowss > input{
			margin-right: unset;
		}
	}
	@media screen and (max-width: 359px){
		.rows input[type=password], .rows input[type=text], .rows input[type=email], .rows  input[type=file], .rows select{
			font-size: 17px;
			width: 200px;
		}
	}
</style>

<script type="text/javascript">
	function chang(sltd){
		var inputdata = $(sltd).parent("div");
		var inputchld = inputdata.children("span")[1];
		var inputchild = $(inputchld).attr("id");
		document.getElementById(inputchild).innerHTML = "";
		document.getElementById("msg").innerHTML = "";
	}

	function submitit(subm){
		var mailchk = document.getElementById('email').value;
		var passchk = document.getElementById('password').value;
		if(mailchk != "" && passchk !=""){
			var load = document.getElementById('loading');
			load.style.visibility = "visible";
		}
	}
</script>