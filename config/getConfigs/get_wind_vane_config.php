<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from wind_vane_config WHERE id=1";
	$result = $conn->query($sql);	

	 while ($row = $result->fetch_assoc()) {
	 		/*echo "
				<br>
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table>
	 			<tr>
	 			<td><h4>wind_vane_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>use_self_steering:</td>
					    <td>".$row["use_self_steering"]."</td>
					    <td><input type='radio' name='selected_config' value='use_self_steering'></td>
					  </tr>
					  <tr>
					    <td>wind_sensor_self_steering:</td>
					    <td>".$row["wind_sensor_self_steering"]."</td>
					    <td><input type='radio' name='selected_config' value='wind_sensor_self_steering'></td>
					  </tr>
					  <tr>
					    <td>self_steering_intervall:</td>
					    <td>".$row["self_steering_intervall"]."</td>
					    <td><input type='radio' name='selected_config' value='self_steering_intervall'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='wind_vane_config'>
								<td><input type='submit' value='Submit'></td>
				 			</tr>
		 				</table> 
				</table> 
			</form>";
*/



			echo "
			<form action='updateDb/update_Db.php' method='POST'>
				<div class='panel panel-default'>
				  <div class='panel-heading'>wind_vane_config</div>
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					</tr>
					<tr>
					    <td>use_self_steering:</td>
					    <td>".$row["use_self_steering"]."</td>
					    <td><input type='radio' name='selected_config' value='use_self_steering'></td>
					  </tr>
					 <tr>
					    <td>wind_sensor_self_steering:</td>
					    <td>".$row["wind_sensor_self_steering"]."</td>
					    <td><input type='radio' name='selected_config' value='wind_sensor_self_steering'></td>
					  </tr>
					   <tr>
					    <td>self_steering_intervall:</td>
					    <td>".$row["self_steering_intervall"]."</td>
					    <td><input type='radio' name='selected_config' value='self_steering_intervall'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='wind_vane_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>";

    	}

?>