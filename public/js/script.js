
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
        let img = document.forms["newProduct"]["obrazok"].value;
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



        function validateRegistration() {
        let firstName = document.forms["registrationForm"]["firstName"].value;
        let lastName = document.forms["registrationForm"]["lastName"].value;
        let login = document.forms["registrationForm"]["login"].value;
        let email = document.forms["registrationForm"]["email"].value;
        let phoneNum = document.forms["registrationForm"]["phoneNumber"].value;
        let hash = document.forms["registrationForm"]["password"].value;

        if((login === "" && email === "") && hash === "") {
            let warning = document.getElementById("main_output");
            warning.hidden = false;
            warning.style = "color:red";
            warning.innerText = "Prosím zadajte váš povinne udaje";
            return false;
        }

        if(login === "" ) {
        let warning = document.getElementById("login_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Prosím zadajte váš login";

        return false;
    }

        if(email === "" ) {
        let warning = document.getElementById("email_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Prosím zadajte váš email";

        return false;
    }

        if(hash === "" ) {
        let warning = document.getElementById("pswd_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Prosím zadajte váše heslo";

        return false;
    }

        if(login.length >  30) {
        let warning = document.getElementById("login_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Presiahli ste maximálnu dĺžku loginu";
        return false;
    }


        if(email.length >  255) {
        let warning = document.getElementById("email_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Presiahli ste maximálnu dĺžku emailu";
        return false;
    }

        if(hash.length >  30) {
        let warning = document.getElementById("pswd_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Presiahli ste maximálnu dĺžku hesla";
        return false;
    }

        if(firstName.length >  50) {
        let warning = document.getElementById("firstName_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Presiahli ste maximálnu dĺžku mena";
        return false;
    }

        if(lastName.length >  50) {
        let warning = document.getElementById("lastName_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Presiahli ste maximálnu dĺžku priezviska";
        return false;
    }

        if(phoneNum.length >  13) {
        let warning = document.getElementById("phone_input");
        warning.hidden = false;
        warning.style = "color:red";
        warning.innerText = "Presiahli ste maximálnu dĺžku telefónneho čísla";
        return false;
    }
        return true;
    }


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




