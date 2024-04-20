//Name: Geetha Punukollu
//Date: April 19 2024
//Course/Section: IT-202-004
//Assignment Name: Phase 5
//Email: gbp@njit.edu

$(document).ready( () => {
    isValid = false;
    $("#delete_form").submit( event => {
        
        if(confirm("Are your sure?")) {
            isValid = true;
        } else {
            isValid = false;
        }
        alert(isValid);
        if(isValid == false) {
            alert('cancelled deletxxxe')
            event.preventDefault();
            alert('cancelled delete')
        }
    })

});