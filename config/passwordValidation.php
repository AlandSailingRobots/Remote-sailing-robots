<?php
    session_start();
    $pass = $_POST["password"];
    $password_hash = "coygcXkjUzeAY";
    if(crypt($pass, $password_hash) == $password_hash) {
        $_SESSION['use']="true";
        //header("Refresh:0; url=http://www.sailingrobots.com/testdata/config/mainPage.php");
        echo '<script type="text/javascript"> window.open("mainPage.php","_self");</script>';
    }else{
      echo "Invalid password...";
      echo '<script type="text/javascript"> window.open("index.php","_self");</script>';
      //header("Refresh:1; url=http://www.sailingrobots.com/testdata/config");
    }

?>
