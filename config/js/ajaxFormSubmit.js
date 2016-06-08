ajaxFormSubmit = function(formData){

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'updateDb.php', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'text', // what type of data do we expect back from the server
                   encode          : true,
           error: function(xhr, ajaxOptions, thrownError){
               //alert(thrownError);
           }
    })
        .done(function(data) {

            // log data to the console so we can see
            //console.log(data);
        });

}
