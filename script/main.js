
$(document).ready(function(){

        $(".content1, .content2, .content3, .content4, .content5, .content6").mouseenter(function(){
        	$(this).css("opacity", "");
        });

        $(".content1, .content2, .content3, .content4, .content5, .content6").mouseleave(function(){
        	$(this).css("opacity", "");
        });

});
   

    /* modal script & it slider 1 */
        function openModal() {
          document.getElementById('myModal').style.display = "block";
          document.getElementById("mycontainer").style.overflow = "hidden";  
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(d) {
          showSlides(slideIndex += d);
        }

        function currentSlide(d) {
          showSlides(slideIndex = d);
        }

        function showSlides(d) {
          var dd;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          var captionText = document.getElementById("caption");
          if (d > slides.length) {slideIndex = 1; }
          if (d < 1) {slideIndex = slides.length}
          for (dd = 0; dd < slides.length; dd++) {
              slides[dd].style.display = "none";
          }
          for (dd = 0; dd < dots.length; dd++) {
              dots[dd].className = dots[dd].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          captionText.innerHTML = dots[slideIndex-1].alt;
        }

        /*modal end 1 */

    /* modal script & it slider 2 */
        function openModal2() {
          document.getElementById('myModal2').style.display = "block";
          document.getElementById("mycontainer").style.overflow = "hidden";  
        }

        var slideIndex2 = 1;
        showSlides2(slideIndex2);

        function plusSlides2(b) {
          showSlides2(slideIndex2 += b);
        }

        function currentSlide2(b) {
          showSlides2(slideIndex2 = b);
        }

        function showSlides2(b) {
          var bb;
          var slides2 = document.getElementsByClassName("mySlides2");
          var dots2 = document.getElementsByClassName("demo2");
          var captionText2 = document.getElementById("caption2");
          if (b > slides2.length) {slideIndex2 = 1; }
          if (b < 1) {slideIndex2 = slides2.length}
          for (bb = 0; bb < slides2.length; bb++) {
              slides2[bb].style.display = "none";
          }
          for (bb = 0; bb < dots2.length; bb++) {
              dots2[bb].className = dots2[bb].className.replace(" active", "");
          }
          slides2[slideIndex2-1].style.display = "block";
          dots2[slideIndex2-1].className += " active";
          captionText2.innerHTML = dots2[slideIndex2-1].alt;
        }

        /*modal end 2 */

    /* modal script & it slider 3 */
        function openModal3() {
            document.getElementById('myModal3').style.display = "block";
            document.getElementById("mycontainer").style.overflow = "hidden";  
        }

            var slideIndex3 = 1;
            showSlides3(slideIndex3);

        function plusSlides3(c) {
            showSlides3(slideIndex3 += c);
        }

        function currentSlide3(c) {
            showSlides3(slideIndex3 = c);
        }

        function showSlides3(c) {
            var cc;
            var slides3 = document.getElementsByClassName("mySlides3");
            var dots3 = document.getElementsByClassName("demo3");
            var captionText3 = document.getElementById("caption3");
            if (c > slides3.length) {slideIndex3 = 1; }
            if (c < 1) {slideIndex3 = slides3.length}
            for (cc = 0; cc < slides3.length; cc++) {
                slides3[cc].style.display = "none";
            }
            for (cc = 0; cc < dots3.length; cc++) {
                dots3[cc].className = dots3[cc].className.replace(" active", "");
            }
            slides3[slideIndex3-1].style.display = "block";
            dots3[slideIndex3-1].className += " active";
            captionText3.innerHTML = dots3[slideIndex3-1].alt;
        }

        /*modal end 3 */

    /* modal script & it slider 4*/
        function openModal4() {
            document.getElementById('myModal4').style.display = "block";
            document.getElementById("mycontainer").style.overflow = "hidden";  
        }

            var slideIndex4 = 1;
            showSlides4(slideIndex4);

        function plusSlides4(j) {
            showSlides4(slideIndex4 += j);
        }

        function currentSlide4(j) {
            showSlides4(slideIndex4 = j);
        }

        function showSlides4(j) {
            var jj;
            var slides4 = document.getElementsByClassName("mySlides4");
            var dots4 = document.getElementsByClassName("demo4");
            var captionText4 = document.getElementById("caption4");
            if (j > slides4.length) {slideIndex4 = 1; }
            if (j < 1) {slideIndex4 = slides4.length}
            for (jj = 0; jj < slides4.length; jj++) {
                slides4[jj].style.display = "none";
            }
            for (jj = 0; jj < dots4.length; jj++) {
                dots4[jj].className = dots4[jj].className.replace(" active", "");
            }
            slides4[slideIndex4-1].style.display = "block";
            dots4[slideIndex4-1].className += " active";
            captionText4.innerHTML = dots4[slideIndex4-1].alt;
        }

        /*modal end 4 */

          /* modal script & it slider 5 */
      function openModal5() {
        document.getElementById('myModal5').style.display = "block";
        document.getElementById("mycontainer").style.overflow = "hidden";  
      }

      var slideIndex5 = 1;
      showSlides5(slideIndex5);

      function plusSlides5(k) {
        showSlides5(slideIndex5 += k);
      }

      function currentSlide5(k) {
        showSlides5(slideIndex5 = k);
      }

      function showSlides5(k) {
        var kk;
        var slides5 = document.getElementsByClassName("mySlides5");
        var dots5 = document.getElementsByClassName("demo5");
        var captionText5 = document.getElementById("caption5");
        if (k > slides5.length) {slideIndex5 = 1; }
        if (k < 1) {slideIndex5 = slides5.length}
        for (kk = 0; kk < slides5.length; kk++) {
            slides5[kk].style.display = "none";
        }
        for (kk = 0; kk < dots5.length; kk++) {
            dots5[kk].className = dots5[kk].className.replace(" active", "");
        }
        slides5[slideIndex5-1].style.display = "block";
        dots5[slideIndex5-1].className += " active";
        captionText5.innerHTML = dots5[slideIndex5-1].alt;
      }

      /*modal end 5 */

    /* modal script & it slider*/
        function openModal6() {
          document.getElementById('myModal6').style.display = "block";
          document.getElementById("mycontainer").style.overflow = "hidden"; 

          /*footer controller */

          $(".footer").slideUp(0);

          /* footer end */
 
        }

           /*footer controller */

          $(".footer").slideDown(0);
          
          /* footer end 
          
        }*/

        var slideIndex6 = 1;
        showSlides6(slideIndex6);

        function plusSlides6(a) {
          showSlides6(slideIndex6 += a);
        }

        function currentSlide6(a) {
          showSlides6(slideIndex6 = a);
        }

        function showSlides6(a) {
          var aa;
          var slides6 = document.getElementsByClassName("mySlides6");
          var dots6 = document.getElementsByClassName("demo6");
          var captionText6 = document.getElementById("caption6");
          if (a > slides6.length) {slideIndex6 = 1; }
          if (a < 1) {slideIndex6 = slides6.length}
          for (aa = 0; aa < slides6.length; aa++) {
              slides6[aa].style.display = "none";
          }
          for (aa = 0; aa < dots6.length; aa++) {
              dots6[aa].className = dots6[aa].className.replace(" active", "");
          }
          slides6[slideIndex6-1].style.display = "block";
          dots6[slideIndex6-1].className += " active";
          captionText6.innerHTML = dots6[slideIndex6-1].alt;
        }
        /*modal end */