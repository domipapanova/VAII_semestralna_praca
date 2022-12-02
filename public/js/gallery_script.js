window.onload = function () {
    let buttons = document.querySelectorAll(".btn-outline-success");
    for (let i = 0; i < buttons.length; i++) {
        let button = buttons[i];
        button.onclick = function () {
            let p = button.nextElementSibling;
            if (p.style.display == "none") {
                p.style.display = "inline";
                button.innerText= "Zavriet";
            } else {
                p.style.display = "none"
                button.innerText= "Viac info"
            }
        }
    }
}

// Get the modal
let modal = document.getElementById('delete-confrim');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}