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

/* block  zjavia sa pod sebou linky*/
function myFunction() {
    var x = document.getElementById("myLinks"); /* ziskam podla id  MyLinks*/
    if (x.style.display === "block") {  /*schovas ponuku*/
        x.style.display = "none";

    } else {
        x.style.display = "block"; /*zobrazit ponuku*/
    }
}

function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


