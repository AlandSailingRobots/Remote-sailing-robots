<?php
    function getConfigData($table){
      // local
      $dsn = 'mysql:dbname=ithaax_testdata;host=localhost';
      $user = 'root';
      $password = '';

      // when putting it on Gator
      /*$dsn = 'mysql:dbname=ithaax_testdata;host=localhost';
      $user = 'ithaax_testdata';
      $password = 'test123data';*/


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
