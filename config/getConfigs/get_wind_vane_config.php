<?php
	require_once('dbConn.php');
	$sql = "SELECT * from wind_vane_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {
				echo "<div class='col-md-4'>
				          <form name='wind_vane_config_form' action='updateDb/updateDb2.php' method='POST'>
								<div class='panel panel-default'>
								  <div class='panel-heading'>wind_vane_config</div>
								  <table class='table'>
								    <tr>
											<input type='hidden' name='theTable' value='wind_vane_config'>
									    <td>id:</td>
									    <td>".$row["id"]."</td>
									</tr>
									<tr>
									    <td>use_self_steering:</td>
									    <td>".$row["use_self_steering"]."</td>
									    <td><input type='text' class='form-control' name='use_self_steering' size='1'></td>
									  </tr>
									 <tr>
									    <td>wind_sensor_self_steering:</td>
									    <td>".$row["wind_sensor_self_steering"]."</td>
									    <td><input type='text' class='form-control' name='wind_sensor_self_steering' size='1'></td>
									  </tr>
									   <tr>
									    <td>self_steering_intervall:</td>
									    <td>".$row["self_steering_intervall"]."</td>
									    <td><input type='text' class='form-control' name='self_steering_intervall' size='1'></td>
									  </tr>
								  </table>
								</div>
								</form>
				        	</div>";
    	}

?>
