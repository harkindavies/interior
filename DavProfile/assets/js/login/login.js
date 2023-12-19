const url = 'assets/xhmx/login/login.php';
function ajaxObject(loginCret) {
    $.ajax({
        type: "post",
        url: url,
        data: loginCret,
        // dataType: "JSON",
        success: function (response) {
            login_jsonReturn(response)
        }
    });
}

function showMessage(msg) {
    console.log(msg)
    $('.showMessage label')
    .addClass('p-5 mt-3')
    .html(msg)
    .fadeIn();

    setTimeout(() => {
        $('.showMessage label')
        .fadeOut(); 
    }, 5000);
}

const login_jsonReturn = (creterial) => { 
    creterial = JSON.parse(creterial)
    if (creterial.success) {
        showMessage(creterial.success)

        setTimeout(() => {
            localStorage.setItem('login','granted')

            window.location.replace('/davprofile/web/index.php');
            
        }, 3000);
    }else {
        showMessage(creterial.failed)
        localStorage.setItem('login','denied');
    }
}


$('[aria-pressed="create"]').click(function(e) {
    e.preventDefault();
    window.location.assign('create_acct.html')
})


$('[aria-pressed="progress"]').click(function(e) {
    e.preventDefault();
    
    ajaxObject({
        usernameLogin: $('[name="username"]').val(),
        pwdLogin: $('[name="password"]').val()
    });
})