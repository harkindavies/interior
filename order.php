<?php

  $resultmodal = $fname = $lname = $address = $phone = $site = $type = $images = $amount = $orderdata = "";

    function test_inputorder($orderdata) {
      $orderdata = trim($orderdata);
      $orderdata = stripslashes($orderdata);
      $orderdata = htmlspecialchars($orderdata);
      return $orderdata;
    }

    $orderdate = date("Y-m-d");
    $ordernum = "";
  //if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $namepattern = '/^[a-zA-Z ]*$/';
      if (preg_match($namepattern, $_POST['fname'])) {
        $fname = test_inputorder($_POST["fname"]);
      }
      else{
        $fname = "";
      }
      if (preg_match($namepattern, $_POST['lname'])) {
       $lname = test_inputorder($_POST["lname"]);
      }
      else{
        $lname = "";
      }
      $address = test_inputorder($_POST["address"]);
      $mail = test_inputorder($_POST["email"]);
      //check mail valid or well formed
      $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
       $ordernum ="<div class='container'>
              <div class='row'>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                    <div class='resultmodalcontent resultcontenterror'>Inavalid email address.
                    </div></div></div></div></div>";
        $mail = "";
      }
      
      $phone = test_inputorder($_POST["phone"]);
      $ppattern = '/^\(?([0]{1})\)?[-. ]?([0-9]{10})$/';
      if (!preg_match($ppattern, $phone) ) {
        $ordernum ="<div class='container'>
              <div class='row'>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                    <div class='resultmodalcontent resultcontenterror'>Inavalid phone number.
                    </div></div></div></div></div>";
      $phone = "";
    }
    else{ } 
      //$project = test_inputorder($_POST["project"]);
      $site = test_inputorder($_POST["site"]);
      $type = test_inputorder($_POST["type"]);
      $images = test_inputorder($_POST["images"]);
      $amount = test_inputorder($_POST["amount"]);

      if(empty($fname) || empty($lname) || empty($address) || empty($mail) || empty($phone) || empty($site) || empty($type) || empty($images) || empty($amount)){
        $ordernum ="<div class='container'>
              <div class='row'>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='resultmodal resulterror' id='resultmodal'>
                    <div class='resultmodalcontent resultcontenterror'>Invalid input, pls retry with valid data. 
                    </div></div></div></div></div>";
      }
      else{

      $selectorder = "SELECT * FROM ordertbl where firstname = '$fname' AND lastname = '$lname' AND address = '$address' AND email = '$mail' AND phone = '$phone' AND site_address  = '$site' AND type = '$type' AND images = '$images' AND amount = '$amount' " ;
      $selectorderchk = mysqli_query($conn, $selectorder);
      
      if (mysqli_num_rows($selectorderchk)>0) {
         $ordernum ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>You have place this order already
                              </div></div></div></div></div>";
      }
      else{

        $insertorder = "INSERT INTO ordertbl (firstname, lastname, address, email, phone, images, amount, site_address, type, orderdate) VALUES ('$fname', '$lname', '$address', '$mail', '$phone', '$images', '$amount', '$site', '$type','$orderdate')";
        $insertorderchk = mysqli_query($conn, $insertorder);
        if ($insertorderchk) {
           $ordernum ="<div class='container'>
                          <div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                              <div class='resultmodal' id='resultmodal'>
                                <div class='resultmodalcontent'>
                                  You have successfully place the order
                                    <span><img src='img/mark.png' height='30px' width='30px' style='margin-left: 10px;'></span>
                                </div></div></div></div></div>";
        }
        else{
           $ordernum ="<div class='container'>
                        <div class='row'>
                          <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='resultmodal resulterror' id='resultmodal'>
                              <div class='resultmodalcontent resultcontenterror'>Error occur while placing your order, pls try again
                              </div></div></div></div></div>"; 
        }
      }
      //}echo $fname . $lname . $address . $mail . $phone . $project . $site . $type;
    }
  }
  echo $ordernum;
?>
<!DOCTYPE html>
<html>
<title>AkinDavis interior</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
  <script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="script/order.js"></script>
  <link rel="stylesheet" type="text/css" href="css/order.css">

<body>
<div id="regForm">
<form id="bodyoverlay" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
  <div id="closeform" type="submit" name="close" class="close fa fa-close"></div>
  <h1 id="h1">Book Order:</h1>
  <div class="imgpreview" id="imgpreview">
    <span class="imagepreview" id="amntbox2" style="display: none;"></span>
  </div>
  
    <!-- One "tab" for each step in the form: -->
  <p id="projecta"></p>
  <div class="tab">Name:
    <p><input id="firstname" type="text" placeholder="Firstname..." onblur="orderfirstblur(this)" onkeyup="inpfirstname(this)" oninput="this.className = ''" name="fname"><span></span></p>
    <p><input id="lastname" type="text" placeholder="Lastname..." onblur="orderlastblur(this)" onkeyup="inplastname(this)" oninput="this.className = ''" name="lname"><span></span></p>
  </div>
  <div class="tab">Contact Info:
    <p><input placeholder="Address..." oninput="this.className = ''" name="address"></p>
    <p><input  type="email" placeholder="E-mail..." oninput="this.className = ''" onkeyup="ordermail(this)" onblur="ordermblur(this)" name="email" id="ordmail"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" onkeyup="orderphone(this)" onblur="orderpblur(this)" id="ordrphone" name="phone"><span></span></p>
  </div>
  <div class="tab">Description:
    <p><input placeholder="Please select a Project from our project page " id="projecta2" oninput="this.className = ''" name="project" readonly=""></p>
    <p><input placeholder="Site Address" oninput="this.className = ''" name="site"></p>
    <p><input placeholder="Type of Building" oninput="this.className = ''" name="type"></p>
    </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button class="cancel" type="button" id="cancelmodal">Cancel</button>
      <button class="btnnxtprv" type="button" id="prevBtnt" onclick="nextPrevnt(-1)">Previous</button>
      <button class="btnnxtprv" type="button" id="nextBtnt" onclick="nextPrevnt(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <!--span class="step"></span-->
  </div>
  <input id="images" name="images" readonly="" style="visibility: hidden;">
  <input id="amount" name="amount" readonly="" style="visibility: hidden;">

</form>
</div>
</body>
</html>

<?php 
  include 'conn.php';
?>

<script>
  $(document).ready(function(){  
    $("#order").click(function(){
      $("#regForm").css("bottom","-500px");
      $("#regForm").slideUp(0);
      $("#regForm").slideDown(1000)
      $("#regForm").css("bottom","-5px");
      $("#footercontainer").slideUp(1000);
      $("#up-footer").fadeOut(1000);
      $(".copy2").fadeIn(2000);

      /*this lines help generate image selected */
      var nosimg = document.getElementById("images").value;
           
      var myStr = nosimg;
      var stArray = myStr.split(" ");
      //alert(stArray.length-1);
  
    for (var i = 0; i < stArray.length-1; i++) {
      if (stArray.length-1 < 5) {
       $('<img />')
       .attr('src',stArray[i])
       .attr('class','appendim')
       .css('margin','2px')
       //.width('120px').height('120px')
       .appendTo($('#imgpreview'));
      }

      else {
         $('#imgpreview').css({'overflow-y':'scroll','height':'85px'});
      $('<img />')
       .attr('src',stArray[i])
       .css('margin','2px')
       .width('80px').height('80px')
       .appendTo($('#imgpreview'));
      }
 
    }
 
    });
    $("#closeform").click(function(){
      if (confirm("You are about to close this form, press Cancel to abort" )){
        location.reload(0);

        session_destroy($_SESSION['my_selected_img']);
        session_destroy($_SESSION['amnt_selected']);
        session_destroy($_SESSION['amnt_selectedall']);
        session_destroy($_SESSION['my_selected_imgall']);
      
        $("#regForm").slideUp(1000);
        $("#up-footer").fadeIn(2000);
      }
    });

    $("#cancelmodal").click(function(){
      if (confirm("You are about to cancel this order, press Cancel to abort" )){
        location.reload(0);

          session_destroy($_SESSION['my_selected_img']);
          session_destroy($_SESSION['amnt_selected']);
          session_destroy($_SESSION['amnt_selectedall']);
          session_destroy($_SESSION['my_selected_imgall']);
      
      }
      document.getElementById("imgsrc").src = "";
      document.getElementById("projecta2").value = "";
       $("#regForm").slideUp(1000);
       $("#up-footer").fadeIn(2000);
    });
  });   

var currentTabnt = 0; // Current tab is set to be the first tab (0)
showTabnt(currentTabnt); // Display the crurrent tab

function showTabnt(nt) {
  // This function will display the specified tab of the form...
  var xnt = document.getElementsByClassName("tab");
  xnt[nt].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (nt == 0) {
    document.getElementById("prevBtnt").style.display = "none";
  } else {
    document.getElementById("prevBtnt").style.display = "inline";
  }
  if (nt == (xnt.length - 1)) {
    document.getElementById("nextBtnt").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtnt").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(nt)
}

function nextPrevnt(nt) {
  // This function will figure out which tab to display
  var xnt = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (nt == 1 && !validateForm()) return false;
  // Hide the current tab:
  xnt[currentTabnt].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTabnt = currentTabnt + nt;
  // if you have reached the end of the form...
  if (currentTabnt >= xnt.length) {
    // ... the form gets submitted:
    document.getElementById("bodyoverlay").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTabnt(currentTabnt);
}

function validateForm() {
  // This function deals with validation of the form fields
  var xnt, ynt, int, valid = true;
  xnt = document.getElementsByClassName("tab");
  ynt = xnt[currentTabnt].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (int = 0; int < ynt.length; int++) {
    // If a field is empty...
    if (ynt[int].value == "") {
      // add an "invalid" class to the field:
      ynt[int].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTabnt].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(nt) {
  // This function removes the "active" class of all steps...
  var int, xnt = document.getElementsByClassName("step");
  for (int = 0; int < xnt.length; int++) {
    xnt[int].className = xnt[int].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  xnt[nt].className += " active";
}

$("#resultmodal").slideUp(0);
    $("#resultmodal").slideDown(500);
   setTimeout(function(){
      $("#resultmodal").slideUp(500);
   }, 10000);


    function orderphone(phon){
      var sparent = $(phon).parents('p');
      var pspan = sparent.children('span')[0];
      
      var pattern2 = /^\(?([0]{1})\)?[-. ]?([0-9]{10})$/;
      if(phon.value.match(pattern2) )
      {
        phon.style.color = 'mediumseagreen';
        pspan.innerHTML = "";
      }
      else{
        phon.style.color = 'red';
        pspan.style.color = 'red';
        pspan.innerHTML = "Pls follow this pattern 08123456789";
      }
    }

    function ordermail(ml){
      var ordermpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,10})+$/;
      if (ml.value.match(ordermpattern)) {
        ml.style.color = "mediumseagreen";
        
      }
      else{
        ml.style.color = "red";
      }
    }

    function orderpblur(pblur){
      var pcolor = $(pblur).attr('id');
      var npcolor = document.getElementById(pcolor).style.color;
      if(npcolor == "mediumseagreen"){
      }
      else{
        pblur.value = "";
      }
    }

    function ordermblur(mblur){
      var mcolor = $(mblur).attr('id');
      var nmcolor = document.getElementById(mcolor).style.color;
      if(nmcolor == "mediumseagreen"){
      }
      else{
        mblur.value = "";
      }
    }

    function inplastname(lstname){
     var lastpattern = /^[a-zA-Z ]*$/;

     var lstparent = $(lstname).parents('p');
      var lstspan = lstparent.children('span')[0];
      
      if(lstname.value.match(lastpattern) )
      {
        lstname.style.color = 'mediumseagreen';
        lstspan.innerHTML = "";
      }
      else{
        lstname.style.color = 'red';
        lstspan.style.color = 'red';
        lstspan.innerHTML = "Only letters and white space are allowed";
      }
    }

    function inpfirstname(frtname){
     var firstpattern = /^[a-zA-Z ]*$/;

     var frstparent = $(frtname).parents('p');
      var frstspan = frstparent.children('span')[0];
      
      if(frtname.value.match(firstpattern) )
      {
        frtname.style.color = 'mediumseagreen';
        frstspan.innerHTML = "";
      }
      else{
        frtname.style.color = 'red';
        frstspan.style.color = 'red';
        frstspan.innerHTML = "Only letters and white space are allowed";
      }
    }

    function orderlastblur(lstblur){
      var lstcolor = $(lstblur).attr('id');
      var nlstcolor = document.getElementById(lstcolor).style.color;
      if(nlstcolor == "mediumseagreen"){
      }
      else{
        lstblur.value = "";
      }
    }

    function orderfirstblur(frtblur){
      var frtcolor = $(frtblur).attr('id');
      var nfrtcolor = document.getElementById(frtcolor).style.color;
      if(nfrtcolor == "mediumseagreen"){
      }
      else{
        frtblur.value = "";
      }
    }

</script>
<style type="text/css">
  #imgpreview .appendim{ 
      width: 120px;
      height: 120px;
    }
  @media screen and (max-width: 325px){
   #imgpreview .appendim{
      width: 80px;
      height: 80px;
    }
  }
</style>