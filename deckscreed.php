<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>
<body>
<div  class="deckscreedbody" id="deckscreedbody">
  <div id="closedeckscreedmodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">
    <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "screeding" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidesr">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidesr(-1)">❮</a>
        <a class="next" onclick="plusSlidesr(1)">❯</a>

        <div class="caption-container1">
          <p id="captionr" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demor cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidesr('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
var slideIndexr = 1;
showSlider(slideIndexr);

function plusSlidesr(r) {
  showSlider(slideIndexr += r);
}

function currentSlidesr(r) {
  showSlider(slideIndexr = r);
}

function showSlider(r) {
  var r;
  var slider = document.getElementsByClassName("mySlidesr");
  var dotsr = document.getElementsByClassName("demor");
  var captionTextr = document.getElementById("captionr");
  if (r > slider.length) {slideIndexr = 1}
  if (r < 1) {slideIndexr = slider.length}
  for (r = 0; r < slider.length; r++) {
      slider[r].style.display = "none";
  }
  for (r = 0; r < dotsr.length; r++) {
      dotsr[r].className = dotsr[r].className.replace(" activer", "");
  }
    slider[slideIndexr-1].style.display = "block";
    dotsr[slideIndexr-1].className += " activer";
    captionTextr.innerHTML = dotsr[slideIndexr-1].alt;
  }
  $(document).ready(function(){
    $("#closedeckscreedmodal").click(function(){
      $("#deckscreedbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
