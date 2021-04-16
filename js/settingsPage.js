let script = document.createElement('script');
script.src = '../bootstrap/js/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


function changeUserType(sel) {
    let childItems = document.getElementById("child");
    let childsFName = document.getElementById("childsFName");
    let childsLName = document.getElementById("childsLName");
    let selectSubject = document.getElementById("selectSubject");
    let childsPassword = document.getElementById("childsPassword");

    
    if (sel.options[sel.selectedIndex].text === "Parent"){
        childItems.style.display = "block";
        childsFName.required = true;
        childsLName.required = true;
        selectSubject.required = true;
        childsPassword.required = true;
    }else {
        childItems.style.display = "none";
        childsFName.required = false;
        childsLName.required = false;
        selectSubject.required = false;
        childsPassword.required = false;
    }
}