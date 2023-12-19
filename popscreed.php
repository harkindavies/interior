<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  margin: 0;
}

.popscreedbody{
  background: rgba(0,0,0,0.7);
  width: 100%;
  height: 100vh;
  display: none;
  z-index: 999;
  position: fixed;
  top: 0;
}

* {
  box-sizing: border-box;
}

.myimg {
  vertical-align: middle;
  height: 50vh;
}

img.demot{
  height: 10vh;
}

/* Position the image container (needed to position the left and right arrows) */
.container1 {
  position: relative;
}

.mycontainers{
  width: 60%;
  margin: 10vh auto;
}

/* Hide the images by default */
.mySlidest {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 20%;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
  text-decoration: none;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container1 {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

#closepopscreedmodal{
 float: right; 
 margin: 20px 20px 0 0; 
 color: red; 
 font-size: 33px;"
}

#closepopscreedmodal:hover{
  color: #d50000;
}

.myrow:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.mycolumn {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demot {
  opacity: 0.6;
}

.activet,
.demot:hover {
  opacity: 1;
}

@media screen and (max-width: 801px){
  .mycontainers{
    width: 90%;
  }

  .next{
    right: 5%;
  }
  
}
</style>
<body>
<div  class="popscreedbody" id="popscreedbody">
  <div id="closepopscreedmodal" class="fa fa-close"></div>
  <h2 style="text-align:center">Full P.O.P Gallery</h2>

  <div class="container1">
    <div class="mycontainers">
      <div class="mySlidest">
        <div class="numbertext">1 / 6</div>
        <img class="myimg" src="img/bg1.jpg" style="width:100%;">
      </div>

      <div class="mySlidest">
        <div class="numbertext">2 / 6</div>
        <img class="myimg" src="img/bg2.jpg" style="width:100%">
      </div>

      <div class="mySlidest">
        <div class="numbertext">3 / 6</div>
        <img class="myimg" src="img/bg3.jpg" style="width:100%">
      </div>
        
      <div class="mySlidest">
        <div class="numbertext">4 / 6</div>
        <img class="myimg" src="img/bg4.jpg" style="width:100%">
      </div>

      <div class="mySlidest">
        <div class="numbertext">5 / 6</div>
        <img class="myimg" src="img/bg5.jpg" style="width:100%">
      </div>
        
      <div class="mySlidest">
        <div class="numbertext">6 / 6</div>
        <img class="myimg" src="img/bg6.jpg" style="width:100%">
      </div>
        
      <a class="prev" onclick="plusSlidest(-1)">❮</a>
      <a class="next" onclick="plusSlidest(1)">❯</a>

      <div class="caption-container1">
        <p id="captiont" style="margin: 5px; font-family: Helvital;"></p>
      </div>

      <div class="myrow">
        <div class="mycolumn">
          <img class="demot cursor" src="img/bg1.jpg" style="width:100%" onclick="currentSlidest(1)" alt="The Woods">
        </div>
        <div class="mycolumn">
          <img class="demot cursor" src="img/bg2.jpg" style="width:100%" onclick="currentSlidest(2)" alt="Cinque Terre">
        </div>
        <div class="mycolumn">
          <img class="demot cursor" src="img/bg3.jpg" style="width:100%" onclick="currentSlidest(3)" alt="Mountains and fjords">
        </div>
        <div class="mycolumn">
          <img class="demot cursor" src="img/bg4.jpg" style="width:100%" onclick="currentSlidest(4)" alt="Northern Lights">
        </div>
        <div class="mycolumn">
          <img class="demot cursor" src="img/bg5.jpg" style="width:100%" onclick="currentSlidest(5)" alt="Nature and sunrise">
        </div>    
        <div class="mycolumn">
          <img class="demot cursor" src="img/bg6.jpg" style="width:100%" onclick="currentSlidest(6)" alt="Snowy Mountains">
        </div>
      </div>
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
    $("#closepopscreedmodal").click(function(){
      $("#popscreedbody").fadeOut(500);
  });

})
</script>
    
</body>
</html>
