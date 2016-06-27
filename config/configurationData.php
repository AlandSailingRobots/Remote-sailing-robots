<?php


    function getConfigData($table){
      require_once('../globalsettings.php');
      $user = $GLOBALS['username'];
      $password = $GLOBALS['password'];
      // local
      $dsn = 'mysql:dbname=ithaax_testdata;host=localhost';


      // when putting it on Gator
      /*$dsn = 'mysql:dbname=ithaax_testdata;host=localhost';
      $user = 'ithaax_testdata';
      $password = 'test123data';

      //When local:
      $dsn = 'mysql:dbname=ithaax_testdata;host=localhost';
      $user = 'root';
      $password = '';
      */


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
