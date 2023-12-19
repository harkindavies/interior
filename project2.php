<?php 
  session_start();
  include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>AkinDavis interior</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/project.css">
  <!-- //animation effects-css-->
  <link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />

  <script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body  data-aos="">
<div class="bpmain">
  <div data-aos="">
  <?php  include "header.php" ?>
  </div>
   <script>

  // Add active class to the current page
    var porjectpg = document.getElementById("projectpg");
    porjectpg.className += " active";

</script>
  <div class="pmain" data-aos="">
    <input type="submit" name="order" value="Order" style="position: fixed; right: 0.4%; top:155px; background: mediumseagreen; z-index: 22; outline: unset;border: unset; color: #fff; padding:10px; border-radius: 1px; ">
  <h1>OUR PROJECT</h1>
  <hr>

  <div id="myBtnContainer">
    <button class="pbtn actives" onclick="filterSelection('all')"> Show all</button>
    <button class="pbtn" onclick="filterSelection('sitting')"> Sitting Room</button>
    <button class="pbtn" onclick="filterSelection('bedroom')"> Bedroom</button>
    <button class="pbtn" onclick="filterSelection('dining')"> Dining</button>
    <button class="pbtn" onclick="filterSelection('kitchen')"> Kitchen</button>
    <button class="pbtn" onclick="filterSelection('hall')"> Hall</button>
  </div>

  <!-- Portfolio Gallery Grid -->
  <div class="prow">
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn sitting" data-aos="">
      <div class="pcontent">
        <i class="fa fa-plus" onclick="check(this)" style="color: mediumseagreen; font-size: 20px; cursor: pointer;"></i>
        <a class="thumbnail" target="_blank" href="img/bg1.jpg">
          <img src="img/bg1.jpg" alt="Mountains" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Sitting Room</h4>
          <p>Lorem ipsum dolor..</p>
          <div class="overlay"><i class="overlaytext" style="font-size: 30px;">&#10004;</i></div>
       </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn sitting" data-aos="">
      <div class="pcontent">
        <i class="fa fa-plus" onclick="check(this)" style="color: mediumseagreen; font-size: 20px; cursor: pointer;"></i>
        <a class="thumbnail" target="_blank" href="img/bg2.jpg">
          <img src="img/bg2.jpg" alt="Lights" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Sitting Room</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn dining" data-aos="">
      <div class="pcontent">
        <i class="fa fa-plus" onclick="check(this)" style="color: mediumseagreen; font-size: 20px; cursor: pointer;"></i>
        <a class="thumbnail" target="_blank" href="img/bg3.jpg">
          <img src="img/bg3.jpg" alt="Nature" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Dinning</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn bedroom" data-aos="">
      <div class="pcontent">
        <i class="fa fa-plus" onclick="check(this)" style="color: mediumseagreen; font-size: 20px; cursor: pointer;"></i>
        <a class="thumbnail" target="_blank" href="img/bg4.jpg">
          <img src="img/bg4.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Bedroom</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn kitchen" data-aos="">
      <div class="pcontent">
        <i class="fa fa-plus" onclick="check(this)" style="color: mediumseagreen; font-size: 20px; cursor: pointer;"></i>
        <a class="thumbnail" target="_blank" href="img/bg5.jpg">
          <img src="img/bg5.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Kitchen</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn dining" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg6.jpg">
          <img src="img/bg6.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Dining</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn bedroom" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg1.jpg">
          <img src="img/bg1.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Bedroom</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn sitting" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg4.jpg">
          <img src="img/bg4.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Sitting Room</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn hall" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg1.jpg">
          <img src="img/bg1.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Hall</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn kitchen"data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg5.jpg">
          <img src="img/bg5.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Kitchen</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn dining" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg6.jpg">
          <img src="img/bg6.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Dining</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>

    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn bedroom" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg1.jpg">
          <img src="img/bg1.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Bedroom</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn sitting" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg4.jpg">
          <img src="img/bg4.jpg" alt="Car" style="width:100%">

          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Sitting Room</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn hall" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg1.jpg">
          <img src="img/bg1.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Hall</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn sitting" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg2.jpg">
          <img src="img/bg2.jpg" alt="Lights" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Sitting Room</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn dining" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg3.jpg">
          <img src="img/bg3.jpg" alt="Nature" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Dinning</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn bedroom" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg4.jpg">
          <img src="img/bg4.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Bedroom</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn kitchen" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg5.jpg">
          <img src="img/bg5.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/pricecut.jpeg" height="47px" width="110px"></i>
          <h4>Kitchen</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 pcolumn dining" data-aos="">
      <div class="pcontent">
        <a class="thumbnail" target="_blank" href="img/bg6.jpg">
          <img src="img/bg6.jpg" alt="Car" style="width:100%">
          <i class="price">&#8358; <i id="numbertxth3">7,000</i>&#9585;m<sup>2</sup></i>
          <i class="promo"><img src="img/promo.jpeg" height="47px" width="110px"></i>
          <h4>Dining</h4>
          <p>Lorem ipsum dolor..</p>
        </a>
      </div>
    </div>
  <!-- END GRID -->
  </div>

  <h1>OUR PROJECT VIDEOS</h1>
  <hr>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12" data-aos="">
        <video class="myVideo" controls muted loop id="myVideo1">
          <source src="video/rain.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>

        <div class="content " id="content">
          <h1>Heading</h1>
          <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo.</p>
          <button id="myBtn1" onclick="myFunction(this)">play</button>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12" data-aos="">
        <video class="myVideo" muted controls loop id="myVideo2">
          <source src="video/rain.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>

        <div class="content " id="content">
          <h1>Heading</h1>
          <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo</p>
          <button id="myBtn2" onclick="myFunction(this)">Play</button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12" data-aos="">
        <video classs="myVideo" controls="" muted loop id="myVideo3">
          <source src="video/rain.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>

        <div class="content "  id="content">
          <h1>Heading</h1>
          <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo.</p>
          <button id="myBtn3" onclick="myFunction(this)">Play</button>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12" data-aos="">
        <video classs="myVideo"controls muted loop id="myVideo4">
          <source src="video/rain.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>

        <div class="content " id="content">
          <h1>Heading</h1>
          <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo</p>
          <button id="myBtn4" onclick="myFunction(this)">Play</button>
        </div>
      </div>
    </div>

  <!--/*end video */-->

  <!-- END MAIN -->
  </div>
</div>
  <div class="include">
    <?php  include "order.php"; ?>
    <?php include ("footer.php"); ?>
  </div>
  
</body>
</html>

<script>

  function myFunction(m) {
    var btn =  $(m).attr('id');
    var btns = document.getElementById(btn);
    var pdiv = $(m).parents("div");
    var video = pdiv.children("video").attr('id');
    var videlement = document.getElementById(video);
    //console.log(videlement);
    //console.log(btns);
    //video.paused();
    //var video = document.getElementById("myVideo");
  //var btn = document.getElementById("myBtn");
    if (videlement.paused) {
      videlement.play();
      btns.innerHTML = "Pause";
    } else {
      videlement.pause();
      btns.innerHTML = "Play";
    }
  }


  filterSelection("all")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("col-md-3 col-sm-4 col-xs-12 pcolumn");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
    }

    var btnContainer = document.getElementById("myBtnContainer");
    var bts = btnContainer.getElementsByClassName("pbtn");
    for (var s = 0; s <= bts.length; s++) {

      $(bts[s]).click(function(){
        var currents = document.getElementsByClassName(" actives");
      currents[0].className = currents[0].className.replace(" actives", "");
      this.className += " actives";
      });
    }

  }

  function AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }

  function RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }

  // Add active class to the current button (highlight it)

  $(".bpmain").css("background", "rgba(255,255,255,0.4)");

  $(document).ready(function(){
    $(".include").css("display", "block");
  });

</script>

<script src="script/aos.js"></script><!-- //animation effects-js-->
<script src="script/aos1.js"></script><!--