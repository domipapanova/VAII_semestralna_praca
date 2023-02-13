//---delete confirmation
function deleteConfrimation(article) {
    const id = article;
    document.getElementById('delete-confrim').style.display = 'block';

    // Get the modal
    let modal = document.getElementById('delete-confrim');

    modal.onsubmit = function () {
        fetch(`?c=blog&a=delete&id=${id}`, {
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
//validation
function validateArticle() {
    let img = document.forms["newArticle"]["article_picture"].value;
    let fileInput = document.getElementById("article_picture");

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



