<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/footerlink.css">
</head>

<body>
  <div  class="arcbody" id="arcbody">
    <div id="closearcmodal" class="fa fa-close"></div>
    <h2 style="text-align:center">Full P.O.P Gallery</h2>

    <div class="container1">
      <div class="mycontainers">
        <div class="mySlidesarc">
          <div class="numbertext">1 / 6</div>
          <img class="myimg" src="img/pillar-with-arc.jpg" style="width:100%;">
        </div>

        <div class="mySlidesarc">
          <div class="numbertext">2 / 6</div>
          <img class="myimg" src="img/DSC02374.jpg" style="width:100%">
        </div>

        <div class="mySlidesarc">
          <div class="numbertext">3 / 6</div>
          <img class="myimg" src="img/portico-an-ancient-temple.jpg" style="width:100%">
        </div>
          
        <div class="mySlidesarc">
          <div class="numbertext">4 / 6</div>
          <img class="myimg" src="img/realistic-antique-ionic-column-arch.jpg" style="width:100%">
        </div>

        <div class="mySlidesarc">
          <div class="numbertext">5 / 6</div>
          <img class="myimg" src="img/mypillar.jpg" style="width:100%">
        </div>
          
        <div class="mySlidesarc">
          <div class="numbertext">6 / 6</div>
          <img class="myimg" src="img/pillar-and-divider.jpg" style="width:100%">
        </div>
          
        <a class="prev" onclick="plusSlidesarc(-1)">❮</a>
        <a class="next" onclick="plusSlidesarc(1)">❯</a>

        <div class="caption-container1">
          <p id="captionarc" style="margin: 5px; font-family: Helvital;"></p>
        </div>

        <div class="myrow">
          <div class="mycolumn">
            <img class="demoarc cursor" src="img/pillar-with-arc.jpg" style="width:100%" onclick="currentSlidesu(1)" alt="pillar-with-arc">
          </div>
          <div class="mycolumn">
            <img class="demoarc cursor" src="img/DSC02374.jpg" style="width:100%" onclick="currentSlidesu(2)" alt="DSC02374">
          </div>
          <div class="mycolumn">
            <img class="demoarc cursor" src="img/portico-an-ancient-temple.jpg" style="width:100%" onclick="currentSlidesu(3)" alt="portico-an-ancient-temple">
          </div>
          <div class="mycolumn">
            <img class="demoarc cursor" src="img/realistic-antique-ionic-column-arch.jpg" style="width:100%" onclick="currentSlidesu(4)" alt="realistic-antique-ionic-column-arch">
          </div>
          <div class="mycolumn">
            <img class="demoarc cursor" src="img/mypillar.jpg" style="width:100%" onclick="currentSlidesu(5)" alt="mypillar">
          </div>    
          <div class="mycolumn">
            <img class="demoarc cursor" src="img/pillar-and-divider.jpg" style="width:100%" onclick="currentSlidesu(6)" alt="pillar-and-divider">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  var slideIndexarc = 1;
  showSlidearc(slideIndexarc);

  function plusSlidesarc(ah) {
    showSlidearc(slideIndexarc += ah);
  }

  function currentSlidesu(ah) {
    showSlidearc(slideIndexarc = ah);
  }

  function showSlidearc(ah) {
    var ah;
    var slidearc = document.getElementsByClassName("mySlidesarc");
    var dotsarc = document.getElementsByClassName("demoarc");
    var captionTextarc = document.getElementById("captionarc");
    if (ah > slidearc.length) {slideIndexarc = 1}
    if (ah < 1) {slideIndexarc = slidearc.length}
    for (ah = 0; ah < slidearc.length; ah++) {
        slidearc[ah].style.display = "none";
    }
    for (ah = 0; ah < dotsarc.length; ah++) {
        dotsarc[ah].className = dotsarc[ah].className.replace(" activearc", "");
    }
      slidearc[slideIndexarc-1].style.display = "block";
      dotsarc[slideIndexarc-1].className += " activearc";
      captionTextarc.innerHTML = dotsarc[slideIndexarc-1].alt;
    }
    $(document).ready(function(){
      $("#closearcmodal").click(function(){
        $("#arcbody").fadeOut(500);
    });

  })
  </script>
      
</body>
</html>
