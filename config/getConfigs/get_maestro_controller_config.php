<?php
	require_once('dbConn.php');
	$sql = "SELECT * from maestro_controller_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {
				echo "<div class='col-md-4'>
				          <form name='maestro_controller_form' action='updateDb/updateDb2.php' method='POST'>
							<div class='panel panel-default'>
							  <!-- Default panel contents -->
							  <div class='panel-heading'>maestro_controller_config</div>

							  <!-- Table -->
							  <table class='table'>
							    <tr>
										<input type='hidden' name='theTable' value='maestro_controller_config'>
								    <td>id:</td>
								    <td>".$row["id"]."</td>
								</tr>
								<tr>
								    <td>port:</td>
								    <td>".$row["port"]."</td>
								    <td><input type='text' class='form-control' name='port' size='1'></td>
								  </tr>
							  </table>
							</div>
							</form>
				        	</div>";
    	}

?>
