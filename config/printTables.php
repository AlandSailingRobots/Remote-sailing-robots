<?php
    function printTables($table, $tableName){

      echo "<div class='col-md-4'>
                <form name=".$tableName." id=".$tableName." action='updateDb.php' method='POST' autocomplete='off'>
            <div class='panel panel-default'>
              <div class='panel-heading'>".$tableName."</div>";
      echo "<table class='table'>";
      echo "<input type='hidden' name='theTable' value=".$tableName.">";
      if (is_array($table)){
          foreach($table as $key => $value){
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$value."</td>";
            if ( $key != "id"){
              echo "<td><input type='text' class='form-control' name=".$key." size='1'></td>";
            }

          }
      }else{
          echo "<tr>";
          echo "<td> ERROR: No data found </td>";
      }

      echo "</tr>";
      echo "</table>";
      echo "</div>
            </form>
          </div>";
    }
?>
