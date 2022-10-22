function addToPurchaseFormValidation(thisform){
    with(thisform){
        if(dateValidation(date) == false){
            date.focus();
            return false;
        }
        if(productIDValidation(productID) == false){
            productID.focus();
            return false;
        }
        if(qtyValidation(qty) == false){
            qty.focus();
            return false;
        }
    }
}

function dateValidation(date){
    var errormessage = document.getElementById("errormeg");
    with(document.addToPurchaseForm){
        if(date.value == ""){
            errormessage.innerHTML = "date can not be empty";
            return false;
        }
        else
            return true;
    }
}
function productIDValidation(productID){
    var errormessage = document.getElementById("errormeg");
    with(document.addToPurchaseForm){
        var productIdLength = (productID.value).length;
        if(productID.value == ""){
            errormessage.innerHTML = "productID can not be empty";
            return false;
        }
        else 
            if(productIdLength < 5){
                errormessage.innerHTML = "PRODUCT ID LENGTH SHOULD BE 5 DIGHTS";
                return false;
            }
            else
                return true;
    }
}
function qtyValidation(qty){
    var errormessage = document.getElementById("errormeg");
    with(document.addToPurchaseForm){
        if(qty.value == ""){
            errormessage.innerHTML = "qty can not be empty";
            return false;
        }
        else
            if(qty.value >= 500){
                errormessage.innerHTML = "Quantity can not be over 500";
                return false;
            }
            else   
                if(qty.value <= 0){
                    errormessage.innerHTML = "Quantity can not be less than 0";
                    return false;
                }
                else
                    return true;
    }
}