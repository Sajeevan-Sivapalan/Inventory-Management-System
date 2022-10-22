function inputValidation(thisform){
    with(thisform){
        if(userIDValidation(uid) == false){
            uid.focus();
            return false;
        }
        if(passwordValidation(password) == false){
            password.focus();
            return false;
        }
    }
}

function userIDValidation(uid){
    var errormessage = document.getElementById("errormeg");
    with(document.formLogin){
        var uidLength = (uid.value).length;
        if(uid.value == ""){
            errormessage.innerHTML = "User ID cannot be empty";
            return false;
        }
        else
            if(uidLength != 5){
                errormessage.innerHTML = "User ID length should be 5 dights";
                return false;
            }
            else
                    return true;
    }
}

function passwordValidation(password){
    var errormessage = document.getElementById("errormeg");
    with(document.formLogin){
        var passwordLength = (password.value).length;
        if(password.value == ""){
            errormessage.innerHTML = "Password cannot be empty";
            return false;
        }
        else
            if(passwordLength <= 9){
                errormessage.innerHTML = "Minimum password length is 10";
                password.value = "";
                return false;
            }
            else
                return true;
    }
}