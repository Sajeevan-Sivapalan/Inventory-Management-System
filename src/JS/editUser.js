function editUserValidation(thisform){
    with(thisform){
        if(fnameValidation(fname) == false){
            fname.focus();
            return false;
        }
        if(lnameValidation(lname) == false){
            lname.focus();
            return false;
        }
        if(passwordValidation(password) == false){
            password.focus();
            return false;
        }

        if(repasswordValidation(repassword) == false){
            repassword.focus();
            return false;
        }
    }
}

function fnameValidation(fname){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditUser){
        if(fname.value == ""){
            errormessage.innerHTML = "First name cannot be empty";
            return false
        }
        else
            return true;
    }
}

function lnameValidation(lname){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditUser){
        if(lname.value == ""){
            errormessage.innerHTML = "Last name cannot be empty";
            return false
        }
        else
            return true;
    }
}

function passwordValidation(password){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditUser){
        var passwordLength = (password.value).length;
        if(password.value == ""){
            errormessage.innerHTML = "Password cannot be empty";
            return false
        }
        else
            if(passwordLength < 10){
                errormessage.innerHTML = "Minimum password length is 10";
                password.value = "";
                return false;
            }
            else
                return true;
    }
}

function repasswordValidation(repassword){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditUser){
        if(repassword.value == ""){
            errormessage.innerHTML = "Re-Password cannot be empty";
            return false;
        }
        else
            if(password.value != repassword.value){
                errormessage.innerHTML = "Password missmatched";
                repassword.value = "";
                return false;
            }
            else
                return true;
    }
}