$(document).ready(function(){

    $("#category_create").validate({
        rules: {
            name: "required",
            
        },
        errorElement: 'span',
        messages: {
            
            name: {
                required: "Please enter a category Name",
               
            },
           
        }
    });
});