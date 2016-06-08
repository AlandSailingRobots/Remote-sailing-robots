
// return here when submit completes
// each form returns a certain number on submit
//


submitAllForms = function(){

  var formName = "";

  for (index = 0; index < document.forms.length; ++index) {
      formName = "#" + document.forms[index].id;
      ajaxFormSubmit($(formName).serialize());
      // == makes calls like this:
      //   ajaxFormSubmit($("#buffer_config").serialize());
    }

  setTimeout(function(){
          window.location.reload(1);
      }, 300);

}
