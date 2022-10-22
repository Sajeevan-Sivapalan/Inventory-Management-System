function EditSalesValidation(thisform){
    with(thisform){
        if(datesValidation(dates) == false){
            dates.focus();
            return false;
        }
        if(qtyValidation(qty) == false){
            qty.focus();
            return false;
        }
    }
}

function datesValidation(dates){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditSales){
        if(dates.value == ""){
            errormessage.innerHTML = "dates can not be empty";
            return false;
        }
        else 
            return true;
    }
}

function qtyValidation(qty){
    var errormessage = document.getElementById("errormeg");
    with(document.formEditSales){
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