<?php
  session_start();
  echo "Logout Successfully ";
  session_destroy();   // function that Destroys Session
//  header("Refresh:1; url=http://www.sailingrobots.com/testdata/config");
  echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
?>
