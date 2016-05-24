<?php
    function getConfigData($table){
      $dsn = 'mysql:dbname=ithaax_testdata;host=localhost';
      $user = 'root';
      $password = '';

      try {
          $dbh = new PDO($dsn, $user, $password);
      } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
      }

      $sth = $dbh->prepare("SELECT * FROM $table");
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
?>
