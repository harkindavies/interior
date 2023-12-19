const url = 'assets/xhmx/process.php';
function ajax_regis(file_data) {
	try {
		$.ajax({
			type: "post",
			url: url,
			data: file_data,
			dataType: "JSON",
			success: function(response) {
				console.log(response)
			}
		});
	} catch (e) {
		console.log(e)
	}
}
function ajaxJson(req) {
	$.ajax({
	   type: "post",
	   url: "assets/xhmx/reg.php",
	   data: req,
	   dataType: "JSON",
	   success: function  (response) {
		  console.log(response)
	   }
	})
 }

const form = document.querySelector('form');

function showMessage(data) { 
	console.log(data)
	
	creterial = JSON.parse(data);
	
	let classColor = creterial.success ? 'alert alert-success' : 'alert alert-danger';
    let msg = creterial.success ? creterial.success : creterial.err_upload;
    $('.upload_msg')
    .addClass(classColor)
    .html(msg)
    .fadeIn();

    setTimeout(() => {
        $('.upload_msg')
        .fadeOut(); 
    }, 5000);
}
let myDate = new Date();
myDate = myDate.toLocaleDateString();
function nextMth_date(date, mthInterval = '1') {
        var nd = new Date(date),
            nmonth = '' + (nd.getMonth() + parseInt(mthInterval)),
            nday = '' + nd.getDate(),
            nyear;
        if (nmonth > 12) {
            let newMth = nmonth - (12 * Math.floor(nmonth / 12));
            let newYr = Math.floor(nmonth / 12);
            nyear = (nd.getFullYear() + parseInt(newYr));
            nmonth = newMth;
        } else {
            nyear = nd.getFullYear()
        }
        if (nmonth.length < 2) {
            nmonth = '0' + nmonth;
        }
        if (nday.length < 2) {
            nday = '0' + nday;
        }

        return [nyear, nmonth, nday].join('-');

	} 
	
function reformat_nextdate(t) {
	
    var currD = t, 
        currDay = t.getDate(),
        currmonth = '' + (currD.getMonth() + 1),
        curryear = currD.getFullYear();
    userD = parseInt(userD)
	let d = [curryear, currmonth, currDay].join('-');
	
    return d;
}
form.addEventListener('submit', (e) => {
  e.preventDefault()
var propert = document.querySelector('[type=file]').files[0];//document.getElementById('files').files[0];
// var folderN = $('[name="folderName"]').val();
var linkName = $('[name="linkName"]').val();
var category = $('[name="category"]').val();
var aboutUpload = $('[name="aboutUpload"]').val();
var projectTitle = $('[name="projectTitle"]').val();
// for (let i = 0; i < propert.length; i++) {
//    alert(folderN)
    var form_data = new FormData();
	let dateCreated = nextMth_date(myDate);
		form_data.append("files",propert);
		form_data.append('page','upload');
		form_data.append('pageLink', linkName);
		form_data.append('category', category);
		form_data.append('dateCreated', dateCreated);
		form_data.append('aboutUpload', aboutUpload);
		form_data.append('projectTitle', projectTitle);
		$.ajax({
			url: url,
			method: "post",
			data: form_data,
			contentType:false,
			cache: false,
			processData: false,
			dataType: 'JSON',
			success: function (data) {
				showMessage(data)
			}
		});
// }

}); 

function getValid() {
  var reg_data = {
	fname: $('#fname').val() ? $('#fname').val() : '',
	lname: $('#lname').val() ? $('#lname').val() :'',
	username: $('#username').val() ? $('#username').val() : '',
	password: $('#password').val() ? $('#password').val() : '',
	email: $('#email').val() ? $('#email').val() : '',
	website: $('#website').val() ? $('#website').val() : '',
	phonenum: $('#phonenum').val() ? $('#phonenum').val() : '',
	gender: $('#gender').val() ? $('#gender').val() : '',
	nin: $('#nin').val() ? $('#nin').val() : '',
	page: 'granted',
	delete_file: 'granted'
  }
  ajaxJson(reg_data)
  
//   console.log(reg_data);
}
function getInValid() {
  alert('say Oops!');
}