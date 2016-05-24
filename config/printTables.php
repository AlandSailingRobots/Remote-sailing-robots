<?php
    function printTables($table, $tableName){
      echo "<div class='col-md-4'>
                <form name=".$tableName." action='updateDb.php' method='POST'>
            <div class='panel panel-default'>
              <div class='panel-heading'>".$tableName."</div>";
      echo "<table class='table'>";
      echo "<input type='hidden' name='theTable' value=".$tableName.">";
      foreach($table as $key => $value){
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "<td><input type='text' class='form-control' name=".$key." size='1'></td>";
      }
      echo "</tr>";
      echo "</table>";
      echo "</div>
            </form>
          </div>";
    }
?>
