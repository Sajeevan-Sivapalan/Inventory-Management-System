function conformation(){
    var result = confirm("Do you want to delete ?");
    if(result == false)
        event.preventDefault();
}