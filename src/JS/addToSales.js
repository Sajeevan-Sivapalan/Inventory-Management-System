function addToSalesValidation(thisform){
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
    with(document.addToSalesForm){
        if(date.value == ""){
            errormessage.innerHTML = "Date can not be empty";
            return false;
        }
        else   
            return true;        
    }
    
}

function productIDValidation(productID){
    var errormessage = document.getElementById("errormeg");
    with(document.addToSalesForm){
        var proIDLength = (productID.value).length;
        if(productID.value == ""){
            errormessage.innerHTML = "Product ID can not be empty";
            return false;
        }
        else
            if(proIDLength < 5){
                errormessage.innerHTML = "Product ID length should be 5 dights";
                return false;
            }
            else
                return true;
    }
}

function qtyValidation(qty){
    var errormessage = document.getElementById("errormeg");
    with(document.addToSalesForm){
        var qtyLength = (qty.value).length;
        if(qty.value == ""){
            errormessage.innerHTML = "Quantity can not be empty";
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
                return true;
    }
}