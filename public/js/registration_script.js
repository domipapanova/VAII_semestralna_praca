function validateRegistration() {
    let firstName = document.forms["registrationForm"]["firstName"].value;
    let lastName = document.forms["registrationForm"]["lastName"].value;
    let login = document.forms["registrationForm"]["login"].value;
    let email = document.forms["registrationForm"]["email"].value;
    let phoneNum = document.forms["registrationForm"]["phoneNumber"].value;
    let hash = document.forms["registrationForm"]["password"].value;
    let hash_check = document.forms["registrationForm"]["password_check"].value;


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
    } else if(!validatePassword(hash)) {
        warning("pswd_input","Heslo musí mať aspon 8 znakov a musí obsahovať 1 male písmeno, 1 veľké písmeno a číslicu");
        return false;
    } else {
        hideWarning("pswd_input");
    }

    if( hash_check === "" ) {
        warning("pswd_check_input","Prosím zadajte kontrolu vášho hesla\" ");
        return false;
    } else if(hash !== hash_check ) {
        warning("pswd_check_input","Heslá sa nezhodujú" );
        return false;
    } else {
        hideWarning("pswd_check_input");
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

function validatePassword(password) {
    let hasLowercase = false;
    let hasUppercase = false;
    let hasDigit = false;

    if (password.length >= 8) {
        for (let i = 0; i < password.length; i++) {
            let char = password[i];
            if (char >= 'a' && char <= 'z') {
                hasLowercase = true;
            } else if (char >= 'A' && char <= 'Z') {
                hasUppercase = true;
            } else if (char >= '0' && char <= '9') {
                hasDigit = true;
            }
        }
    }
    return hasLowercase && hasUppercase && hasDigit;
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