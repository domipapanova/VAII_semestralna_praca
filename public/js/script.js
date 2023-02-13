/* navbar */
function screen_resize() {
    var w = parseInt(window.innerWidth);
    var x = document.getElementById("myLinks");
    if(w > 576) {
        x.style.display = "flex"; /* vedla seba linky*/
    }  else {
        x.style.display = "none"; /* schovaju sa linky*/
    }

}

/* clicking on hamburger showing links*/
function myFunction() {
    var x = document.getElementById("myLinks"); /* ziskam podla id  MyLinks*/
    if (x.style.display === "block") {  /*schovas ponuku*/
        x.style.display = "none";
    } else {
        x.style.display = "block"; /*zobrazit ponuku*/
    }
}

// showing hidden password - login
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
// showing warning during validation
function warning(input, text) {
    let warning = document.getElementById(input);
    warning.hidden = false;
    warning.style = "color:red";
    warning.innerText = text;
}

function hideWarning(input) {
    let warning = document.getElementById(input);
    warning.hidden = true;
}