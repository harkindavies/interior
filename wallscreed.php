<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>

<body>
<div  class="wallscreedbody" id="wallscreedbody">
  <div id="closewallscreedmodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">

    <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "wall" limit 6 ';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidesw">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidesw(-1)">❮</a>
        <a class="next" onclick="plusSlidesw(1)">❯</a>

        <div class="caption-container1">
          <p id="captionw" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demow cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidesw('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
var slideIndexw = 1;
showSlidew(slideIndexw);

function plusSlidesw(w) {
  showSlidew(slideIndexw += w);
}

function currentSlidesw(w) {
  showSlidew(slideIndexw = w);
}

function showSlidew(w) {
  var w;
  var slidew = document.getElementsByClassName("mySlidesw");
  var dotsw = document.getElementsByClassName("demow");
  var captionTextw = document.getElementById("captionw");
  if (w > slidew.length) {slideIndexw = 1}
  if (w < 1) {slideIndexw = slidew.length}
  for (w = 0; w < slidew.length; w++) {
      slidew[w].style.display = "none";
  }
  for (w = 0; w < dotsw.length; w++) {
      dotsw[w].className = dotsw[w].className.replace(" activeq", "");
  }
  slidew[slideIndexw-1].style.display = "block";
  dotsw[slideIndexw-1].className += " activeq";
  captionTextw.innerHTML = dotsw[slideIndexw-1].alt;
}
$(document).ready(function(){
  $("#closewallscreedmodal").click(function(){
    $("#wallscreedbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
