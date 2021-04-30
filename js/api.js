// let script = document.createElement('script');
// script.src = '../js/validations.js';
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
    } else {
        usernameCheck.innerHTML = "";
        usernameCheck.style.margin = "0";
    }
}

function checkPasswordStatus() {
    let password = $("#currentPass").val();
    let passCheck = document.getElementById('currentPassCheck');
    if (password.length > 7 && validatePassword(password)) {
        $.ajax({
            type: 'post',
            url: '../operations/checkOperations/checkInData.php',
            data: {password: password},
            success: function (msg) {
                passCheck.style.marginTop = "-22px";
                passCheck.style.marginBottom = "12px";
                passCheck.innerHTML = msg;
            }
        });
    } else if (!validatePassword(password) || password.length < 8) {
        passCheck.style.marginTop = "-22px";
        passCheck.style.marginBottom = "12px";
        passCheck.innerHTML = "Please write valid password";
    } else {
        passCheck.innerHTML = "";
        passCheck.style.margin = "0";
    }
}

function changeUserPassword() {
    let newPass = $("#newPass").val();
    let reTypePass = $("#reEnterNewPass").val();
    let backEndError = $("#errorFromBackEnd");
    let buttonChangePass = document.getElementById('changePassword');
    let checkCurrentPass = $("#currentPassCheck");
    let checkNewPass = $("#passCheck");
    let checkReEnteredPass = $("#reEnterPassCheck");

    if (newPass === reTypePass) {
        if (newPass.length > 7 && validatePassword(newPass)) {
            $.ajax({
                type: 'post',
                url: '../operations/liveUpdates/changePass.php',
                data: {changePass: newPass},
                success: function (msg) {
                    if (msg === "Your password has changed.") {
                        backEndError.css("color", "green");
                        $('input.chPass').val('');
                        buttonChangePass.disabled = true;
                        backEndError.text(msg);
                        checkCurrentPass.text("");
                        checkNewPass.text("");
                        checkReEnteredPass.text("");
                        checkCurrentPass.css("margin", "0");
                        checkNewPass.css("margin", "0");
                        checkReEnteredPass.css("margin", "0");
                    } else {
                        backEndError.css("color", "red");
                        buttonChangePass.disabled = true;
                        backEndError.text(msg);
                    }
                }
            })
        } else {
            backEndError.css("color", "red");
            buttonChangePass.disabled = true;
            backEndError.text("Password is not valid.");
        }
    } else {
        backEndError.css("color", "red");
        buttonChangePass.disabled = true;
        backEndError.html("Passwords do not match");
    }
}


/////////////  add lesson ///////////////////

function addLesson() {
    let lessonTitle = $("#lessonTitle").val();
    let meetingLink = $("#lessonLink").val();
    let lessonData = $("#lessonDate").val();
    let lessonDesc = $("#lessonDescription").val();
    let errorText = $('#errorFromBackEnd');

    errorText.css('color', 'red');

    if (lessonTitle.length >= 5) {
        if (meetingLink.length >= 7) {
            if (lessonData.length >= 5) {
                if (lessonDesc.length >= 60) {
                    $.ajax({
                        type: 'post',
                        url: '../operations/liveUpdates/addLesson.php',
                        data: {
                            lessonTitle: lessonTitle,
                            lessonData: lessonData,
                            meetingLink: meetingLink,
                            lessonDesc: lessonDesc,
                        },
                        success: function (msg) {
                            if (msg === "Your Lesson Added") {
                                errorText.css('color', 'green');
                                $('#lessonTitle').val('');
                                $('#lessonLink').val('');
                                $('#lessonDate').val('');
                                $('#lessonDescription').val('');
                                errorText.text(msg);
                            } else {
                                errorText.text(msg);
                            }
                        }
                    });
                } else {
                    errorText.text("Description length is low from 60");
                }
            } else {
                errorText.text("Please select valid data");
            }
        } else {
            errorText.text("Meeting text length is low from 7");
        }
    } else {
        errorText.text("Title text length is low from 10");
    }
}

