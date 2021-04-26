let script = document.createElement('script');
script.src = '../js/validations.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


// settings page account side
// user type zero
// where change user type add or remove

function changeUserType(sel) {
    function childsSectionShowHide(requiredBool, displayStyle) {
        let childItems = document.getElementById("child");
        let childsFName = document.getElementById("childsFName");
        let childsLName = document.getElementById("childsLName");
        let childsPassword = document.getElementById("childsPassword");

        childItems.style.display = `${displayStyle}`;
        childsFName.required = requiredBool;
        childsLName.required = requiredBool;
        childsPassword.required = requiredBool;
    }

    if (sel.options[sel.selectedIndex].text === "Parent") {
        childsSectionShowHide(true, "block")
    } else {
        childsSectionShowHide(false, "none");
    }
}


// check is all field is filled and selected in settings page first time

function checkIsAllFilled() {
    let button = document.getElementById('firstLoginButton');
    let userType = document.getElementById('userTypeSelect');
    let username = document.getElementById('username').value;
    setTimeout(function () {
        let checkUsernameStatus = document.getElementById('usernameCheck').innerText;
        let childFName = document.getElementById('childsFName').value;
        let childLName = document.getElementById('childsLName').value;
        let childPassword = document.getElementById('childsPassword').value;
        if (username.length < 4 || !validateUsername(username)) {
            button.disabled = true;
        } else {
            if (userType.options[userType.selectedIndex].text === "Parent") {
                if (childPassword.length < 8 || !validatePassword(childPassword)) {
                    button.disabled = true;
                } else {
                    button.disabled = childFName.length < 2 || childLName.length < 2;
                }
            } else if (userType.options[userType.selectedIndex].text === "Student") {
                if (checkUsernameStatus === "Username is not registered.") {
                    let selectLesson = document.getElementById('selectSubject');
                    let selectedLesson = selectLesson.options[selectLesson.selectedIndex].text;

                    if (selectedLesson === "English" || selectedLesson === "Spanish" || selectedLesson === "JavaScript") {
                        button.disabled = false;
                    } else {
                        button.selected = true;
                    }
                } else {
                    button.disabled = true;
                }
            } else {
                button.disabled = true;
            }
        }
    }, 100);
}


// change password from settings page section
// change password button function

document.getElementById("editPassword").onclick = function (){toggleChangePass()}

function toggleChangePass(){
    let changePassWrapper = document.getElementById("changePassWrapper");
    let addBorderToWDiv = document.getElementsByClassName("changePass");

    if (changePassWrapper.style.display === "block") {
        changePassWrapper.style.display = "none";
        addBorderToWDiv[0].style.borderBottom = "none";
        document.getElementById("editPassword").innerText = "Edit";
    }else{
        changePassWrapper.style.display = "block";
        addBorderToWDiv[0].style.borderBottom = "1px solid #bfbfbf";
        document.getElementById("editPassword").innerText = "Exit";
    }
}

// check is re-entered password equal to new password

function isEqualReTypedPass(){
    let checkIsEqualPassValues = document.getElementById('reEnterPassCheck');

    setTimeout(function () {
        let newPass = document.getElementById('newPass').value;
        let reEnterPass = document.getElementById('reEnterNewPass').value;
        if (newPass === reEnterPass) {
            checkIsEqualPassValues.style.marginTop = "-22px";
            checkIsEqualPassValues.style.marginBottom = "12px";
            checkIsEqualPassValues.innerText = "Passwords match";
        }else {
            checkIsEqualPassValues.style.marginTop = "-22px";
            checkIsEqualPassValues.style.marginBottom = "12px";
            checkIsEqualPassValues.innerText = "Passwords do not match";
        }
    },100);
}

// change password submit button toggle activation

function changePassCheckFilled() {
    let currentPass = document.getElementById('currentPass').value;
    let newPass = document.getElementById('newPass').value;
    let reEnterPass = document.getElementById('reEnterNewPass').value;
    let buttonChangePass = document.getElementById('changePassword');

    setTimeout(function () {
        let checkCurrentPass = document.getElementById('currentPassCheck').innerText;
        let checkNewPass = document.getElementById('passCheck').innerText;
        let checkReEnteredPass = document.getElementById('reEnterPassCheck').innerText;

        if (currentPass.length > 7 && validatePassword(currentPass) && checkCurrentPass === "Password is correct") {
            if (newPass.length > 7 && validatePassword(newPass) && checkNewPass === "") {
                if (reEnterPass.length > 7 && validatePassword(reEnterPass) && reEnterPass === newPass && checkReEnteredPass === "Passwords match") {
                    buttonChangePass.disabled = false;
                }else {
                    buttonChangePass.disabled = true;
                }
            }else {
                buttonChangePass.disabled = true;
            }
        }else {
            buttonChangePass.disabled = true;
        }
    },100);
}