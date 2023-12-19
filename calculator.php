<?php
require "conn.php";
//session_start();	
?>
<!DOCTYPE html>
<html>
<title>Calculator</title>
	
	<style type="text/css">
	.rows{
		box-sizing: border-box;
		display: inline-flex;
		width: 43%;
		margin: 15px 4px 15px 15px;
		padding: 0;
	}
	div.outputc{
		box-sizing: border-box;
		width: 100%;
		margin: 10px 0 5px;
		text-align: center;
	}
	div.outputc #outputc{
		min-width: 80%;
		padding: 5px;
		border: none;
		background: #eff;
		outline: 1px solid mediumseagreen;
	}

	.rows .fa{
		padding: 10px;
		border-style: none/*solid*/;
		border-width: 1px;
		border-color: /*#bbb transparent #bbb #bbb*/;
		background: #eef;
		font-size: 15.7px;
		font-family: 'Helvital';
		font-weight: 560;
	}

	.rows input[type=text], .rows select#method{
		box-sizing: border-box;
		font-size: 17px;
		width: 50%;
		border:none;
		border-bottom: 0.095em solid #bbb; 
		padding: 7px;
		background: rgba(255,255,255,.5);
	}
	input#metre, #mlength, #mbreadth {
		background: unset;
	}

	.rows select#method{
		width: 70%;
	}
	.rows select#method:focus{
		outline: none;
	}
	.rows select#method > option{
		background: #bbb;
		font-size: 17px;
	}
	
	.rows input[type=text]:focus{outline: none;}

	.rows input[type=button]{
		border: 1px solid transparent;
		background: mediumseagreen;
		padding: 6px 20px;
		border-radius: 5px;
		color: #fff;
		transition: .5s;
		font-size: 18px;
	}
	.rows input[type=button]:hover{
		color: mediumseagreen;
		background: rgba(255,255,255,.8);
		border: 1px solid mediumseagreen;
		transition: .5s;
	}

	div.buttons{
		display: block;
		margin: 10px auto;
	}

	#changepasswordpg > div > div > form > div.buttons.rows{
		background: unset;
	}

	.cltext{
		
		text-align: center;
		font-size: 1.8em;
		font-family: 'Helvital';
		font-weight: 550;
	}

	#calculatorpg{	
		display: none;
		position: fixed;
		top: 105px;
		z-index: 10;
	}

	.formbackground{
		padding: 10px;
	}
	#slterror{color: red;}
	div.slterror{
		text-align: center;
	}
	
</style>
</head>
<body>
	<span id="calculatorp" onclick="calulatep()"></span>		
	<div class="container">
		<div class="row">
			<div id="calculatorpg" class="col-md-offset-4 col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6 col-sm-offset-6 col-xs-12">
				<div class="formbody" style="background-image: url('img/landing-image.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
					<div class="formbackground" style="background: rgba(255,255,255,.4);">
						<span class="fa fa-close" style="color: red; font-size: 21px; position: absolute; right: 7%;" onclick="closecalculator()"></span>
						<div class="cltext">Caculator</div>
						<form autocomplete="off">
							<div class="outputc">
								<input type="text" name="" id="outputc" disabled="">
							</div>
							<div class="rows">
								<span class="fa" for="password">From</span>
								
								<select id="method" onchange="sltchange()">
								  <option value="metre">Metre</option>
								  <option value="feet">Feet</option>
								</select>
							</div>

							<div class="rows">
								<span class="fa">To:</span> <input type="text" placeholder="Metre" id="metre" disabled="">
							</div>

							<div class="rows">
								<span class="fa">Length:</span> <input type="text" placeholder="" id="length" oninput="LengthConverter(this.value)" onkeyup="LengthConverter(this.value)" onchange="LengthConverter(this.value)">
							</div>
							<div class="rows">
								<span class="fa">&#9878;</span>
								<input type="text" id="mlength" placeholder="" disabled="">
							</div>

							<div class="rows">
								<span class="fa">Breadth</span><input type="text" placeholder="" id="breadth" oninput="BreadthConverter(this.value)" onkeyup="BreadthConverter(this.value)" onchange="BreadthConverter(this.value)">
							</div>
							<div class="rows">
								<span class="fa" style="">&#9878;</span>
								<input type="text" placeholder="" id="mbreadth" disabled="">
							</div>

							<div class="slterror">
								<span id="slterror"></span>
							</div>

							<div class="buttons rows">
								<input type="button" class="change" name="submit" value="Calculate" onclick="submitbtn()">
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	

		function LengthConverter(lval){
			var mvalue = document.getElementById('method').value;
			var rslt = document.getElementById('mlength');
			if((mvalue == "feet") && Number(lval)){
				var mrslt = lval/3.2808;
				rslt.value = mrslt;	
			}
			else if ((mvalue == "metre") && Number(lval)) {
				var mrslt = lval;
					rslt.value = mrslt;	
			}
			else{
				document.getElementById('slterror').innerHTML = "Please enter number only";
				document.getElementById('mlength').value = "";
			}
		}			

	function BreadthConverter(bval){
		var bvalue = document.getElementById('method').value;
		var rslt2 = document.getElementById('mbreadth');
		if ((bvalue == "feet") && Number(bval)) {
			var mrslt2 =  bval/3.2808;
				rslt2.value =mrslt2;
				document.getElementById('slterror').innerHTML = "";
		}

		else if((bvalue == "metre") && Number(bval)) {
			var mrslt2 =  bval;
				rslt2.value = bval;
				document.getElementById('slterror').innerHTML = "";
		}

		else{
			document.getElementById('slterror').innerHTML = "Please enter number only";
				document.getElementById('mbreadth').value = "";
		}
	}

	function sltchange(){
		document.getElementById('length').value = "";	
		document.getElementById('breadth').value = "";
		document.getElementById('mlength').value = "";
		document.getElementById('mbreadth').value = "";
		document.getElementById('outputc').value = "";
	}

	function submitbtn(){
		var sublength =	document.getElementById('mlength').value;
		var subbreadth = document.getElementById('mbreadth').value;
		var suboutput = document.getElementById('outputc');
		if (sublength != "" && subbreadth != "") {
			l = sublength * subbreadth;
			suboutput.value = l.toFixed(2) + " m^2";
		}
	}
	
	function calulatep(){
		$("#calculatorpg").slideUp(0);
			setTimeout(function(){
				$("#calculatorpg").slideDown(300);
				$("#calculatorpg").css('display','block');
			}, 0);
		}

		function closecalculator(){
				$("#calculatorpg").slideUp(300);

		}

</script>
