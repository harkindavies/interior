<?php
require "../conn.php";
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Footer</title>

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/font-awesome.min.css">

    <style type="text/css">
    	footer#adminfooter{
			box-sizing: border-box;
		    font-family: arial, sans-serif;
			text-align: center;
			min-width: 100%;
			font-size: 18px;
			height: auto;
			color: #eee;
			padding: 10px 0 0;
			text-transform: capitalize;
			position: fixed;
			bottom: 0;
			background-color: rgba(0,0,0,0.7);
			right: 0;
			
		}

    </style>
    <body>
    	<div class="footer container-fluid">
		   	<footer id=adminfooter>
		   	  <p class="copy2" style="text-align: center;">Copyright &copy; <?php echo date("Y");?>, We <span class="fa fa-heart-o" style="color: limegreen; opacity: 0.7;"></span> You at <span style="color: limegreen; opacity: 0.7;">AkinDavis</span><span> Ineterior Decoration</span></p>
		   </footer>
		</div>
		
	</body>
</html>