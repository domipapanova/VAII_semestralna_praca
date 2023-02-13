function deleteConfrimation(product) {
    const id = product;
    document.getElementById('delete-confrim').style.display = 'block';

    // Get the modal
    let modal = document.getElementById('delete-confrim');
    modal.onsubmit = function () {
        fetch(`?c=pot&a=delete&id=${id}`, {
            method: 'DELETE'
        })
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
}
//viac info
window.onload = function () {
    let buttons = document.querySelectorAll(".btn-outline-success");
    for (let i = 0; i < buttons.length; i++) {
        let button = buttons[i];
        button.addEventListener('click', function () {
            let p = button.nextElementSibling;
            if (p.style.display === "none") {
                p.style.display = "inline";
                button.innerText = "Zavriet";
            } else {
                p.style.display = "none"
                button.innerText = "Viac info"
            }
        })
    }
}
//validation
function validatePot() {
    let img = document.forms["newPot"]["pot_picture"].value;
    let fileInput = document.getElementById("pot_picture");

    let allowedTypes = ["image/jpeg", "image/png", "image/webp"];
    if (img != "") {
        var file = fileInput.files[0];

        if( !allowedTypes.includes(file.type)) {
            warning("picture_input", "Nesprávny formát, povolené sú JPEG, WEBP alebo PNG");
            return false;
        } else  if (file.size > 2097152) {
            warning("picture_input", "Veľkosť obrázka musí byť menšia než 2 MB");
            return false;
        } else {
            warning("picture_input","");
        }
    } else {
        warning("picture_input","");
    }
    return true;
}