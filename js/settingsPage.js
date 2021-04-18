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

    function childsSectionShowHide(requiredBool, displayStyle){
        childItems.style.display = `${displayStyle}`;
        childsFName.required = requiredBool;
        childsLName.required = requiredBool;
        selectSubject.required = requiredBool;
        childsPassword.required = requiredBool;
    }

    
    if (sel.options[sel.selectedIndex].text === "Parent"){
        childsSectionShowHide(true, "block")
    }else {
        childsSectionShowHide(false, "none")
    }
}