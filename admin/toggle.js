	function closefunction() {
			$("#menu") .hide();
			$("#click") .show();
			$("#click2") .hide();
	}
	
	function toggle() {
		var x = document.getElementById("menu");
		if (x.style.display==="block") {
			$("#menu") .hide(100);
			$("#click2") .hide();
			$("#click") .show();
			$("#click") .css("background color", "steelblue");
		}
		else{
			$("#menu") .show(100);
			$("#click") .hide();
			$("#click2") .show();
			$("#click2") .css("background-color", "transparent");
		}
	}

	function clickm(){
		var b = document.getElementById('pickrent');
		if (b.style.display === "block") {
			//b.style.display = "none";
			//$("#pickrent") .hide(1000);
		}
		else{
			$("#pickrent") .show();
			//b.style.display = "block";
		}
	}
	function clickme(){
		$("#pickrent") .hide();
	}
	function leavem(){
		$("#pickrent") .show();
	}
	function leaveme(){
		$("#pickrent") .hide();
	}

		function clickmb(){
		var bb = document.getElementById('pickrentb');
		if (bb.style.display === "block") {
			//b.style.display = "none";
			//$("#pickrent") .hide(1000);
		}
		else{
			$("#pickrentb") .show();
			//b.style.display = "block";
		}
	}
	function clickmeb(){
		$("#pickrentb") .hide();
	}
	function leavemb(){
		$("#pickrentb") .show();
	}
	function leavemeb(){
		$("#pickrentb") .hide();
	}