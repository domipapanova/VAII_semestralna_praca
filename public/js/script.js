
    function validateReview() {
        let name = document.forms["review"]["meno"].value;
        let text = document.forms["review"]["text"].value;
        if(name == "" ) {
            alert("Povinny údaj - meno");
            return false;
        }

        if(name.length >  30) {
            alert("Presiahli ste maximálnu dĺžku mena");
            return false;
        }

        if(text == "" ) {
            alert("Povinny údaj - text");
            return false;
        }

        if(text.length >  30) {
            alert("Presiahli ste maximálnu dĺžku mena");
            return false;
        }

        if(text.length >  2000) {
            alert("Presiahli ste maximálnu kapacitu textu");
            return false;
        }

        return true;

    }

    function validateProduct() {
        let name = document.forms["newProduct"]["nazov"].value;
        let price = document.forms["newProduct"]["cena"].value;
        let text = document.forms["newProduct"]["popis"].value;
        if(name == "" ) {
            let warning = document.getElementById("nazov_input");
            warning.hidden = false;
            warning.style = "color:red";
            warning.innerText = "Prosím zadajte názov produktu";

            return false;
        }

        if(name.length >  50) {
            let warning = document.getElementById("nazov_input");
            warning.hidden = false;
            warning.style = "color:red";
            warning.innerText = "Presiahli ste maximálnu dĺžku názvu";
            return false;
        }


        if(text.length >  1000) {
            let warning = document.getElementById("popis_input");
            warning.hidden = false;
            warning.style = "color:red";
            warning.innerText = "Presiahli ste maximálnu dĺžku textu";
            return false;
        }


        if(price == "" ) {
            let warning = document.getElementById("cena_input");
            warning.hidden = false;
            warning.style = "color:red";
            warning.innerText = "Prosím zadajte cenu produktu";
            return false;
        }

        if(isNaN(price) || price < 0 || price >= 10000) {
            let warning = document.getElementById("cena_input");
            warning.hidden = false;
            warning.style = "color:red";
            warning.innerText = "Zlá hodnota alebo príliš veľká";
            return false;
        }

        return true;
    }
