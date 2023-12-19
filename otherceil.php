<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>
<body>
<div  class="otherbody" id="otherbody">
  <div id="closeothermodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">

    <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "other" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidesq">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidesq(-1)">❮</a>
        <a class="next" onclick="plusSlidesq(1)">❯</a>

        <div class="caption-container1">
          <p id="captionq" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demoq cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidesq('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
var slideIndexq = 1;
showSlideq(slideIndexq);

function plusSlidesq(q) {
  showSlideq(slideIndexq += q);
}

function currentSlidesq(q) {
  showSlideq(slideIndexq = q);
}

function showSlideq(q) {
  var q;
  var slideq = document.getElementsByClassName("mySlidesq");
  var dotsq = document.getElementsByClassName("demoq");
  var captionTextq = document.getElementById("captionq");
  if (q > slideq.length) {slideIndexq = 1}
  if (q < 1) {slideIndexq = slideq.length}
  for (q = 0; q < slideq.length; q++) {
      slideq[q].style.display = "none";
  }
  for (q = 0; q < dotsq.length; q++) {
      dotsq[q].className = dotsq[q].className.replace(" activeq", "");
  }
  slideq[slideIndexq-1].style.display = "block";
  dotsq[slideIndexq-1].className += " activeq";
  captionTextq.innerHTML = dotsq[slideIndexq-1].alt;
}
$(document).ready(function(){
  $("#closeothermodal").click(function(){
    $("#otherbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
