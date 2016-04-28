<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from sailing_robot_config WHERE id=1";
	$result = $conn->query($sql);	

	 while ($row = $result->fetch_assoc()) {
/*
				echo "
				<br>
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table>
	 			<tr>
	 			<td><h4>sailing_robot_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>flag_heading_compass:</td>
					    <td>".$row["flag_heading_compass"]."</td>
					    <td><input type='radio' name='selected_config' value='flag_heading_compass'></td>
					  </tr>
					  <tr>
					    <td>loop_time:</td>
					    <td>".$row["loop_time"]."</td>
					    <td><input type='radio' name='selected_config' value='loop_time'></td>
					  </tr>
					  <tr>
					    <td>scanning:</td>
					    <td>".$row["scanning"]."</td>
					    <td><input type='radio' name='selected_config' value='scanning'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='sailing_robot_config'>
								<td><input type='submit' value='Submit'></td>
				 			</tr>
		 				</table> 
				</table> 
			</form>";
*/

			echo "
			<form action='updateDb/update_Db.php' method='POST'>
				<div class='panel panel-default'>
				  <!-- Default panel contents -->
				  <div class='panel-heading'>sailing_robot_config</div>
				
				  <!-- Table -->
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					<tr>
					    <td>flag_heading_compass:</td>
					    <td>".$row["flag_heading_compass"]."</td>
					    <td><input type='radio' name='selected_config' value='flag_heading_compass'></td>
					  </tr>
					 <tr>
					    <td>loop_time:</td>
					    <td>".$row["loop_time"]."</td>
					    <td><input type='radio' name='selected_config' value='loop_time'></td>
					  </tr>
					   <tr>
					    <td>scanning:</td>
					    <td>".$row["scanning"]."</td>
					    <td><input type='radio' name='selected_config' value='scanning'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='sailing_robot_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>";


    	}

?>