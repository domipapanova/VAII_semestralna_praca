// button "viac info" showing describtion
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
//---delete confirmation, showing modal
function deleteConfrimation(product) {
    const id = product;
    document.getElementById('delete-confrim').style.display = 'block';

    // Get the modal
    let modal = document.getElementById('delete-confrim');
    modal.onsubmit = function () {
        fetch(`?c=gallery&a=delete&id=${id}`, {
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

// live search
async function showResult(str) {

    let response;
    //getting data from database
    response = await fetch("?c=gallery&a=getProducts");

    const products = await response.json();
    //filtration - if data contains "string"
    const findedProducts = products.filter(x => x.product_name.toLowerCase().includes(str.toLowerCase()));

    document.getElementById('gallery-body').innerHTML = '';

    //new filtred output
    for (const x of findedProducts) {
        const newCol = document.createElement('div');
        newCol.classList.add('col');

        newCol.innerHTML =
            `<div class="card shadow-sm">
                     <img src="./public/images/${x.picture_name}" alt="product image">

                     <div class="card-body">
                         <h5>${x.product_name}</h5>
                            <button type="button"  class="btn btn-outline-success" >Viac info</button>
                            <p class="card-infoProduct" id="infoProduct" >${x.description}</p>
                         <div class=" d-flex justify-coclassName-between align-items-center">
                            <small class=" text-muted">${x.price}€</small>
                         </div>
                     </div>
             </div> `;

            document.getElementById('gallery-body').appendChild(newCol);
    }
}

//create new product - validation
function validateProduct() {
    let name = document.forms["newProduct"]["nazov"].value;
    let price = document.forms["newProduct"]["cena"].value;
    let text = document.forms["newProduct"]["popis"].value;
    let img = document.forms["newProduct"]["picture"].value;
    let fileInput = document.getElementById("picture");

    if(name === "" ) {
        warning("nazov_input", "Prosím zadajte názov produktu");
        return false;
    } else {
        warning("nazov_input", "");
    }

    if(name.length >  50) {
        warning("nazov_input","Presiahli ste maximálnu dĺžku názvu")
        return false;
    } else {
        warning("nazov_input","")

    }

    if(text.length >  1000) {
        warning("popis_input","Presiahli ste maximálnu dĺžku textu");
        return false;
    } else {
        warning("popis_input","");

    }

    if(price === "" ) {
        warning("cena_input","Prosím zadajte cenu produktu")
        return false;
    } else {
        warning("cena_input","");
    }

    if(isNaN(price) || price < 0 || price >= 10000) {
        warning("cena_input","Zlá hodnota alebo príliš veľká");
        return false;
    } else {
        warning("cena_input","");
    }

    let allowedTypes = ["image/jpeg", "image/png", "image/webp"];
    if (img !== "") {
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


