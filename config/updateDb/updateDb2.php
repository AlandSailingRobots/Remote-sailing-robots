<?php
	require('../dbConn.php');
  $table = "";
  $stmt = "";
  $keys = array_keys($_POST);
  foreach($_POST as $key => $value){
    if($keys[0] == $key){
      $table = $value;
    }
    else{
        if(!empty($value)){
          $stmt.= $key."=".$value.",";
          $sqlquery = "UPDATE config_updated SET updated = 1 where id=1";
      		$conn->query($sqlquery);
        }
      }
  }
  $stmt = substr($stmt, 0, strlen($stmt)-1);
  $sql = "UPDATE $table SET $stmt where id=1";
  $conn->query($sql);
//  header('Location: http://localhost/Remote-sailing-robots/config/');
?>
