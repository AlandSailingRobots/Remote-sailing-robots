


<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" href="https://image.freepik.com/free-icon/sailing-boat_318-54194.png">

    <title>Åland Sailing Robots</title>

    <!-- Bootstrap core CSS -->
    <link href="Carousel%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Carousel%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Carousel%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="Carousel%20Template%20for%20Bootstrap_files/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
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
            <li class="active"><a href="http://localhost/Remote-sailing-robots/live">Live</a></li>
            <li ><a href="http://localhost/Remote-sailing-robots/config">config</a></li>
            <li ><a href="http://www.sailingrobots.com/testdata/log/">Log</a></li>
          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Carousel%20Template%20for%20Bootstrap_files/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Carousel%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="Carousel%20Template%20for%20Bootstrap_files/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Carousel%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


<svg style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;" preserveAspectRatio="none" viewBox="0 0 500 500" height="500" width="500"><defs><style type="text/css"></style></defs><text style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif" y="25" x="0">500x500</text></svg></body></html>


<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>







<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


      <!-- START THE FEATURETTES -->


      <br><br><br><br><br>

      <div class="row featurette">

        <div class="col-md-4">
          <div id='boatData'>
      <div id='boatDataSystem'>
        <h2>SystemDataLogs</h2>
        <div id='dataNamesSystem'></div>
        <div id='dataValuesSystem'></div>
      </div>
      <div id='boatDataCompass' >
        <h2>CompassData</h2>
        <div id='dataNamesCompass'></div>
        <div id='dataValuesCompass'></div>
      </div>
      <div id='boatDataCourse' >
          <h2>CourseData</h2>
          <div id='dataNamesCourse'></div>
          <div id='dataValuesCourse'></div>
        </div>
    </div>
        </div>



      <div class="col-md-3">
        <div id='boatData'>
  			<div id='boatDataGps'>
  				<h2>Gps Data</h2>
  				<div id='dataNameGps' ></div>
  				<div id='dataValueGps'></div>
  			</div>

			 <div id='boatDataWindSensor' >
				  <h2>WindSensorData</h2>
				  <div id='dataNamesWindSensor'></div>
				  <div id='dataValuesWindSensor'></div>
			 </div>
		   </div>
       <br><br><br><br>
      </div>
      <br>

        <div class="col-md-5">

      <div id='mapbtn'>
				<input type="button" class="btn btn-success" value="maps/boat" onclick="hideShowMapBoat()" />
			</div>


			<div id='boatCanvas'>
				<canvas width='900px' height='900px' id='pingCanvas' ></canvas>
				<canvas width='900px' height='900px' id='layerCanvas'></canvas>
				<canvas width='900px' height='900px' id='layerHeading'></canvas>
				<canvas width='900px' height='900px' id='layerTWD'></canvas>
				<canvas width='900px' height='900px' id='layerWaypoint'></canvas>
				<canvas width='900px' height='900px' id='layerCompasHeading'></canvas>
				<canvas width='900px' height='900px' id='layerBoatHeading'></canvas>
			</div>
			<div id='map'></div>
      </div>
      </div>

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <br><br><br><br>


    </div><!-- /.container -->
