let script = document.createElement('script');
script.src = '../bootstrap/js/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


function changeUserType(sel) {
    let childItems = document.getElementById("child");
    
    if (sel.options[sel.selectedIndex].text === "Parent"){
        childItems.innerHTML = ``
    }else {
        childItems.innerHTML = "";
    }
}