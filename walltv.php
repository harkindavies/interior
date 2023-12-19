<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>

<body>
<div  class="walltvbody" id="walltvbody">
  <div id="closewalltvmodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">
    <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "tv_hanger" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidest">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidest(-1)">❮</a>
        <a class="next" onclick="plusSlidest(1)">❯</a>

        <div class="caption-container1">
          <p id="captiont" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demot cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidest('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
var slideIndext = 1;
showSlidet(slideIndext);

function plusSlidest(t) {
  showSlidet(slideIndext += t);
}

function currentSlidest(t) {
  showSlidet(slideIndext = t);
}

function showSlidet(t) {
  var t;
  var slidet = document.getElementsByClassName("mySlidest");
  var dotst = document.getElementsByClassName("demot");
  var captionTextt = document.getElementById("captiont");
  if (t > slidet.length) {slideIndext = 1}
  if (t < 1) {slideIndext = slidet.length}
  for (t = 0; t < slidet.length; t++) {
      slidet[t].style.display = "none";
  }
  for (t = 0; t < dotst.length; t++) {
      dotst[t].className = dotst[t].className.replace(" activet", "");
  }
    slidet[slideIndext-1].style.display = "block";
    dotst[slideIndext-1].className += " activet";
    captionTextt.innerHTML = dotst[slideIndext-1].alt;
  }
  $(document).ready(function(){
    $("#closewalltvmodal").click(function(){
      $("#walltvbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
