
// return here when submit completes
// each form returns a certain number on submit
//


submitAllForms = function(){

  var formName = "";
  var countChanges = 0;

  for (index = 0; index < document.forms.length; ++index) {
      formName = "#" + document.forms[index].id;

      //Checks if any form fields have been updated (contains number)
      if (/\d/.test($(formName).serialize())){
          countChanges++;
      }

      if (formName != "#"){
          ajaxFormSubmit($(formName).serialize());
          // == makes calls like this:
          //   ajaxFormSubmit($("#buffer_config").serialize());
          console.log($(formName).serialize());
      }



    }
    console.log("Forms submitted");

    updateWaypoints();

    if(countChanges > 0){
        console.log(countChanges);
        setTimeout(function(){
              window.location.reload(1);
          }, 300);
    }else {
        setTimeout(function(){
            getWaypoints();
            alert("Waypoints updated!");
        }, 300);
    }




}
