function submit(){
	let car = document.getElementById('car').value;
	
	if (car =="") {
		var msg = "please select the type of car you wanna rent";
		document.getElementById('amount').value = "";
		alert(msg);
	}
}

function clearit(){	
	var amount ="";
	document.getElementById('amount').value = amount;
}

function clean(){
	
	let car = document.getElementById('car').value;
	document.getElementById('form').style.transition = "0.5s ease";
	
	if (car == "") {
		document.getElementById("form").style.backgroundImage = "url('../img/audinew.jpg')";
		var amount = "";
		document.getElementById('amount').value = amount;
	}

	if (car =="mercedes 2017") {
		document.getElementById("form").style.backgroundImage = "url('../img/mercedesback.jpeg')";
		var amount = 80000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="mercedes maybach 6") {
		document.getElementById("form").style.backgroundImage = "url('../img/merc-maybach-6-front.jpg')";
		var amount = 110000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="ferarri 488 GTB") {
		document.getElementById("form").style.backgroundImage = "url('../img/ferrari-488_gtb.jpg')";
		var amount = 100000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="ferarri 2018 GTB") {
		document.getElementById("form").style.backgroundImage = "url('../img/ferarriback.jpg')";
		var amount = 110000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="blue audi R8") {
		document.getElementById("form").style.backgroundImage = "url('../img/audi-r8-blue-front.jpg')";
		var amount = 90000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="red audi R8") {
		document.getElementById("form").style.backgroundImage = "url('../img/audiback.jpg')";
		var amount = 90000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="honda CR-v EX-L-AWD") {
		document.getElementById("form").style.backgroundImage = "url('../img/honda-front.png')";
		var amount = 60000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}


	if (car =="lamborghini Aventador SVJ") {
		document.getElementById("form").style.backgroundImage = "url('../img/lamborghininew.jpg')";
		var amount = 120000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="lexus") {
		document.getElementById("form").style.backgroundImage = "url('../img/lexusback.jpg')";
		var amount = 80000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="toyota GTB 6") {
		document.getElementById("form").style.backgroundImage = "url('../img/toyota-gt-86-uk-8.jpg')";
		var amount = 70000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="toyota C-HR") {
		document.getElementById("form").style.backgroundImage = "url('../img/toyotaback.jpg')";
		var amount = 60000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="bugatti chiron") {
		document.getElementById("form").style.backgroundImage = "url('../img/bugattiback.jpg')";
		var amount = 1200000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}
}

//onload*************************
	let car = document.getElementById('car').value;
	document.getElementById('form').style.transition = "0.5s ease";
	
	if (car == "") {
		document.getElementById("form").style.backgroundImage = "url('../img/audinew.jpg')";
		var amount = "";
		document.getElementById('amount').value = amount;
	}

	if (car =="mercedes 2017") {
		document.getElementById("form").style.backgroundImage = "url('../img/mercedesback.jpeg')";
		var amount = 80000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="mercedes maybach 6") {
		document.getElementById("form").style.backgroundImage = "url('../img/merc-maybach-6-front.jpg')";
		var amount = 110000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="ferarri 488 GTB") {
		document.getElementById("form").style.backgroundImage = "url('../img/ferrari-488_gtb.jpg')";
		var amount = 100000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="ferarri 2018 GTB") {
		document.getElementById("form").style.backgroundImage = "url('../img/ferarriback.jpg')";
		var amount = 110000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="blue audi R8") {
		document.getElementById("form").style.backgroundImage = "url('../img/audi-r8-blue-front.jpg')";
		var amount = 90000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="red audi R8") {
		document.getElementById("form").style.backgroundImage = "url('../img/audiback.jpg')";
		var amount = 90000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="honda CR-v EX-L-AWD") {
		document.getElementById("form").style.backgroundImage = "url('../img/honda-front.png')";
		var amount = 60000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}


	if (car =="lamborghini Aventador SVJ") {
		document.getElementById("form").style.backgroundImage = "url('../img/lamborghininew.jpg')";
		var amount = 120000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="lexus") {
		document.getElementById("form").style.backgroundImage = "url('../img/lexusback.jpg')";
		var amount = 80000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="toyota GTB 6") {
		document.getElementById("form").style.backgroundImage = "url('../img/toyota-gt-86-uk-8.jpg')";
		var amount = 70000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="toyota C-HR") {
		document.getElementById("form").style.backgroundImage = "url('../img/toyotaback.jpg')";
		var amount = 60000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}

	if (car =="bugatti chiron") {
		document.getElementById("form").style.backgroundImage = "url('../img/bugattiback.jpg')";
		var amount = 1200000;
		document.getElementById('amount').value = "# " + amount +".00K";
	}