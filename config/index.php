<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php require('configurationData.php');
      require('printTables.php');
?>
  <script type="text/javascript" src="js/activateForms.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://image.freepik.com/free-icon/sailing-boat_318-54194.png">

    <title>Config</title>

    <!-- Bootstrap core CSS -->
    <link href="Starter%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Starter%20Template%20for%20Bootstrap_files/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Starter%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://sailingrobots.ax/">Sailing Robots</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="http://www.sailingrobots.com/testdata/live/">Live</a></li>
            <li class="active"><a href="http://www.sailingrobots.com/testdata/config">Config</a></li>
            <li ><a href="http://www.sailingrobots.com/testdata/log/">Log</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <div class="jumbotron">
        <h1>Configuration page</h1>
          <p>On this side you can see and update the configurations for Aland Sailing Robots.</p>
        </div>
        <br><br><br>

      <div class="row">
        <?php
          $bufferConfigArray = getConfigData("buffer_config");
          $courseCalculationConfigArray = getConfigData("course_calculation_config");
          $maestroControllerConfigArray = getConfigData("maestro_controller_config");
          $rudderCommandConfigArray = getConfigData("rudder_command_config");
          $rudderServoConfigArray = getConfigData("rudder_servo_config");
          $sailCommandConfigArray = getConfigData("sail_command_config");
          $sailServoConfigArray = getConfigData("sail_servo_config");
          $sailingRobotConfigArray = getConfigData("sailing_robot_config");
          $waypointRoutingConfigArray = getConfigData("waypoint_routing_config");
          $windVaneConfigArray = getConfigData("wind_vane_config");
          $windsensorConfigArray = getConfigData("windsensor_config");
          $xbeeConfigArray = getConfigData("xbee_config");
        ?>
    <div class="row">
        <?php
            printTables($bufferConfigArray, "buffer_config");
            printTables($courseCalculationConfigArray, "course_calculation_config");
            printTables($maestroControllerConfigArray, "maestro_controller_config");
        ?>
    </div>
    <div class="row">
        <?php
            printTables($rudderCommandConfigArray, "rudder_command_config");
            printTables($rudderServoConfigArray, "rudder_servo_config");
            printTables($sailCommandConfigArray, "sail_command_config");
        ?>
    </div>
    <div class="row">
        <?php
            printTables($sailServoConfigArray, "sail_servo_config");
            printTables($sailingRobotConfigArray, "sailing_robot_config");
            printTables($waypointRoutingConfigArray, "waypoint_routing_config");
        ?>
    </div>
    <div class="row">
        <?php
            printTables($windVaneConfigArray, "wind_vane_config");
            printTables($windsensorConfigArray, "windsensor_config");
            printTables($xbeeConfigArray, "xbee_config");
        ?>
    </div>
      <br>
    <div class="col-md-2">
      <form method="POST" name="password_form">
       <td>Password:</td>
       <td><input type='password' class='form-control' name="password" size='1'></td>
      </form>
      <input type='button' value='Submit' class='btn btn-success col-md-12' onclick='submitAllForms()'/>
      <br>
    </div>
        </div>
        <footer>
        <p>© 2016 Åland Sailing Robots</p>
        <br><br>
      </footer>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Starter%20Template%20for%20Bootstrap_files/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Starter%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
