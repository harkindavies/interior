/* this is use to generate and count number of image selected */
count = 0;
imgsrc2 = '';
var amnt  = '';
var imgall ='';

function like(n){
	var id2 = $(n).attr('class');
	var id = $(n).attr('id');
	var cartparnt = $(n).parents("div");
		var cartchld = $(cartparnt).children("span");
		spanchld2 = $(cartchld).children("img");
		var spanchld = $(cartchld).children("img").attr("class");
		var newclass = $(spanchld2).attr("class",id+spanchld);
		var clickremve = $(cartparnt).children("div")[1];
		var getmoney = $(cartparnt).children("div")[0];
		var selecti = $(getmoney).children("i")[0];
		var amount = $(selecti).attr("id");
		var remve = $(clickremve).attr("id");
		amount = document.getElementById(amount).innerHTML;
	if (id2 == "fa fa-cart-plus") {
		document.getElementById(remve).innerHTML = "Click to Remove from Cart";
		$(".ordercart").fadeIn(300);
		count++;
		$(n).attr("class","fa fa-cart-arrow-down");
		var imgsrc = $(n).attr('src') + " ";
		imguse = $(n).attr('src')+ " ";
		imgall += imgsrc;
		imgsrc2 += imgsrc + ""+"(#"+amount +"/m"+")  ";
		amnt += amount + " ";
		
		$(newclass).fadeIn(300);
		$(newclass).css("position","absolute");
		$(newclass).css("bottom","90%");
		$(newclass).css("left","84%");
		$(newclass).css("transform","translate("-50%","-50%")");
		$(newclass).css("height","50px");
		$(newclass).css("width","55px");

	}
	else {
		$(newclass).fadeOut(300);
		document.getElementById(remve).innerHTML = "Click to Add to Cart";
		$(n).attr("class","fa fa-cart-plus");
		count--;
		amntnew = amnt.replace(amount+" ","");
		amnt = amntnew;
		var imgr = $(n).attr('src')+" ";
		imguse = $(n).attr('src')+ " ";
		var imgxtrt = imgall.replace(imgr,"");
		imgall = imgxtrt;
		var imgsrcremove = $(n).attr('src')+" (#"+amount +"/m"+")  ";
		var imgsrc3 = imgsrc2.replace(imgsrcremove,"");
		imgsrc2 = imgsrc3;
	}

	if(count <= 0){
		$(".ordercart").fadeOut(300);
	}
}

function closeModal(s){
	$(s).parent().css("display", "none");
	document.getElementById("inforow").style.zIndex = "2";
	
	if (count == 0){
		$(s).parent().css("display", "none");
    	document.getElementById("mycontainer").style.overflow = "visible";
	}
	else{	
		if (confirm("Do you want to place the order in your cart? " )){

			/* this lines of code holds d value of image
	 	   selected and send it to selectedimg page */
			var mySelect = imgsrc2;
			$.ajax({
				url: "selectedImg.php",
				method: "GET",
				data: {mySelt:mySelect},
				success: function (data) {
					//alert(data);
					document.getElementById("projecta2").value = data;
					//$('#order').trigger('click');
				}
			});

			var myAmount = imguse;
			$.ajax({
				url: "price.php",
				method: "GET",
				data: {myAmnt:myAmount},
				success: function (allamnt) {
					//alert(data);
					//document.getElementById("amntbox").src = allamnt;
				}
			});

			var mySelectimg = imgall;
			$.ajax({
				url: "selectedallimg.php",
				method: "GET",
				data: {mySeltimg:mySelectimg},
				success: function (allsimg) {
					//alert(allsimg);
					//document.getElementById("imgsrc").src = data;
					document.getElementById("images").value = allsimg;
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

			$('#order').trigger('click');
    		document.getElementById("mycontainer").style.overflow = "visible";
		} else{
			count = 0;
			location.reload(0);
			$(".fa-cart-arrow-down").attr("class","fa fa-cart-plus");
			document.getElementById("mycontainer").style.overflow = "visible";
		}        	
	}
}