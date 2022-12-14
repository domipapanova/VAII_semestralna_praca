
    function validateReview() {
        let result = true;
        let name = document.forms["review"]["meno"].value;
        let text = document.forms["review"]["text"].value;
        if(name == "" ) {
            warning("title_input","Povinny údaj");
            return false;
        }

        if(text == "" ) {
            warning("review_input","Povinny údaj");
            return false;
        }

        if(name.length >  30) {
            warning("title_input","Presiahli ste maximálnu dĺžku mena");
            return false;
        }

        if(text.length >  2000) {
            warning("review_input","Presiahli ste maximálnu kapacitu textu");
            return false;
        }

        return result;
    }

    function validateProduct() {
        let name = document.forms["newProduct"]["nazov"].value;
        let price = document.forms["newProduct"]["cena"].value;
        let text = document.forms["newProduct"]["popis"].value;
        let img = document.forms["newProduct"]["obrazok"].value;
        if(name === "" ) {
            warning("nazov_input", "Prosím zadajte názov produktu");
            return false;
        }

        if(name.length >  50) {
            warning("nazov_input","Presiahli ste maximálnu dĺžku názvu")
            return false;
        }


        if(text.length >  1000) {
            warning("popis_input","Presiahli ste maximálnu dĺžku textu");
            return false;
        }


        if(price === "" ) {
            warning("cena_input","Prosím zadajte cenu produktu")
            return false;
        }

        if(isNaN(price) || price < 0 || price >= 10000) {
            warning("cena_input","Zlá hodnota alebo príliš veľká");
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
            warning("main_output", "Prosím zadajte povinne udaje označené *");
            return false;
        } else {
            hideWarning("main_output");
        }

        if(login === "" ) {
            warning("login_input","Prosím zadajte váš login")
            return false;
        } else {
            hideWarning("login_input");
        }

        if(email === "" ) {
            warning("email_input","Prosím zadajte váš email");
            return false;
        } else {
            hideWarning("email_input");
        }

        if (validateEmail(email) === false) {
            return false;
        } else {
            hideWarning("email_input");
        }


        if(hash === "" ) {
            warning("pswd_input","Prosím zadajte váše heslo" );
            return false;
        } else {
            hideWarning("pswd_input");
        }

        if(login.length >  30) {
            warning("login_input","Presiahli ste maximálnu dĺžku loginu");
            return false;
        }


        if(email.length >  255) {
            warning("email_input", "Presiahli ste maximálnu dĺžku emailu");
             return false;
        }

        if(hash.length >  30) {
            warning("pswd_input","Presiahli ste maximálnu dĺžku hesla" );
            return false;
        }

        if(firstName.length >  50) {
            warning("firstName_input", "Presiahli ste maximálnu dĺžku mena");
           return false;
        }

        if(lastName.length >  50) {
            warning("lastName_input","Presiahli ste maximálnu dĺžku priezviska" );
         return false;
        }
        if(phoneNum.length != "" && validatePhoneNumber(phoneNum) === false) {
            return false;
        }
        if(phoneNum.length != "" && phoneNum.length !=  13) {
            warning("phone_input","Zadali ste nespravnu dĺžku telefónneho čísla" );
            return false;
        }
        return true;
    }

    function validateEmail(email) {
        let format = /^\S+@\S+.\S+$/;
            if (format.test(email)===true) {
            return true;
        } else {
            warning("email_input", "Zadali ste email v nespravnom formate");
            return false;
        }
    }

    function validatePhoneNumber(phonenum)
    {
        let format = /^\+421[0-9]{9}$/;
        if(format.test(phonenum) === true)
        {
            return true;
        }
        else
        {
            warning("phone_input", "Zadali ste telefonne cislo v nespravnom formate");
            return false;
        }
    }

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







