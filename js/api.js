// let script = document.createElement('script');
// script.src = '../bootstrap/js/jquery.min.js';
// script.type = 'text/javascript';
// document.getElementsByTagName('head')[0].appendChild(script);

function validateUsername(username) {
    let regularExpression = /^[a-z0-9_.-]*$/;
    return regularExpression.test(username);
}

function checkUsernameStatus() {
    let username = $("#username").val();
    let usernameCheck = document.getElementById('usernameCheck');
    // $('#usernameCheck').text(username);
    if (username.length > 3 && validateUsername(username)) {
        $.ajax({
            type: 'post',
            url: '../operations/checkOperations/checkInData.php',
            data: {username: username},
            success: function (msg) {
                usernameCheck.style.marginTop = "-22px";
                usernameCheck.style.marginBottom = "12px";
                usernameCheck.innerHTML = msg;
            },
        });
    } else if (!validateUsername(username) || username.length < 4) {
        usernameCheck.style.marginTop = "-22px";
        usernameCheck.style.marginBottom = "12px";
        usernameCheck.innerHTML = "Username can have a minimum 4 characters, lowercase letters, minimum one number and one of this _ - . symbols";
    }else {
        usernameCheck.innerHTML = "";
        usernameCheck.style.margin = "0";
    }
}

