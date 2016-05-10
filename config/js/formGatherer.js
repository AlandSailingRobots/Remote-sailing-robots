submitForms = function(){
    document.forms["course_calculation_form"].submit();
    document.forms["maestro_controller_form"].submit();
    document.forms["rudder_command_config_form"].submit();
    document.forms["rudder_servo_config_form"].submit();
    document.forms["sail_command_config_form"].submit();
    document.forms["sail_servo_config_form"].submit();
    document.forms["sailing_robot_config_form"].submit();
    document.forms["waypoint_routing_form"].submit();
    document.forms["wind_vane_config_form"].submit();
    document.forms["windsensor_config_form"].submit();
    document.forms["xbee_config_form"].submit();
    //window.location = "http://localhost/Remote-sailing-robots/config/";
    location.reload();

}
