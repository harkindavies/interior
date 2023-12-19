<?php
require "../connection.php";
session_start();
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrapnew/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrapnew/css/font-awesome.min.css">
	<!--link rel="stylesheet" type="text/css" href="main2.css"-->
	<!--link rel="stylesheet" type="text/css" href="toggle.css"-->
	<script type="text/javascript" src="../bootstrapnew/js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrapnew/js/bootstrap.min.js"></script>
	<style type="text/css">
	/*header start */
		.space{height: 70px;}
		.topimage{
			position: absolute; 
			top: -10px; left: 8%;
		}
		/*header end */

		  /*my dropdown styling */

   .dropdown ul li #a{
    font-size: 16px;
    transition: 1s ease;
   }
.dropdown ul li #a:hover{
    background-color: rgba(0,0,0,.7);
    transition: 1s ease;
  }
  .dropdown ul li .active{
		color: rgb(255,79,0);
		transition: 1s;
		font-weight: ;
  }
  .dropdown ul li .active:hover{
		color:purple;
		transition: 1s;
		outline: none;
	}
	.dropdown ul li .active:hover .active.fa-caret-right{
		color:purple;
		
	}
	.dropdown button.active, .dropdown button.active .active{
		color: rgb(255,79,0);
		transition: 1s;
	}
	.dropdown.active{
		color: rgb(255,79,0);
		transition: 1s;
	}

  button.activedrp{
    background-color:transparent; 
    color: #eee;
    border:none;
    transition: 1s;
    padding: 4px 10px;
  }

  button.activedrp:hover{ color: steelblue; }

  button.activedrp:hover .activecaret, .activecaret, .activecaret:hover{
		color: rgb(255,79,0);
	}
  button.activedrp:focus, button.activedrp:focus .caret{
    color: steelblue;
  }
  button.activedrp.actbtn:focus {transition: 1s;}

	button.activedrp.actbtn:hover{
		outline: 1px solid steelblue;
		transition: 1s;
	}
	button.activedrp.actbtn{
		outline: 1px solid transparent;
		transition: 1s;
	}

  .drp{background-color: transparent;}
  .caret.activecaret{
  	color: rgb(255, 79, 0);
  }
  .dropdown, .caret{
  	outline: 1px solid transparent;
  	transition: 1s ease;
  	
	}
	.actbtn{
		outline: 1px solid transparent;
		transition: 1s ease;
	}
	.actbtn:hover{
		outline: 1px solid steelblue; 
		transition: 1s;
	} 

  .dropdown:hover{
    outline: 1px solid steelblue;
    transition: 1s ;
  }
  .dropdown:hover .caret{
  	color: steelblue;
  	transition: 1s;
  }
   .dropdown ul li a{color: #fff;
    font-size: 16px;
    transition: 1s ease;
   }
  .dropdown ul li a:hover{
    color: steelblue;
    background-color: rgba(0,0,0,.7);
    transition: 1s ease;
  }

  .dropdown ul{
    background-color:transparent;
    background-color: rgba(0,0,0,.6);
    transition: 0.5s ease;
  }

  /* active dropdown hover */
	.dropdown.active:hover{
		color: rgb(255,79,0);
		transition: 1s;
		outline: 1px solid rgb(255,79,0);
	}
	.dropdown button.active:hover{
		color: rgb(255,79,0);
	}
	button.activedrp.active:focus{
		color: rgb(255,79,0);
	}
	button.activedrp.active:focus .caret{
		color: rgb(255,79,0);
	}

	/*blockmenu styling for small screen start*/
	#menu .blockline li .active2:hover .caret{
		transition: 1s;
		color: steelblue;
	}
	#menu .blockline li .active2, #menu .blockline li .active2:hover{
		outline:none;
		color: rgb(255,79,0);
	}

	#menu .blockline li .activeli:hover{ color: purple;}

	#menu .blockline li .active2:hover .activecaret, #menu .blockline li .active2:hover .caret{
		color: unset;
	}
	#menu .blockline li .active2:focus .activecaret, #menu .blockline li .active2:focus .caret{
		color: unset;
	}
	#menu .blockline .dropdown-toggle.active2,#menu .blockline .dropdown-toggle.active2:focus{
		outline: 1px solid transparent;
		transition: 1s;
	}
	#menu .blockline .dropdown-toggle.active2:hover{
		outline: 1px solid rgb(255,79,0);
		transition: 1s;
	}
	.dropdown-menu.uldrp.uldrp2{
		position: absolute;
		/*left:57%;*/
		padding-top: 0;
		padding-bottom: 0;
		border: none;
		margin-top: 0;
		top: 10px;
		width: 167px;
	}
	.dropdown-menu.uldrp.uldrp2.admin{left:57%;}
	.dropdown-menu.uldrp.uldrp2.view{left:60.3%;}
	.dropdown-menu.uldrp.uldrp2.message{left:59.6%;}
  /*block styling for small screen end */

	/*dropdown styling end */
	a.active{color:steelblue;} 
	a.active:hover{outline: 1px solid #fff;}		

	.linecontainer{
		background-color: rgba(0,0,0,.7); 
		background-color: rgba(0,0,0,.8);
		width: 100%;
		height: 70px;
		padding:  20px 10px;
		font-size: 20px;
	}
	.linecontent{list-style-type: none; 
		position: absolute; 
		right: 30px;					
	}
	.linecontainer .line .linecontent>li{display:inline-block;  
	}
	.linecontent li a :hover, .linecontent li #a :hover{
		color:steelblue;
		transition: 0.5s;
	}
	.linecontent li #a span.active.fa-caret-right:hover{
	 	color: purple;
	 }
	
	.linecontainer .line .linecontent li > a, .linecontainer .line .linecontent li > #a{
		text-decoration: none;
		padding: 7px 15px;
	}

/* for toggling and it button */
.times {
	font-weight: bold;
	color: red;
}
	.navcontainer{background-color: rgba(0,0,0,.5);
		background-color: rgba(0,0,0,.8);
		z-index: 1;
		transition: 5s; 
		position: fixed; 
		top: 10px; 
		right: 0;
		width: 100%; 
		padding: 0 10px;
		margin-top: -10px;
		font-size: 20px;
	}
	.blockline{list-style-type: none; 
		margin-left: -20px;
		transition: 1s;
	}
	
	.blockline>li{padding: 5px; margin: 10px;}

	.blockline li a:hover, .blockline li #a:hover{background-color: transparent; 
		outline: 1px solid steelblue; 
		margin: 3px;
		transition: 1s ease all;
	}
	.blockline li a.active1:hover, .blockline li #a.active1:hover{
		background-color: transparent;
		outline: 1px solid #fff;
	}
	#menu .blockline li a, #menu .blockline li #a{color: #eee; 
		text-decoration:none;
		margin: 2px;
		outline: 1px solid transparent;
		padding: 7px 20px;
		transition: 1s;
	}

	#menu .blockline li a:hover, #menu .blockline li #a:hover{
		color: steelblue;
		transition:  1s;
		outline: 1px solid steelblue;
	}
	#menu .blockline li #a.active, #menu .blockline li .blk.active{
		color: rgb(255, 79, 0);
	}
	#menu .blockline li #a.active:hover,#menu .blockline li .blk.active:hover{
		color: purple;
	}

	#menu .blockline li .dropdown li a, #menu .blockline li .dropdown li #a{outline: none;}

	#click, #click2{
		position: absolute; 
		right: 10px; 
		padding: 5px;	
		margin-top: 15px;
		background-color: steelblue;
		border:none;
		width: 40px;
		outline: 1px solid steelblue;
	}
	#click2{
		outline: 1px solid steelblue;
		display: none;
		transition: 3s;
	}
	
	#click:focus, #click2:focus{
		background-color: transparent;
		color: steelblue;
	}

	.fa-bars{font-size: ; color: #fff;}

	#menu{text-align: center; 
		padding: 10px; 
		display: none;
		margin-top: 33px;
	}
	a:hover{text-decoration: none;}
	.linecontent .other a{transition: 1s; color: #eee;}
	.linecontent .other a:hover{
		color: steelblue;
		transition: 1s;
	}
	.linecontent .other{
		transition: 1s;
		outline: 1px solid transparent;
		padding: 4px 0px;
	}
	.linecontent .other:hover{
		transition: 1s;
		outline: 1px solid steelblue;
	}
	/*toggle end */

	/* "a" dropdown addtion design */

	#a{color: #fff;}
	.fa-caret-right{
		transition: 0.5s;
	}
	#a:hover, #a:hover .fa-caret-right{
		color: steelblue;
		transition: 0.5s;
	}
	#a.active{
		color: rgb(255, 79, 0);
	}
	#a.active:hover, #a.active:hover .active.fa-caret-right{
		color:purple;
	}
	/*end*/

	@media screen and (min-width: 901px){
		#click, #click2{display: none;}
		#menu{position: absolute;
			right: 10px;
			top:-10px;
			display: none;
		}
		.blockline, .navcontainer{display: none;}
	}

	@media screen and (max-width: 900px){
		.linecontent{display: none;}
		 #click {display: block;}
	}
	@media screen and (max-width: 730px){
		.blockline{
			float: left;
			text-align: left;
			padding: 0;
			transition: 1s;
		}
		#menu .blockline li a, #menu .blockline li #a{
			transition: 0s;
			padding: 7px;
		}
  
		.searchbtn{max-width: 85%; text-overflow: ellipsis;}
		.dropdown-menu.uldrp.uldrp2.admin{left:70%;}
		.dropdown-menu.uldrp.uldrp2.view{left:100%;}
		.dropdown-menu.uldrp.uldrp2.message{left:93%;}

		li ul.pickrentb{
  			width: 115px;
  		}
	}

	@media screen and (max-width:440px){
		li ul.pickrentb{
			left: -68%;
		}
	}


		/*body{background-image: url("../img/paper.gif");}*/
		div tr td a>button{margin: 5px 2px;}
		table, tr>th{text-align: center;}
		div>table{ font-size:; background-color: rgba(101,101,50,.2);}
		tr>th{text-transform: uppercase;}
		td{text-transform: capitalize;}
		td:nth-child(7){text-transform: unset;}
		div .capcontainer{font-size: 2.3em; text-align: center; margin: 40px 0 0px; clear: both;}
	</style>
</head>
<body style="background-color: #ddd;">
	<div class="linecontainer" style="position: fixed;z-index: 1;">
  <div class="topimage">
	  <img class="footerimg" src="../img/newheaderlogo2.png" alt="no image found" width="80px" height="80px" style="margin-top: 5px;">
	</div>
		<div class="line">
			<ol class="linecontent">
				<li class="other"><a href="../index.php" onclick="return confirm('Are you sure you want to leave the admin page and go to Memak home page?')" title="Goto Memak Homepage">Home</a></li>
				
			    <li>
		            <div class="dropdown active">
		                <button class="dropdown-toggle activedrp active" type="button" data-toggle="dropdown">View Ticket
		                <span class="caret activecaret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                  <li><a href="viewallticket.php">View All Ticket</a></li>
		                  <li><a href="activeticket.php">View Active Ticket</a></li>
		                   <li><a  class="active" href="availablecar.php">Car Gallery</a></li> 
		                  <li><a href="registeredcustomer.php">View Customer</a></li>

		                  <li onmouseleave="clickme()"><div id="a" onmouseover="clickm()"> On Board Car <span class="fa fa-caret-right" style="margin-left: 10px;"></span></div>
		                  	<ul class="pickrent" id="pickrent" onmouseleave="leaveme()"  onmouseover="leavem()">
		                  		<li><a href="pickcar.php">Await Picking Cars</a></li>
		                  		<li><a href="returncar.php">Await Return Cars</a></li>
		                  	</ul>
		                  </li>
		                </ul>
		            </div>
		        </li>

		        <li>
		            <div class="dropdown">
		                <button class="dropdown-toggle activedrp" type="button" data-toggle="dropdown">Admin
		                <span class="caret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                  <li><a href="addadmin.php">New Admin</a></li>
		                  <li><a href="changepassword.php">Change Password</a></li>
		                  <li><a href="viewadmin.php">View Admin</a></li>
		                  <li><a href="addcar.php">Add New Car</a></li>
			            </ul>
			        </div>
			    </li>
					
				<li>
					<div class="dropdown">
						 <button class="dropdown-toggle activedrp" type="button" data-toggle="dropdown">Messages
		                <span class="caret"></span></button>
		                <ul class="dropdown-menu uldrp">
		                	<li><a href="helpmessage.php">Help Request</a></li>
		                	<li><a href="messages.php">Message</a></li>
		                </ul>
					</div>
				</li>
				<li class="other"><a href="logout.php">Logout</a></li>
			</ol>
		</div>
	</div>


	<div class="navcontainer">
		<button onclick="toggle()" id="click"><span class="fa fa-bars"></span></button>
		<button onclick="toggle()" id="click2"><span class="glyphicon glyphicon-remove" style="color: red;"></span></button>
		<div id="menu">
			<ol class="blockline">
				<li><a href="../index.php"  onclick="return confirm('Are you sure you want to leave the admin page and go to Memak home page?')" title="Goto Memak Homepage">Home</a></li>
				
				 <li>
	               <div class="dropdown active2 activate">
	                <button class="dropdown-toggle activedrp actbtn active2" type="button" data-toggle="dropdown">View Ticket
	                <span class="caret activecaret" style="margin-left:10px;"></span></button>
               		<ul class="dropdown-menu uldrp uldrp2 view">
		                <li><a href="viewallticket.php">View All Ticket</a></li>
		                <li><a href="activeticket.php">View Active Ticket</a></li>
		                <li><a class="active2 activeli" href="availablecar.php">Car Gallery</a></li>
		                <li><a href="registeredcustomer.php">View Customer</a></li>

		                <li onmouseleave="clickmeb()"><div id="a" onmouseover="clickmb()"> On Board Car <span class="fa fa-caret-right" style="margin-left: 10px;"></span></div>
		                  	<ul class="pickrentb" id="pickrentb" onmouseleave="leavemeb()"  onmouseover="leavemb()">
		                  	<li><a href="pickcar.php">Await Picking</a></li>
		                  	<li><a href="returncar.php">Await Return</a></li>
		                  </ul>
		                  </li>
		                
	                </ul>
	              </div>
	            </li>

	            <li>
	               <div class="dropdown active2">
	                <button class="dropdown-toggle activedrp actbtn" type="button" data-toggle="dropdown">Admin
	                <span class="caret" style="margin-left:10px;"></span></button>
               		<ul class="dropdown-menu uldrp uldrp2 admin">
		                <li><a href="addadmin.php">New Admin</a></li>
		                <li><a href="changepassword.php">Change Password</a></li>
		                <li><a href="viewadmin.php">View Admin</a></li>
		                <li><a href="addcar.php">Add New Car</a></li>
		            </ul>
		          </div>
		        </li>
				
				<li>
					<div class="dropdown active2">
						 <button class="dropdown-toggle activedrp actbtn" type="button" data-toggle="dropdown">Messages
		                <span class="caret" style="margin-left:10px;"></span></button>
               			<ul class="dropdown-menu uldrp uldrp2 message">
	                		<li><a href="helpmessage.php">Help Request</a></li>
	                		<li><a href="messages.php">Message</a></li>
		            	</ul>
					</div>
				</li>
				<li><a href="logout.php">Logout</a></li>
			</ol>
		</div>
	</div>
	
	<div class="space"></div>
	<div onclick="closefunction()">
		<p style="float: right;margin: 400px 30px 0 0; font-size: 18px;">To Add a new Car <a style="text-decoration: none;" href="addcar.php">Click here</a> </p>
		<div class="capcontainer" style="margin-top: 400px;"><p class="cap">Car Gallery</p></div>

		
		<?php include "adminfooter.php"; 
	?>
		
	</div>
</body>
</html>

<!-- javascript -->
<script type="text/javascript" src="toggle.js"></script>
<style type="text/css">
	
</style>