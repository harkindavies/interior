<?php 
  include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>
<body>

<div  class="hallbody" id="hallbody">
  <div id="closehallmodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">
    <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "hall" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidesp">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidesp(-1)">❮</a>
        <a class="next" onclick="plusSlidesp(1)">❯</a>

        <div class="caption-container1">
          <p id="captionp" style="margin: 5px; font-family: Helvital;"></p>
        </div>

        <div class="myrow">
          <?php
          $selectqry2 = mysqli_query($conn, $select);
          $rowcount2 = mysqli_num_rows($selectqry2);
          for ($j=1; $j <= $rowcount2; $j++) { 
             $projectrslt2 = mysqli_fetch_assoc($selectqry2);
             $primage2 = $projectrslt2['projectimage'];
             $prname  = $projectrslt2['projectname'];
             $rimage2 = str_replace('../', '', $primage2);

             ?>
             <div class="mycolumn">
              <img class="demop cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidesp('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
            </div>
             <?php
          }
          ?>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</div>
   
<script>
var slideIndexp = 1;
showSlidesp(slideIndexp);

function plusSlidesp(p) {
  showSlidesp(slideIndexp += p);
}

function currentSlidesp(p) {
  showSlidesp(slideIndexp = p);
}

function showSlidesp(p) {
  var p;
  var slidesp = document.getElementsByClassName("mySlidesp");
  var dotsp = document.getElementsByClassName("demop");
  var captionTexts = document.getElementById("captionp");
  if (p > slidesp.length) {slideIndexp = 1}
  if (p < 1) {slideIndexp = slidesp.length}
  for (p = 0; p < slidesp.length; p++) {
      slidesp[p].style.display = "none";
  }
  for (p = 0; p < dotsp.length; p++) {
      dotsp[p].className = dotsp[p].className.replace(" activep", "");
  }
  slidesp[slideIndexp-1].style.display = "block";
  dotsp[slideIndexp-1].className += " activep";
  captionTexts.innerHTML = dotsp[slideIndexp-1].alt;
}
$(document).ready(function(){
  $("#closehallmodal").click(function(){
    $("#hallbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
