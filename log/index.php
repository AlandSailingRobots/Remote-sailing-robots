<!DOCTYPE html>
<!--
  This site is used to display the datalogs from the db. when you click display all
  you will go to the info.php. The info that is displayed in info.php is a fulljoin
  from all datalogs for that row. You will also se a map with the boats possition
  and the route that the boat have sailed up to that point.
 -->
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log</title>

    <!-- Bootstrap core CSS -->
    <link href="Dashboard%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Dashboard%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Dashboard%20Template%20for%20Bootstrap_files/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Log</a>
          <a class="navbar-brand" href="http://sailingrobots.com/testdata/live/">Live</a>
          <a class="navbar-brand" href="http://sailingrobots.com/testdata/config/">Config</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">GpsData</a></li>
            <li><a href="course.php">CourseData</a></li>
            <li><a href="windsensor.php">WindSensorData</a></li>
            <li><a href="compass.php">CompassData</a></li>
            <li><a href="system.php">SystemDatalogs</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php
                require('dbconnection.php');
                $result = getData("gps_dataLogs");
                $pages = getPages("gps_dataLogs");
                $number = getNumber();
                $next = getNext();
                $prev = getPrev();
              ?>

            <li ><a href="index.php">GpsData </a></li>
            <li><a href="course.php">CourseData</a></li>
            <li><a href="windsensor.php">WindSensorData</a></li>
            <li><a href="compass.php">CompassData</a></li>
            <li><a href="system.php">SystemDatalogs</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Gps Logs</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <?php

              if($result && count($result) > 0)
              {
                echo "<h3>Total pages ($pages)</h3>";
                # first page
                if($number <= 1)
                  echo "<span>&laquo; prev</span> | <a href=\"?page=$next\">next &raquo;</a>";
                # last page
                elseif($number >= $pages)
                  echo "<a href=\"?page=$prev\">&laquo; prev</a> | <span>next &raquo;</span>";
                # in range
                else
                  echo "<a href=\"?page=$prev\">&laquo; prev</a> | <a href=\"?page=$next\">next &raquo;</a>";
              }

              else
              {
                echo "<p>No results found.</p>";
              }
              ?>
              <thead>
                <tr>
                  <th>id_gps</th>
                  <th>time</th>
                  <th>latitude</th>
                  <th>speed</th>
                  <th>heading</th>
                  <th>satellites_used</th>
                  <th>longitude</th>
                  <th>timestamp</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $i = 0;
                foreach($result as $key => $row)
                {
                  $i++;
                  echo "
                    <tr>
                      <td>".$row["id_gps"]."</td>
                      <td>".$row["time"]."</td>
                      <td>".$row["latitude"]."</td>
                      <td>".$row["speed"]."</td>
                      <td>".$row["heading"]."</td>
                      <td>".$row["satellites_used"]."</td>
                      <td>".$row["longitude"]."</td>
                      <td>".$row["Timestamp"]."</td>
                      <td><a href=info.php?number=$i&name=id_gps&table=gps_dataLogs&id=".$row["id_gps"]." target='_blank'>display all</a></td>
                      ";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Dashboard%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Dashboard%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


</body></html>
