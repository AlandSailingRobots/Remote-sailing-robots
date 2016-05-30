
submitAllForms = function(){
  var pw = document.password_form.password.value;
  console.log(pw);
  if(pw == "conny"){
    document.forms["buffer_config"].submit();
    document.forms["course_calculation_config"].submit();
    document.forms["maestro_controller_config"].submit();
    document.forms["rudder_command_config"].submit();
    document.forms["rudder_servo_config"].submit();
    document.forms["sail_command_config"].submit();
    document.forms["sail_servo_config"].submit();
    document.forms["sailing_robot_config"].submit();
    document.forms["waypoint_routing_config"].submit();
    document.forms["wind_vane_config"].submit();
    document.forms["windsensor_config"].submit();
    document.forms["xbee_config"].submit();
  }
  else {
    window.alert("Wrong pass !!! ");
  }
}
