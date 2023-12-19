<?php 
  session_start();
  include "conn.php";
  ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Our Project</title>
    <meta charset="utf-8" />
    <!--meta name="description" content="Lozad.js is highly performant, light and configurable lazy loader in pure JS with no dependencies for images, iframes and more."-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--link rel="image_src" href="images/lozad.jpg" /-->
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/project.css">
  <link rel="stylesheet" type="text/css" href="css/order.css">
    <!--link rel="stylesheet" href="assets/css/main.css" /-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--meta property="og:title" content="Lozad.js: Highly performant lazy loader" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://apoorv.pro/lozad.js/demo/" />
    <meta property="og:image" content="https://apoorv.pro/lozad.js/demo/images/lozad.jpg" />
    <meta property="og:description" content="Lozad.js is highly performant, light ~0.5kb and configurable lazy loader in pure JS with no dependencies for images, iframes and more." /-->
</head>
<body class="bmain">
  <div class="bpmain bmain">
    <div data-aos="">
      <?php  include "header.php" ?>
    </div>
    <div class="pmain">
      <script>
        // Add active class to the current page
        var porjectpg = document.getElementById("projectpg");
        porjectpg.className += " active";
      </script>
      <!-- Wrapper -->
      <div id="wrapper">
          <!-- Main -->
          <div id="main">
              <article class="thumb">
                  <div class="pmain">
                    <h1>OUR PROJECT</h1>
                    <hr>
                    <div id="myBtnContainer">
                      <button class="pbtn actives" onclick="filterSelection('all')"> Show all</button>
                      <button class="pbtn" onclick="filterSelection('sitting')"> Sitting</button>
                      <button class="pbtn" onclick="filterSelection('bedroom')"> Bedroom</button>
                      <button class="pbtn" onclick="filterSelection('dining')"> Dining</button>
                      <button class="pbtn" onclick="filterSelection('kitchen')"> Kitchen</button>
                      <button class="pbtn" onclick="filterSelection('hall')"> Hall</button>
                      <button class="pbtn" onclick="filterSelection('other')"> Other</button>
                      <button class="pbtn" onclick="filterSelection('screeding')"> Screeding</button>
                      <button class="pbtn" onclick="filterSelection('pillar')"> Pillar</button>
                      <button class="pbtn" onclick="filterSelection('divider')"> Divider</button>
                      <button class="pbtn" onclick="filterSelection('wall')"> Wall Screeding</button>
                      <button class="pbtn" onclick="filterSelection('tv_hanger')"> TV Hanger</button>
                      <input class="pbtn" type="submit" name="order" value="Order" id="orderbtn">
                    </div>
                    <div class="prow">
                      <?php
                            $statements = "SELECT * FROM project ORDER BY sn ASC";
                            $statement = mysqli_query($conn, $statements);
                            $count = mysqli_num_rows($statement);
                            if($count == 0){
                                  echo "No project is currently available";
                            }
                            else
                            { 
                              for ($i=1; $i<= $count; $i++) {
                                $result = mysqli_fetch_assoc($statement);
                                $streslt = str_replace("../","",$result['projectimage']);
                                $streslt2 = str_replace("../","",$result['promotype']); 
                        ?>    
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pcolumn <?php echo $result['projectype']; ?>">
                                  <div class="pcontent">
                                    <i class="fa fa-plus" onmouseover="plus(this)" onclick="check(this)">
                                      <i id="clickinfo1" class="clickinfo">click to order</i>
                                    </i>
                                    <a class="thumbnail" target="_blank" href="<?php echo $streslt; ?>">
                                      <img class="lozad" data-src="<?php echo $streslt; ?>" alt="<?php echo $result['projectname']; ?>" data-index="<?php echo $i; ?>" style="width:100%;">
                                      <noscript><img src="<?php echo $streslt; ?>" data-index="<?php echo $i; ?>" /></noscript>
                                      <i class="price">&#8358; <i id="numbertxth<?php echo $result['sn']; ?>"><?php echo $result['projectprice']; ?></i>&#9585;m<sup>2</sup></i>
                                      <i class="promo"><img src="<?php echo "img/".$streslt2; ?>" height="47px" width="110px"></i>
                                      <h4 style="text-transform: capitalize; color: mediumseagreen;"><?php echo $result['projectype']; ?> Room</h4>
                                      <p style="text-overflow: ellipsis; color: mediumseagreen;"><?php echo $result['projectname']; ?>...</p>
                                      <div class="overlay" id="overlay<?php echo $result['sn']; ?>"><i class="overlaytext" style="font-size: 30px;">&#10004;</i></div>
                                   </a>
                                  </div>
                                </div>
                              </section>
                              <?php     
                                }
                            }
                        ?>  
                         <!-- END GRID -->
                    </div>
                  </div>
              </article>
          </div>
      </div>
      <!-- video -->
      <h1>OUR PROJECT VIDEOS</h1>
      <hr style="border-top: 2px solid #bbb; margin-top: 0px;  margin-bottom: 40px;">
      <div class="row forvideo">
        <?php
          $selectvid = "SELECT * FROM videoproject ORDER BY sn DESC";
          $queryselect =mysqli_query($conn,$selectvid);
          $vidcount = mysqli_num_rows($queryselect);

          if ($vidcount < 1) { ?> <h2>No video is available at the moment</h2> <?php }
          else{
            for ($i=1; $i <= $vidcount; $i++) {
            $rslt = mysqli_fetch_assoc($queryselect);
            $video = $rslt['projectvideo'];
            $strpvideo = str_replace("../", "", $video);
           ?>
            <div class="videos col-md-4 col-sm-6 col-xs-12" data-aos="">
              <div id="video">
                <article class="frame">
                    <div class="video-example video-example-2">
                      <video controls loop muted class="lozad-picture myVideo" id="<?php echo "myVideo".$i; ?>">
                        <source data-src="<?php echo $strpvideo; ?>" type="video/mp4">
                        <source data-src="<?php echo $strpvideo; ?>" type="video/ogg">
                        Your browser does not support HTML5 video.
                      </video>
                    </div>
                </article>
              </div>            
              <div class="content" id="content">
                <h1><?php echo $rslt['projectname']; ?></h1>
                <h4><?php echo $rslt['description']; ?></h4>
                <button class="myBtn" id="<?php echo "myBtn".$i; ?>" onclick="myFunction(this)">Play</button>
              </div>
            </div>
          <?php
            }
          }
        ?>  
      </div>
    </div>
    <div class="include">
      <?php  include "order.php"; ?>
      <?php include ("footer.php"); ?>
    </div>
  </div>
    <!-- Toastr resources for Notifications -->
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr resources -->
    <!-- IntersectionObserver Polyfill -->
    <script src="https://rawgit.com/w3c/IntersectionObserver/master/polyfill/intersection-observer.js"></script>
    <!-- IntersectionObserver Polyfill -->
    <script src="script/lozad.min.js"></script>
    <script type="text/javascript">
    toastr.options = {
        "progressBar": true,
        "timeOut": "1500"
    }
    // Initialize library to lazy load images
    var observer = lozad('.lozad', {
        threshold: 0.1,
        load: function(el) {
            el.src = el.getAttribute("data-src");
            el.onload = function() {
                toastr["success"](el.localName.toUpperCase() + " " + el.getAttribute("data-index") + " Loaded.")
            }
        }
    })

    // Picture observer
    // with default `load` method
    var pictureObserver = lozad('.lozad-picture', {
        threshold: 0.1
    })

    // Background observer
    // with default `load` method
    var backgroundObserver = lozad('.lozad-background', {
        threshold: 0.1
    })

    observer.observe()
    pictureObserver.observe()
    backgroundObserver.observe()

    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131689813-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-131689813-1');
    </script>

    <script>
/* SCRIPT FOR PROJECT AND VIDEO */
  var counts = 0;
  var orderimg2,orderimgall,amount, amnt, orderimg, imgall = '';

  function check(ths){
    var checked = $(ths).parent("div");
    var checked2 = checked.children("a");
    var checked3 = checked2.children("div");
    var checked4 = checked3.attr("id");
    var cchhkk = document.getElementById(checked4);
    var orderimg = checked2.children("img").attr("src") + " ";
    var getamount = checked2.children("i");
    var getamount2 = getamount.children("i");
    var amountid = getamount2.attr("id");
    amount = document.getElementById(amountid).innerHTML;
       
    if (cchhkk.style.transform == "scale(1)") {
      cchhkk.style.transition = "0.5s";
      cchhkk.style.transform ="scale(0)";
      $(ths).attr("class","fa fa-plus");
      counts--;
      var imgsrcremove = orderimg+" (#"+amount +"/m"+")  ";
      var imgsrc3 = orderimg2.replace(imgsrcremove,"");
      orderimg2 = imgsrc3;
      imgall1 = imgall.replace(orderimg,"");
      imgall = imgall1;
      amnt1 = amnt.replace(amount + " ","");
      amnt = amnt1;
    }
    else{
      $("#orderbtn").fadeIn(500);
      $(ths).attr("class","fa fa-minus");
      cchhkk.style.transform ="scale(1)";
      counts++;
      orderimg2 += orderimg+" (#"+amount +"/m"+")  ";
      amnt += amount + " ";
      imgall += orderimg;
    }
      
    if(counts == 0){
      $("#orderbtn").fadeOut(200);

    }

    var mySelect = orderimg2;
      $.ajax({
        url: "selectedImg.php",
        method: "GET",
        data: {mySelt:mySelect},
        success: function (data) {
            document.getElementById("projecta2").value = data;
        }
      });
  
      var myAmount = orderimg;
      $.ajax({
        url: "price.php",
        method: "GET",
        data: {myAmnt:myAmount},
        success: function (allamnt) {
          //document.getElementById("amntbox").src = allamnt;
        
        }
      });

      var mySelectimg = imgall;
      $.ajax({
        url: "selectedallimg.php",
        method: "GET",
        data: {mySeltimg:mySelectimg},
        success: function (allsimg) {
          document.getElementById("images").value = allsimg;
          document.getElementById("amntbox2").value = allsimg;
        }
      });

      var mytAmount = amnt;
      $.ajax({
        url: "amnt.php",
        method: "GET",
        data: {mytAmnt:mytAmount},
        success: function (tmnt) {
          //alert(tmnt);
          document.getElementById("amount").value = tmnt;
        }
      });
  }

  $("#orderbtn").click(function(){
    $("#orderbtn").css("display","none");
    $('#order').trigger('click');
  });
  /* for tooltip*/
  function plus(plushw){
    var plus = $(plushw).parent("div");
    var plushw = $(plus).children("i");
    var plushw2 = $(plushw).attr("id");
    var plushw3 = document.getElementById(plushw2);    
  }

  function myFunction(m) {
    var btn =  $(m).attr('id');
    var btns = document.getElementById(btn);
    var pdiv = $(m).parent("div");
    var gpdiv =pdiv.parent("div");
    var mparent =gpdiv.children("div");
    var mmparent = mparent.children("article");
    var mvid = mmparent.children("div");
    var video = mvid.children("video").attr('id');
    var videoClass = mvid.children("video").attr('class');
    // var videoClass = $('video .myVideo');
    var videlement = document.getElementById(video);
    var vidCElement = document.getElementsByClassName(videoClass);

    /*$.each(vidCElement, (i,v) => {
      if(v.paused) {
        getStatus('play')
      }
      else 
      {
        v.pause()
        getStatus('pause')
      }
    })

    function getStatus(cond) {
    if (cond == 'play') {
      btns.innerHTML = "Pause";
      // console.log("play") 
    }
    else{
      btns.innerHTML = "Play";
    }
   } */
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
    x = document.getElementsByClassName("pcolumn");
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

  /* script for pop-up*/
  $("#resultmodal").slideUp(0);
        $("#resultmodal").slideDown(500);
       setTimeout(function(){
          $("#resultmodal").slideUp(500);
       }, 2500);
</script>   
</body>
</html>