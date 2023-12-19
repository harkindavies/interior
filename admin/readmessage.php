<!DOCTYPE html>
<html>
<head>
<title>Welcome To admin</title>
	<style type="text/css">
		body{background-image: url();}


	#addpromove > div{
		margin: 70px 0 0 0;
		transition: 0.5s;
	}
	.choosepro{
		background: mediumseagreen;
		opacity: 0.9;
		border: 1px solid transparent;
		border-radius: 4px;
		outline: none;
		padding: 5px 10px;
		transition: 0.5s;
		margin-right: 5px;
	}
	a .choosepro {
		color: #fff;
		text-decoration: none;
		font-size: 17px;
	}
	.choosepro:hover{
		background: rgb(250, 255, 189);
		/*border: 1px solid mediumseagreen;*/
		transition: 0.5s;
		color: mediumseagreen;
		box-shadow: 2px 3px 4px #000000b5;
	}
	#delete:hover{
		color: red;
	}
	button.choosepro span{
		margin-left: 10px;
	}

	.message{
		margin: 1% auto;
		width: 600px;
		border: 1px solid #aaa;
		border-radius: 5px;
		min-height: 450px;
		background: rgba(255,255,255,.5);
	}

  .resultmodal{
  	display: none;
    width: 60%;
    height: ;
    background: rgba(0,200,100,0.7);
    position: fixed;
    margin: 0 auto;
    left: 20%;
    top: 0%;
    z-index: 999;
    border: 1px solid mediumseagreen;
    border-radius: 0  0 5px 5px;
  }
  .resultmodalcontent{
    color: #fff;
    font-size: 23px;
    text-align: center;
    padding: 10px;
    font-family: Helvital;
    word-spacing: 3px;
  }

  .resulterror{
    border: 1px solid #d50000;
    background: rgba(255,0,0,0.6);

  }

  .resultcontenterror{
    color: #fff; 
  }

	</style>
</head>

<?php
require "../conn.php";
include "header.php";
//session_start();
if (!isset($_SESSION['adminemail'])) {
	# code...\
	echo '<script> window.location="login.php";</script>';
} 
else{
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

  		  	$read = "read" ;
		  	$get_id = $_GET['id'];
		    $statement = mysqli_query($conn,"select * from messagetbl where sn = '$get_id' order by msgdate asc");
		    $updateread = "UPDATE messagetbl SET msgread = '$read' WHERE sn= '$get_id' ";
		    $rq = mysqli_query($conn, $updateread);
		    if ($rq) {
		    	
		    
		    $count = mysqli_num_rows($statement);
		            $result=mysqli_fetch_assoc($statement);
		      

	require "autolog.php";
$nomsg = "";
?>
<body>
    <div class="container-fluid">
		<div class="row" id="addpromove">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<a href="messages.php"><button class="choosepro" id="unreadmsg">Unread Messages<span class="fa fa-envelope-o"></span></button></a>
				<a href="red_messages.php"><button class="choosepro" id="redmsg">Red Messages<span class="fa fa-folder-open-o"></span></button></a>
				<a title="Click to delete" onclick="return confirm('Are you sure you want to delete this message')" href="deletemessage.php?id=<?php echo $result ['sn'];?>" ><button id="delete" class="choosepro"> Delete Message<span class="fa fa-trash"></span></button></a>
				<?php
					if ($remove == 1) {
					?>				
						<a href="messagerecycle.php"><button class="choosepro" id="deletedmsg">Messages Bin<span class="fa fa-trash-o"></span></button></a>
					<?php
					}
				?>
			</div>
		</div>
	</div>
	
		<div class="container">
		    <div class="row">
		    	<div class="message">
					    <p style="text-align: center; padding: 10px 10px 2px; font-size: 2em; border-bottom: 1px solid #aaa">Message</p>
						<p style="padding: 5px; line-height: 1.5; font-size: 17px; font-family: serif;"><?php echo $result['message'];?></p>

						<?php
						}

							else{
								?>
						 		<div class='container'>
									<div class='row'>
							            <div class='col-md-12 col-sm-12 col-xs-12'>
							                <div class='resultmodal resulterror' id='resultmodal'>
							                    <div class='resultmodalcontent resultcontenterror'>Unable to read the message at the moment</div>
							                </div>
							            </div>
							        </div>
							    </div>
							    <script type="text/javascript">
									$("#resultmodal").slideUp(0);
									$("#resultmodal").slideDown(500);
									setTimeout(function(){
									  $("#resultmodal").slideUp(500);
									//$("#mypopmodal").fadeOut(1000);
									}, 2500);

							    	setTimeout(function(){
							    		window.location="red_messages.php";
							    	},3100)
							    </script>
							    
								<?php
							}

							?>
						</div>
				
				</div>
			</div>
		</div>
			<div style="height: 55px;"></div>
			<?php
		
	 	 include "adminfooter.php";
	 	}
	 	  ?>

</body>
</html>