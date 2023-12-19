<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>

<body>
  <div  class="walldividerbody" id="walldividerbody">
    <div id="closewalldividermodal" class="fa fa-close"></div>
    <h2 style="text-align:center">Full P.O.P Gallery</h2>

    <div class="container1">

      <div class="mycontainers">
      <?php
      $select = 'SELECT * FROM project WHERE projectype = "divider" limit 6';
      $selectqry = mysqli_query($conn, $select);
      $rowcount = mysqli_num_rows($selectqry);
      if($rowcount > 0 ){
        for ($i=1; $i <= $rowcount; $i++) { 
          $projectrslt = mysqli_fetch_assoc($selectqry);
          $primage = $projectrslt['projectimage'];
          $rimage = str_replace('../', '', $primage);
          
          ?>
              <div class="mySlidesu">
                <div class="numbertext"><?php echo $i.' / '.$rowcount; ?></div>
                <img class="myimg" src="<?php echo $rimage; ?>" style="width:100%;">
              </div>
          <?php
        }
        ?>
        <a class="prev" onclick="plusSlidesu(-1)">❮</a>
        <a class="next" onclick="plusSlidesu(1)">❯</a>

        <div class="caption-container1">
          <p id="captionu" style="margin: 5px; font-family: Helvital;"></p>
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
              <img class="demou cursor" src="<?php echo $rimage2; ?>" style="width:100%" onclick="currentSlidesuus('<?php echo $j; ?>')" alt="<?php echo $prname; ?>">
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
  var slideIndexu = 1;
  showSlideu(slideIndexu);

  function plusSlidesu(u) {
    showSlideu(slideIndexu += u);
  }

  function currentSlidesuus(u) {
    showSlideu(slideIndexu = u);
  }

  function showSlideu(u) {
    var u;
    var slideu = document.getElementsByClassName("mySlidesu");
    var dotsu = document.getElementsByClassName("demou");
    var captionTextr = document.getElementById("captionu");
    if (u > slideu.length) {slideIndexu = 1}
    if (u < 1) {slideIndexu = slideu.length}
    for (u = 0; u < slideu.length; u++) {
        slideu[u].style.display = "none";
    }
    for (u = 0; u < dotsu.length; u++) {
        dotsu[u].className = dotsu[u].className.replace(" activer", "");
    }
      slideu[slideIndexu-1].style.display = "block";
      dotsu[slideIndexu-1].className += " activer";
      captionTextr.innerHTML = dotsu[slideIndexu-1].alt;
    }
    $(document).ready(function(){
      $("#closewalldividermodal").click(function(){
        $("#walldividerbody").fadeOut(500);
    });

  })
  </script>
      
</body>
</html>
