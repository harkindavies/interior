
<!DOCTYPE html>
<html>
<head>
	<title>AkinDavis interior</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=email].input, input[type=password].input {
    width: 100%;
    padding: 10px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=email].input:focus, input[type=password].input:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
.button, .cancelbtn, .signupbtn {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.button:hover, .cancelbtn:hover, .signupbtn:hover  {
    opacity:1;
}
button[type="submit"].signupbtn:hover {
    background-color: #4CAF50;
    border: none;
    outline: none;
}
/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.mycontainer {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    left: 0;
    top: 0;
    width: 90%; /* Full width */
    height: 100%; /* Full height */
    overflow: ; /* Enable scroll if needed */
    background-color: rgba(255,255,255,0.01);
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 3% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid mediumseagreen;
    width: 50%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    /*margin-bottom: 25px;*/
}
 
/* The Close Button (x) */
.btnclose {
    position: absolute;
    left: 72%;
    top: 14%;
    font-size: 40px;
    font-weight: bold;
    color: #f44336;
    opacity: 1;
    z-index: 999;
}

.btnclose:hover,
.btnclose:focus {
    color: #bbb;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */


@media screen and (max-width: 900px) {
	.btnclose {
    	left: 93%;
    	top: 7%;
	}
  .modal-content {
    width: 95%;
    margin-left: 10%;
  }
}

@media screen and (max-width: 700px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
    .btnclose {
      left: 90%;
      top:11%;
  }
  .modal{
    overflow: auto;
  }
  body{
    overflow: ;
  }
  .modal-content {
    width: 93%;
    margin-left: 7%;
  }
  
}

</style>
<body>

<button class="button" id="contactpage" onclick="document.getElementById('id01').style.display='block'" style="width:auto; display:none;">Sign Up</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="btnclose" title="Close Modal">&times;</span>
  <form class="modal-content" action="contactprocess.php" method="POST">
    <div class="mycontainer">
      <div style="text-align: center;">
      <h1>Message</h1>
      <img id="epic" class="img img-circle" src="" height="100px" width="100px">
      <p style="text-align: center; font-size: 17px;">Please fill this form to send your message to <input id="emsg" style="color: mediumseagreen; outline: none; border: none; width: 100%; text-align: center;" readonly="" name="remail"></p>
      </div>
      <hr>
      <label for="email"><b>Email</b></label>
      <input class="input" type="email" placeholder="Enter Your Email" name="senderemail" required>

      <label for="message"><b>Message</b></label><br />
      <textarea style="width:100%; height:130px;" placeholder="" name="message" required=""></textarea>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="contact" type="submit" class="signupbtn">Send</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
$(document).ready(function(){
	$("#contactpage").click(function(){
		$("#id01").fadeOut(0);
		$("#id01").fadeIn(1000);
	});
})

</script>
</body>
</html>