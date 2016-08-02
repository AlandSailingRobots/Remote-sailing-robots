/****************************************************************************************
 *
 * Purpose:
 *      Serializes all forms on the page and submits them to the database using ajaxFormsubmit.
 *      Can probably be ported to some library and reused.
 *
 *
 * Developer Notes:
 *
 *
 ***************************************************************************************/


submitAllForms = function(){

  var formName = "";
  //Changes in form fields counter (unimplemented; some fields take non-number data :( )
  var countChanges = 1;

  for (index = 0; index < document.forms.length; ++index) {
      formName = "#" + document.forms[index].id;

      if (formName != "#"){
          //Checks if any form fields have been updated (contains number)
        //   if (/\d/.test($(formName).serialize())){
        //       countChanges++;
        //   }

          ajaxFormSubmit($(formName).serialize());
          // == makes calls like this:
          //   ajaxFormSubmit($("#buffer_config").serialize());
          console.log($(formName).serialize());
      }



    }
    console.log("Forms submitted");

    refreshWhenReady();
}
