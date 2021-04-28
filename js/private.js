function validatePassword(password) {
    let regularExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$!%#*?&]{8,}$/;
    return regularExpression.test(password);
}

function checkPassword(password) {
    let passValue = password.value;
    let passCheck = document.getElementById('passCheck');

    if (passValue.length > 7){
        if (!validatePassword(passValue)) {
            passCheck.style.marginTop = "-22px";
            passCheck.style.marginBottom = "12px";
            passCheck.innerHTML = "Password must be a including number, Upper, Lower And one special character";
        } else if (validatePassword(passValue)) {
            passCheck.innerHTML = "";
            passCheck.style.margin = "0";
        }else{
            passCheck.innerHTML = "Please reload page.";
        }
    }else {
        passCheck.style.marginTop = "-22px";
        passCheck.style.marginBottom = "12px";
        passCheck.innerHTML = "Password must be a minimum of 8 characters";
    }
}
