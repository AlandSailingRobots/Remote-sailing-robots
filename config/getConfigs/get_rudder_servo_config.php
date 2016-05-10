<?php
	require_once('dbConn.php');
	$sql = "SELECT * from rudder_servo_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {
				echo "<div class='col-md-4'>
						<form name='rudder_servo_config_form' action='updateDb/updateDb2.php' method='POST'>
							<div class='panel panel-default'>
							  <!-- Default panel contents -->
							  <div class='panel-heading'>rudder_servo_config</div>

							  <!-- Table -->
							  <table class='table'>
							    <tr>
										<input type='hidden' name='theTable' value='rudder_servo_config'>
								    <td>id:</td>
								    <td>".$row["id"]."</td>
								  </tr>
								<tr>
								    <td>channel:</td>
								    <td>".$row["channel"]."</td>
								    <td><input type='text' class='form-control' name='channel' size='1'></td>
								  </tr>
								 <tr>
								    <td>speed:</td>
								    <td>".$row["speed"]."</td>
								    <td><input type='text' class='form-control' name='speed' size='1'></td>
								  </tr>
								  <tr>
								    <td>acceleration:</td>
								    <td>".$row["acceleration"]."</td>
								    <td><input type='text' class='form-control' name='acceleration' size='1'></td>
								  </tr>
							  </table>
							</div>
							</form>
				       </div>";
    	}
?>
