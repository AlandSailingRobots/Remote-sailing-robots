<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from course_calculation_config WHERE id=1";
	$result = $conn->query($sql);	
	 while ($row = $result->fetch_assoc()) {

	 		/*echo "
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table class='table'>
	 			<tr>
	 			<td><h4>course_calculation_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>tack_angle:</td>
					    <td>".$row["tack_angle"]."</td>
					    <td><input type='radio' name='selected_config' value='tack_angle'></td>
					  </tr>
					  <tr>
					    <td>tack_max_angle:</td>
					    <td>".$row["tack_max_angle"]."</td>
					    <td><input type='radio' name='selected_config' value='tack_max_angle'></td>
					  </tr>
					  <tr>
					    <td>tack_min_speed:</td>
					    <td>".$row["tack_min_speed"]."</td>
					    <td><input type='radio' name='selected_config' value='tack_min_speed'></td>
					  </tr>
					  <tr>
					    <td>sector_angle:</td>
					    <td>".$row["sector_angle"]."</td>
					    <td><input type='radio' name='selected_config' value='sector_angle'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='course_calculation_config'>
								<td><input type='submit' value='Submit'></td>
				 			</tr>
		 				</table> 
				</table> 
			</form>";*/



			echo "
			<form action='updateDb/update_Db.php' method='POST'>
				<div class='panel panel-default'>
				  <!-- Default panel contents -->
				  <div class='panel-heading'>course_calculation_config</div>
				
				  <!-- Table -->
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					<tr>
					    <td>tack_angle:</td>
					    <td>".$row["tack_angle"]."</td>
					    <td><input type='radio' name='selected_config' value='tack_angle'></td>
					 </tr>
					 <tr>
					    <td>tack_min_speed:</td>
					    <td>".$row["tack_min_speed"]."</td>
					    <td><input type='radio' name='selected_config' value='tack_min_speed'></td>
					  </tr>
					  <tr>
					    <td>sector_angle:</td>
					    <td>".$row["sector_angle"]."</td>
					    <td><input type='radio' name='selected_config' value='sector_angle'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='course_calculation_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>";

			





    	}

?>
