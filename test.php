<!DOCTYPE html>
<html>
<head>
	<title>AkinDavis interior</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
	.fa{
		font-size: 30px;
		color: #000;
	}

	.checked{
		color:orange;
	}


.mytooltip1 {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.mytooltip1 .mytooltiptext1 {
    
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    
    transition: opacity 0.3s;
}

.mytooltip1 .mytooltiptext1::after {
   content: "";
   position: absolute;
   top: 40%;
   left: 100%;
   border-width: 5px;
   border-style: solid;
   border-color: transparent transparent transparent #000;
}

.mytooltip1:hover .mytooltiptext1 {
    visibility: visible;
    opacity: 1;
}
</style>
<body style="text-align:center;">
	<span id="add" class="fa fa-thumbs-o-up">aaa</span>
<div id="star" class="mySlides5">

  <span class="fa fa-star" onclick="star(this)"></span>
  <span class="fa fa-star" onclick="star(this)"></span>
  <span class="fa fa-star" onclick="star(this)"></span>
  <span class="fa fa-star" onclick="star(this)"></span>
  <span class="fa fa-star" onclick="star(this)"></span>
</div>

<h2>myTooltip</h2>
<p>Move the mouse over the text below:</p>

<div class="mytooltip1">Hover over me
  <span class="mytooltiptext1">myTooltip text</span>
</div>

<i class="fa fa-spinner fa-spin"></i>
<i class="fa fa-circle-o-notch fa-spin"></i>
<i class="fa fa-refresh fa-spin"></i>
<i class="fa fa-cog fa-spin"></i>
<i class="fa fa-spinner fa-pulse"></i>
<i class="fa fa-shield"></i>
<i class="fa fa-shield fa-rotate-90"></i>
<i class="fa fa-shield fa-rotate-180"></i>
<i class="fa fa-shield fa-rotate-270"></i>
<i class="fa fa-shield fa-flip-horizontal"></i>
<i class="fa fa-shield fa-flip-vertical"></i>
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-thin fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x"></i>
</span>
fa-twitter on fa-circle-thin<br>

<span class="fa-stack fa-lg">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
</span>
fa-twitter (inverse) on fa-circle<br>

<span class="fa-stack fa-lg">
  <i class="fa fa-camera fa-stack-1x"></i>
  <i class="fa fa-ban fa-stack-2x text-danger" style="color:red;"></i>
</span>
fa-ban on fa-camera

<div class="list-group">
  <a href="#" class="list-group-item"><i class="fa fa-home fa-fw"></i> Home</a>
  <a href="#" class="list-group-item"><i class="fa fa-book fa-fw"></i> Library</a>
  <a href="#" class="list-group-item"><i class="fa fa-pencil fa-fw"></i> Applications</a>
  <a href="#" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Settings</a>
</div>

<div class="lnr lnr-smile"></div>

<p style="font-size: 50px;">&#9981;</p>

<div class="fa fa-hand-grab-o "></div>
<div class="fa fa-hand-lizard-o "></div>
<div class="fa fa-hand-o-down "></div>
<div class="fa fa-hand-o-left "></div>
<div class="fa fa-hand-o-right  "></div>
<div class="fa fa-hand-o-up "></div>
<div class="fa fa-hand-paper-o  "></div>
<div class="fa fa-hand-peace-o  "></div>
<div class="fa fa-hand-pointer-o  "></div>
<div class="fa fa-rocket  "></div>
<div class="fa fa-hand-scissors-o "></div>
<div class="fa fa-hand-spock-o  "></div>
<div class="fa fa-hand-stop-o "></div>
<div class="fa fa-thumbs-down "></div>
<div class="fa fa-thumbs-o-down "></div>
<div class="fa fa-thumbs-o-up "></div>
<div class="fa fa-thumbs-up"></div">
</body>
</html>
<script type="text/javascript">
	count = 0;
	function star(j){
		var id = $(j).attr('class');
		
		if (id == "fa fa-star") {
			//console.log(id.length);
			//count++;
			var id = $(j).attr('class','fa fa-star checked');
		}
		else {
			var id = $(j).attr('class','fa fa-star');
			//$(n).attr("class","fa fa-thumbs-o-up");
			count--;
		}
		console.log(count);
	}

</script>
<script>
$(document).ready(function(){
    $("#btn1").click(function(){
        alert("Text: " + $("#btn12").attr("href"));
    });
    $("#btn2").click(function(){
        alert("HTML: " + $("#test").val());
    });
});
</script>



<div id="div1" class="fa"></div>

<script>
function chargebattery() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "&#xf244;";

  setTimeout(function () {
      a.innerHTML = "&#xf243;";
    }, 1000);
  setTimeout(function () {
      a.innerHTML = "&#xf242;";
    }, 2000);
  setTimeout(function () {
      a.innerHTML = "&#xf241;";
    }, 3000);
  setTimeout(function () {
      a.innerHTML = "&#xf240;";
    }, 4000);
}
chargebattery();
setInterval(chargebattery, 5000);
</script>

<script>
$(document).ready(function(){
    $("button").click(function(){
        $.get("index.php", function(data, status){
            console.log("Data: " + data + "\nStatus: " + status);
        });
    });
});
</script>
</head>
<body>

<button>Send an HTTP GET request to a page and get the result back</button>

</body>

<p>This example demonstrates how to use an icon library to make an animated effect.</p>

<script>
$(document).ready(function(){
    $("p").filter(".intro").css("background-color", "yellow");
});
</script>
</head>
<body>

<p class="intro">I love Duckburg.</p>
<p>My best friend is Mickey.</p>



</body>
</html>




Pagination
<?php // Below is optional, remove if you have already connected to your database. 

include "conn.php";
$total_pages = $conn->query('SELECT * FROM messagetbl')->num_rows; 
// Check if thepage number is specified and check if it's a number, if not return the default page number which is 1.

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; 
// Number of results to show on each page.
 $num_results_on_page = 10;
  if ($stmt = $conn->prepare('SELECT * FROM messagetbl ORDER BY sn LIMIT ?,?')) { 
  // Calculate the page to get the results we need from our table.
$calc_page = ($page - 1) * $num_results_on_page; 
$stmt->bind_param('ii', $calc_page, $num_results_on_page);
 $stmt->execute(); // Get the results... 
 $result = $stmt->get_result(); 
 ?>


<!DOCTYPE html>
 <html>
  <head>
    <title>PHP & MySQL Pagination by CodeShack</title> 
    <meta charset="utf-8"> 
    <style>
     html { font-family: Tahoma, Geneva, sans-serif; padding: 20px; background-color: #F8F9F9; } 
     table { border-collapse: collapse; width: 500px; } td, th { padding: 10px; } 
     th { background-color: #54585d; color: #ffffff; font-weight: bold; font-size: 13px; border: 1px solid #54585d; } 
   td { color: #636363; border: 1px solid #dddfe1; } 
   tr { background-color: #f9fafb; } 
   tr:nthchild(odd) { background-color: #ffffff; } 
   .pagination { list-style-type: none; padding: 10px 0; display: inline-flex; justify-content: space-between; box-sizing: border-box; } 
  .pagination li { box-sizing: border,box; padding-right: 10px; } 
  .pagination li a { box-sizing: border-box; background-color: #e2e6e6; padding: 8px; text-decoration: none; font-size: 12px; font-weight: bold; color: #616872; border-radius: 4px; } 
  .pagination li a:hover { background-color: #d4dada; } 
  .pagination .next a, .pagination .prev a { text-transform: uppercase; font-size: 12px; } 
  .pagination .currentpage a { background-color: #518acb; color: #fff; } 
  .pagination .currentpage a:hover { background-color: #518acb; } 
</style> 
</head> 
<body>
  <table>
   <tr>
    <th>Name</th> 
    <th>Age</th> 
    <th>Join Date</th> 
    </tr> 
    <?php while ($row = $result->fetch_assoc()): ?> 
    <tr>
     <td><?php echo $row['message']; ?></td>
      <td><?php echo $row['receiver']; ?></td>
    <td><?php echo $row['sender']; ?></td> 
    </tr> <?php endwhile; ?> 
  </table> 
<!-- pagination -->
  <?php if (ceil($total_pages / $num_results_on_page) > 0): ?> 
  <ul class="pagination"> 
  <?php if ($page > 1): ?> 
    <li class="prev"><a href="test.php?page=<?php echo $page-1 ?>">Prev</a></li> 
    <?php endif; ?> 


    <?php if ($page > 3): ?> 
    <li class="start"><a href="test.php?page=1">1</a></li> 
    <li class="dots">...</li> 
    <?php endif; ?> 


    <?php if ($page-2 > 0): ?><li class="page"><a href="test.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?> 
    <?php if ($page-1 > 0): ?><li class="page"><a href="test.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>


    <li class="currentpage"><a href="test.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>


    <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="test.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
    <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
    <li class="page"><a href="test.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>


    <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?> 
    <li class="dots">...</li> 
    <li class="end"><a href = "test.php?page=<?php echo ceil($total_pages / $sum_result_no_page); ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
    <?php endif; ?>


    <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
    <li class="next"><a href="test.php?page=<?php echo $page+1 ?>">Next</a></li>
    <?php endif; ?>
  </ul>
<?php endif;?>
</body>
</html>
<?php
$stmt->close();
}
?>


<div style="background: red; height: 10px;"></div>




<html>
 <head>
  <title>Pagination</title>
   <!-- Bootstrap CDN --> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  </head>
<body> 
<?php
 if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno']; 
 } else {
  $pageno = 1;
   }
$no_of_records_per_page = 10; 
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM messagetbl"; 
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0]; 
$total_pages = ceil($total_rows /
$no_of_records_per_page); $sql = "SELECT * FROM messagetbl LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn,$sql); 
while($row = mysqli_fetch_array($res_data)){ //here goes the data 
  } 
  mysqli_close($conn);
   ?> 
   <ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
     <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"> <a href="<?php if($pageno <= 1){ echo '#'; } else {
echo "?pageno=".($pageno - 1); } ?>">Prev</a> </li> <li class="<?php if($pageno >= $total_pages){
echo 'disabled'; } ?>"> <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".
($pageno + 1); } ?>">Next</a> </li> <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>




<h2>video uploading</h2>
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="filetoupload" accept="video/*" /><br /><br />
  <input type="submit" name="upd" value="upload"/>
</form>
<?php

//require "conn.php";
//ini_set('display_errors', 1);
error_reporting(1);
extract($_POST);
   $target_dir = "video/";
    $target_file = $target_dir.basename($_FILES["filetoupload"]["name"]);
    if ($upd) {
      $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
      
      if ($imagefiletype != "mp4" && $imagefiletype != "avi" && $imagefiletype != "mov" && $imagefiletype != "3gp" && $imagefiletype !="mpeg") {
        echo "format not supported";
      }
      else{
        $video_path = $_FILES['filetoupload']['name'];
        //echo $_FILES["filetoupload"]["tmp_name"];
        if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)){
          echo "uploaded";
        }
        else{
          echo "not upload";
        }
      }
      # code...
    }
?>

<?php
    echo "encoding: ";
  $pass = "admin";
  $pass2 = convert_uuencode($pass)."<br />";
  echo $pass2;
    echo "decoding: ";
  $pass3 = convert_uudecode($pass2)."<br />";
  echo $pass3;
?>
<h2>image preview before uploading</h2>
<input type="file" accept="image/*"  onchange="showMyImage(this)" />
 <br/>
<img id="thumbnil" style="width:20%; margin-top:10px;"  src="" alt="image"/>
JS
<script>
 function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }

</script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}
body {
  font: 16px Arial;  
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
</head>     

<body>

<h2>Autocomplete</h2>

<p>Start typing:</p>

<!--Make sure the form has the autocomplete function switched off:-->
<form autocomplete="off" action="https://www.w3schools.com/action_page.php">
  <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Country">
  </div>
  <input type="submit">
</form>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the country names in the world:*/
var countries = ["Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta","Ebonyi","Edo","Ekiti","Enugu","FCT Abuja","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

</body>
</html>
