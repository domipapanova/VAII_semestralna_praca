//---"viac info"
    function buttonClick() {
        let buttons = document.querySelectorAll(".btn-outline-success");
        for (let i = 0; i < buttons.length; i++) {
            let button = buttons[i];
            button.onclick = function () {
                let p = button.nextElementSibling;
                if (p.style.display === "none") {
                    p.style.display = "inline";
                    button.innerText = "Zavriet";
                } else {
                    p.style.display = "none"
                    button.innerText = "Viac info"
                }
            }
        }
    }

 //---delete confirmation
// Get the modal
    let modal = document.getElementById('delete-confrim');

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

// ---------live search
    async function showResult(str) {

         let response;
         //getting data from database
         response = await fetch("?c=gallery&a=getProducts");

         const products = await response.json();
         //filtration - if data contains "string"
         const findedProducts = products.filter(x => x.product_name.toLowerCase().includes(str.toLowerCase()));

         document.getElementById('gallery-body').innerHTML = '';

            for (const x of findedProducts) {
                const newCol = document.createElement('div');
                newCol.classList.add('col');

                newCol.innerHTML =
                    `<div class="card shadow-sm">
                      <img src="./public/images/${x.picture_name}" alt="product image">

                      <div class="card-body">
                          <h5 clas="card-title">${x.product_name}</h5>
                            <button type="button" id="buttonInfo" class="btn btn-outline-success" onclick="buttonClick()">Viac info</button>
                              <p class="card-infoProduct" id="infoProduct" >${x.description}</p>
                          <div class=" d-flex justify-coclassName-between align-items-center">
                                  <small class=" text-muted">${x.price}€</small>
                          </div>
                      </div>
                  </div> `

                document.getElementById('gallery-body').appendChild(newCol);
            }


    }


