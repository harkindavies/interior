<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>

<body>
  <div  class="housebody" id="housebody">
    <div id="closehousemodal" class="fa fa-close"></div>
    <h2 style="text-align:center">Full P.O.P Gallery</h2>

    <div class="container1">

      <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "sitting" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidess">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidess(-1)">❮</a>
        <a class="next" onclick="plusSlidess(1)">❯</a>

        <div class="caption-container1">
          <p id="captions" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demos cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidess('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
  var slideIndexs = 1;
  showSlidess(slideIndexs);

  function plusSlidess(o) {
    showSlidess(slideIndexs += o);
  }

  function currentSlidess(o) {
    showSlidess(slideIndexs = o);
  }

  function showSlidess(o) {
    var u;
    var slidess = document.getElementsByClassName("mySlidess");
    var dots1 = document.getElementsByClassName("demos");
    var captionTexts = document.getElementById("captions");
    if (o > slidess.length) {slideIndexs = 1}
    if (o < 1) {slideIndexs = slidess.length}
    for (u = 0; u < slidess.length; u++) {
        slidess[u].style.display = "none";
    }
    for (u = 0; u < dots1.length; u++) {
        dots1[u].className = dots1[u].className.replace(" actives", "");
    }
    slidess[slideIndexs-1].style.display = "block";
    dots1[slideIndexs-1].className += " actives";
    captionTexts.innerHTML = dots1[slideIndexs-1].alt;
  }
  $(document).ready(function(){
    $("#closehousemodal").click(function(){
      $("#housebody").fadeOut(1000);
    });

  })
  </script>
      
</body>
</html>
