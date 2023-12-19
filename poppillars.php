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
<div  class="poppillarsbody" id="poppillarsbody">
  <div id="closepoppillarsmodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">
    <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "pillar" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidespillar">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidespillar(-1)">❮</a>
        <a class="next" onclick="plusSlidespillar(1)">❯</a>

        <div class="caption-container1">
          <p id="captionpillar" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demopillar cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidespillar('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
var slideIndexpillar = 1;
showSlidepillar(slideIndexpillar);

function plusSlidespillar(g) {
  showSlidepillar(slideIndexpillar += g);
}

function currentSlidespillar(g) {
  showSlidepillar(slideIndexpillar = g);
}

function showSlidepillar(g) {
  var g;
  var slidepillar = document.getElementsByClassName("mySlidespillar");
  var dotspillar = document.getElementsByClassName("demopillar");
  var captionTextpr = document.getElementById("captionpillar");
  if (g > slidepillar.length) {slideIndexpillar = 1}
  if (g < 1) {slideIndexpillar = slidepillar.length}
  for (g = 0; g < slidepillar.length; g++) {
      slidepillar[g].style.display = "none";
  }
  for (g = 0; g < dotspillar.length; g++) {
      dotspillar[g].className = dotspillar[g].className.replace(" activer", "");
  }
    slidepillar[slideIndexpillar-1].style.display = "block";
    dotspillar[slideIndexpillar-1].className += " activer";
    captionTextpr.innerHTML = dotspillar[slideIndexpillar-1].alt;
  }
  $(document).ready(function(){
    $("#closepoppillarsmodal").click(function(){
      $("#poppillarsbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
