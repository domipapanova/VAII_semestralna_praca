//registration input validation
function validateRegistration() {
    let firstName = document.forms["registrationForm"]["firstName"].value;
    let lastName = document.forms["registrationForm"]["lastName"].value;
    let login = document.forms["registrationForm"]["login"].value;
    let email = document.forms["registrationForm"]["email"].value;
    let phoneNum = document.forms["registrationForm"]["phoneNumber"].value;
    let hash = document.forms["registrationForm"]["password"].value;
    let hash_check = document.forms["registrationForm"]["password_check"].value;

    let valid = true;

    if((login === "" && email === "") && hash === "") {
        warning("main_output", "Prosím zadajte povinne udaje označené *");
        valid = false;
    } else {
        hideWarning("main_output");
    }

    if(login === "" ) {
        warning("login_input","Prosím zadajte váš login");
        valid = false;
    } else if (login.length >  30) {
        warning("login_input","Presiahli ste maximálnu dĺžku loginu");
        valid = false;
    } else if(checkLogin(login)){
        hideWarning("login_input");
    }

    if(email === "" ) {
        warning("email_input","Prosím zadajte váš email");
        valid = false;
    } else if (validateEmail(email) === false) {
        warning("email_input","Nesprávny formát emailu");
        valid = false;
    } else if(email.length >  255) {
        warning("email_input", "Presiahli ste maximálnu dĺžku emailu");
        valid = false;
    } else if(checkEmail(email)) {
        hideWarning("email_input");
    }

    if(hash === "" ) {
        warning("pswd_input","Prosím zadajte váše heslo" );
        valid = false;
    } else if(!validatePassword(hash)) {
        warning("pswd_input","Heslo musí mať aspon 8 znakov a musí obsahovať 1 male písmeno, 1 veľké písmeno a číslicu");
        valid = false;
    } else  if(hash.length >  30) {
        warning("pswd_input","Presiahli ste maximálnu dĺžku hesla" );
        valid = false;
    } else {
        hideWarning("pswd_input");
    }

    if( hash_check === "" ) {
        warning("pswd_check_input","Prosím zadajte kontrolu vášho hesla ");
        valid = false;
    } else if (hash !== hash_check ) {
        warning("pswd_check_input","Heslá sa nezhodujú" );
        valid = false;
    } else {
        hideWarning("pswd_check_input");
    }

    if(firstName.length !== 0 && firstName.length >  50) {
        warning("firstName_input", "Presiahli ste maximálnu dĺžku mena");
        valid = false;
    } else {
        hideWarning("firstName_input");
    }

    if(lastName.length !== 0 &&  lastName.length >  50) {
         warning("lastName_input","Presiahli ste maximálnu dĺžku priezviska" );
         valid = false;
    } else {
        hideWarning("lastName_input");
    }

     if(phoneNum.length !== 0 && validatePhoneNumber(phoneNum) === false) {
         valid = false;
     } else if(phoneNum.length !== 0 && phoneNum.length !==  13) {
         warning("phone_input","Zadali ste nespravnu dĺžku telefónneho čísla" );
         valid = false;
     } else {
         hideWarning("phone_input");
     }

    return valid;
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
    if (format.test(phonenum) === true) {
        return true;

    } else {
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

async function checkLogin(login_par) {

        const response = await fetch('?c=user&a=getUsers');
        const users = await response.json();
        const foundLogins = users.filter(x => x.login === login_par);

        if (foundLogins.length !== 0) {
            warning("login_input", "Login už je obsadený");
            return false;
        }
        return true;
}

 async function checkEmail(email_par) {

     const response = await fetch('?c=user&a=getUsers');
     const users = await response.json();
     const foundLogins = users.filter(x => x.email === email_par);

     if (foundLogins.length !== 0) {
         warning("email_input", "Email už je obsadený");
         return false;
     }
     return true;
 }

