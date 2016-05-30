<?php
  function checkPass($pass){
    $pass = $_POST["password"];
    $password_hash = "coygcXkjUzeAY";
    if(crypt($pass, "conny") == $password_hash) {
        return true;
    }else{
        return false;
    }
  }
?>
