function productValidation(thisform){
    with(thisform){
        if(productIDValidation(productID) == false){
            productID.focus();
            return false;
        }
        if(productNameValidation(productName) == false){
            productName.focus();
            return false;
        }
        if(unitsValidation(units) == false){
            units.focus();
            return false;
        }
        if(pricePUValidation(pricePU) == false){
            pricePU.focus();
            return false;
        }
    }
}

function productIDValidation(productID){
    errormessage = document.getElementById("errormeg");
    with(document.formProductEdit){
        var pIDlenght = (productID.value).length;
        if(productID.value == ""){
            errormessage.innerHTML = " Product ID can not be empty";
            return false;
        }
        else
            if(pIDlenght < 5){
                errormessage.innerHTML = "Product ID length should be 5 dights";
                return false;
            }
            else
                return true;
    }
}

function productNameValidation(productName){
    errormessage = document.getElementById("errormeg");
    with(document.formProductEdit){
       if(productName.value == ""){
        errormessage.innerHTML = "Product Name can not be empty";
        return false;
       }
       else
           return true;
    }
}

function unitsValidation(units){
    errormessage = document.getElementById("errormeg");
    with(document.formProductEdit){
       if(units.value == ""){
        errormessage.innerHTML = "Units can not be empty";
        return false;
       }
       else
           if(units.value > 500){
               errormessage.innerHTML = "Units can not be over 500";
               return false;
           }
           else
               if(units.value <= 0){
                   errormessage.innerHTML = "Units can not be less than 0";
                   return false;
               }
               else
                    return true;
    }
}

function pricePUValidation(pricePU){
    errormessage = document.getElementById("errormeg");
    with(document.formProductEdit){
       if(pricePU.value == ""){
        errormessage.innerHTML = "Price per unit can not be empty";
        return false;
       } 
       else
           if(pricePU.value <= 0){
            errormessage.innerHTML = "Price per unit can not be less than 0";
            return false;
           }
           else
                return true;
    }
}
