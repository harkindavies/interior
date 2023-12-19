<?php
$cookie_name = "user";
$cookie_value = "JDoe";
setcookie("test_cookie", "test", time() + (3600), "/"); // 86400 = 1 day
$sest = session_get_cookie_params();
setrawcookie($cookie_name, $cookie_value, time()+(68400 * 30), "/");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<script type="text/javascript" src="bootstrap/js/jQuery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="Detect/detect.js"></script>
</head>
<body class="container">
	<?php
	print $sest[0];
	if (count($_COOKIE) > 0 ) {
		echo "cookie is enable";
	}else{echo "cooki is not enable";}

	if(!isset($_COOKIE[$cookie_name])) {
	    echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
	    echo "Cookie '" . $cookie_name . "' is set!<br>";
	    echo "Value is: " . $_COOKIE[$cookie_name];
	}
	?>
<div>
	<span id="a1" onclick="functionst(this)" class=" fa fa-star astar"></span>
	<span id="a2" onclick="functionst(this)" class=" fa fa-star astar"></span>
	<span id="a3" onclick="functionst(this)" class=" fa fa-star astar"></span>
	<span id="a4" onclick="functionst(this)" class=" fa fa-star astar"></span>
	<span id="a5" onclick="functionst(this)" class=" fa fa-star astar"></span>
</div>

<div>
	<span id="b1" onclick="functionst(this)" class=" fa fa-star bstar"></span>
	<span id="b2" onclick="functionst(this)" class=" fa fa-star bstar"></span>
	<span id="b3" onclick="functionst(this)" class=" fa fa-star bstar"></span>
	<span id="b4" onclick="functionst(this)" class=" fa fa-star bstar"></span>
	<span id="b5" onclick="functionst(this)" class=" fa fa-star bstar"></span>
</div>

<div>
	<span id="c1" onclick="functionst(this)" class=" fa fa-star cstar"></span>
	<span id="c2" onclick="functionst(this)" class=" fa fa-star cstar"></span>
	<span id="c3" onclick="functionst(this)" class=" fa fa-star cstar"></span>
	<span id="c4" onclick="functionst(this)" class=" fa fa-star cstar"></span>
	<span id="c5" onclick="functionst(this)" class=" fa fa-star cstar"></span>
</div>

<div>
	<span id="d1" onclick="functionst(this)" class=" fa fa-star dstar"></span>
	<span id="d2" onclick="functionst(this)" class=" fa fa-star dstar"></span>
	<span id="d3" onclick="functionst(this)" class=" fa fa-star dstar"></span>
	<span id="d4" onclick="functionst(this)" class=" fa fa-star dstar"></span>
	<span id="d5" onclick="functionst(this)" class=" fa fa-star dstar"></span>
</div>

<div>
	<span id="e1" onclick="functionst(this)" class=" fa fa-star estar"></span>
	<span id="e2" onclick="functionst(this)" class=" fa fa-star estar"></span>
	<span id="e3" onclick="functionst(this)" class=" fa fa-star estar"></span>
	<span id="e4" onclick="functionst(this)" class=" fa fa-star estar"></span>
	<span id="e5" onclick="functionst(this)" class=" fa fa-star estar"></span>
</div>

</body>
<style type="text/css">
	body{
		margin: 10% auto;
		background: rgba(0,0,0,0.4);
	}

	.fa-star{
		color: #fff;
		font-size: 20px;
	}
</style>
</html>
<script type="text/javascript">
	function functionst(t){
		$(".astar").css("color","#fff")
		var rst = $(t).attr("id");

		for (var i = 1; i <= rst; i++) {
		    var rst2 = document.getElementById(i)
            rst2.style.color = "yellow"
            rst2.style.transition = "1.5s"
		}
	}

	function functionst(b){
		$(".fa-star").css("color","#fff")
		var rst = $(b).attr("id");
		rst2 = rst.slice(1, 2);
		rst3 = rst.slice(0, 1);
		alert(rst2 + rst3);
		for (var i = 1; i <= rst2; i++) {
		    var rst4 = document.getElementById(rst3 + i)
            rst4.style.color = "yellow"
            rst4.style.transition = "1.5s"
		}
	}

	var ua = detect.parse(navigator.userAgent)
	//console.log(ua.device.type)
	//console.log(ua.browser.family)
	//console.log(ua.browser.name)
	//console.log(ua.browser.version)
	//console.log(ua.browser.major);
//console.log(ua.browser.minor);
console.log(ua.browser.patch);
console.log(ua.device.family);
console.log(ua.device.name);
console.log(ua.device.version);
console.log(ua.device.major);
console.log(ua.device.minor);
console.log(ua.device.patch);
console.log(ua.device.type);
console.log(ua.device.manufacturer);
console.log(ua.os.family);
console.log(ua.os.name);
console.log(ua.os.version);
console.log(ua.os.major);
console.log(ua.os.minor);
console.log(ua.os.patch);

</script>