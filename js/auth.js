function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validatePassword(password) {
    let regularExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$!%#*?&]{8,}$/;
    return regularExpression.test(password);
}

function regButtonToggleDisable() {
    checkMailStatus();
    setTimeout(function () {
        let emailCheck = document.getElementById('emailCheck').innerText;

        let email = document.getElementById('email').value;
        let firstName = document.getElementById('regFirstName').value;
        let lastName = document.getElementById('regLastName').value;
        let pass = document.getElementById('regPassword').value;
        let regButton = document.getElementById("regButton");

        if (emailCheck === "Email is not registered." && email.length > 5 && firstName.length > 1 && lastName.length > 1 && pass.length > 7 && validateEmail(email) && validatePassword(pass)) {
            regButton.disabled = false;
        } else {
            regButton.disabled = true;
        }
    }, 100);
}

function checkFuncForEmail() {
    let email = document.getElementById('email').value;
    let emailCheck = document.getElementById('emailCheck');
    if (email.length < 7) {
        emailCheck.style.marginTop = "-22px";
        emailCheck.style.marginBottom = "12px";
        emailCheck.innerHTML = "The Email must be a minimum of 7 characters";
    } else if (!validateEmail(email)) {
        emailCheck.style.marginTop = "-22px";
        emailCheck.style.marginBottom = "12px";
        emailCheck.innerHTML = "Please write correct Email address";
    }
}

function checkFuncForLoginEmail() {
    let email = document.getElementById('email').value;
    let emailCheck = document.getElementById('emailCheck');
    if (email.length < 7) {
        emailCheck.style.marginTop = "-22px";
        emailCheck.style.marginBottom = "12px";
        emailCheck.innerHTML = "The Email must be a minimum of 7 characters";
    } else if (!validateEmail(email)) {
        emailCheck.style.marginTop = "-22px";
        emailCheck.style.marginBottom = "12px";
        emailCheck.innerHTML = "Please write correct Email address";
    } else {
        emailCheck.innerHTML = "";
        emailCheck.style.margin = "0";
    }
}

function regButtonCheckForPassword() {
    let pass = document.getElementById("regPassword").value;
    let passCheck = document.getElementById("passCheck");
    if (pass.length < 8) {
        passCheck.style.marginTop = "-22px";
        passCheck.style.marginBottom = "12px";
        passCheck.innerHTML = "Password must be a minimum of 8 characters";
    } else if (!validatePassword(pass)) {
        passCheck.style.marginTop = "-22px";
        passCheck.style.marginBottom = "12px";
        passCheck.innerHTML = "Password must be a including number, Upper, Lower And one special character";
    } else {
        passCheck.innerHTML = "";
        passCheck.style.margin = "0";
    }
}


function checkMailStatus() {
    let email = $("#email").val();
    let emailCheck = document.getElementById('emailCheck');

    if (email.length > 5 && validateEmail(email)) {
        $.ajax({
            type: 'post',
            url: '../operations/checkOperations/checkInData.php',
            data: {email: email},
            success: function (msg) {
                emailCheck.style.marginTop = "-22px";
                emailCheck.style.marginBottom = "12px";
                emailCheck.innerHTML = msg;
            },
        });
    } else {
        emailCheck.innerHTML = "";
        emailCheck.style.margin = "0";
    }
}


// change password page functions

function checkChangePassword() {
    let pass = document.getElementById('password');
    let passTwo = document.getElementById("passwordTwo");
    let passCheck = document.getElementById('passCheck');
    let passCheckTwo = document.getElementById('passCheckTwo');
    let button = document.getElementById('changePassButton');

    if (pass && passTwo && pass.value.length > 7) {
        if (!validatePassword(pass.value)) {
            passCheck.style.marginTop = "-22px";
            passCheck.style.marginBottom = "12px";
            passCheck.innerHTML = "Password must be a including number, Upper, Lower And one special character";
            button.disabled = true;
            passCheckTwo.innerHTML = "";
            passCheckTwo.style.margin = "0";
        } else if (validatePassword(pass.value)) {
            if (pass.value === passTwo.value){
                button.disabled = false;
                passCheck.innerHTML = "";
                passCheck.style.margin = "0";
                passCheckTwo.innerHTML = "";
                passCheckTwo.style.margin = "0";
            } else {
                button.disabled = true;
                passCheck.innerHTML = "";
                passCheck.style.margin = "0";
                passCheckTwo.style.marginTop = "-22px";
                passCheckTwo.style.marginBottom = "12px";
                passCheckTwo.innerHTML = "Passwords don't equal";
            }
        }else {
            passCheck.innerHTML = "Please reload page.";
            button.disabled = true;
        }
    } else {
        passCheck.style.marginTop = "-22px";
        passCheck.style.marginBottom = "12px";
        passCheck.innerHTML = "Password must be a minimum of 8 characters";
        button.disabled = true;
    }
}




