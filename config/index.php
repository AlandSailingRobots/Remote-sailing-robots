<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <script type="text/javascript" src="js/formGatherer.js"></script>

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
        </div><!--/.nav-collapse -->

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
          require('getConfigs/get_course_calculation_config.php');
         ?>
        <?php
          require('getConfigs/get_maestro_controller_config.php');
        ?>
        <?php
          require('getConfigs/get_rudder_command_config.php');
        ?>
      </div>

      <div class="row">
        <?php
          require('getConfigs/get_rudder_servo_config.php');
        ?>
        <?php
          require('getConfigs/get_sailing_robot_config.php');
        ?>
        <?php
          require('getConfigs/get_sail_command_config.php');
        ?>
      </div>

      <div class="row">
        <?php
          require('getConfigs/get_sail_servo_config.php');
        ?>
        <?php
          require('getConfigs/get_waypoint_routing_config.php');
        ?>
        <?php
          require('getConfigs/get_windsensor_config.php');
        ?>
      </div>

      <div class="row">
        <?php
          require('getConfigs/get_wind_vane_config.php');
        ?>
        <?php
          require('getConfigs/get_xbee_config.php');
        ?>
      </div>
      <br>
      <div class="row">
        <input type='button' value='Just do it!' class='btn btn-success col-md-2' onclick='submitForms()'/>
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

</body></html>
