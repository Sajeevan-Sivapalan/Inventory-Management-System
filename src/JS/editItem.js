function editItemValidation(thisform){
    with(thisform){
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

function productNameValidation(productName){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditItem){
       if(productName.value == ""){
        errormessage = "Product Name can not be empty";
        return false;
       }
       else
           return true;
    }
}

function unitsValidation(units){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditItem){
       if(units.value == ""){
        errormessage.innerHTML = "Units can not be empty";
        return false;
       }
       else
           if(units.value >= 500){
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
    var errormessage = document.getElementById("errormeg");
    with(document.formEditItem){
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
