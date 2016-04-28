<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from rudder_command_config WHERE id=1";
	$result = $conn->query($sql);	

	 while ($row = $result->fetch_assoc()) {

			/*	echo "
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table>
	 			<tr>
	 			<td><h4>rudder_command_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>extreme_command:</td>
					    <td>".$row["extreme_command"]."</td>
					    <td><input type='radio' name='selected_config' value='extreme_command'></td>
					  </tr>
					  <tr>
					    <td>midship_command:</td>
					    <td>".$row["midship_command"]."</td>
					    <td><input type='radio' name='selected_config' value='midship_command'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='rudder_command_config'>
								<td><input type='submit' value='Submit'></td>
				 			</tr>
		 				</table> 
				</table> 
			</form>";





			echo "
			<form action='updateDb/update_Db.php' method='POST'>
				<div class='panel panel-default'>
				  <!-- Default panel contents -->
				  <div class='panel-heading'>rudder_command_config</div>
				
				  <!-- Table -->
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					<tr>
					    <td>extreme_command:</td>
					    <td>".$row["extreme_command"]."</td>
					    <td><input type='radio' name='selected_config' value='extreme_command'></td>
					  </tr>
					 <tr>
					    <td>midship_command:</td>
					    <td>".$row["midship_command"]."</td>
					    <td><input type='radio' name='selected_config' value='midship_command'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='rudder_command_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>";


*/

				echo "<div class='col-md-6'>
						<form action='updateDb/update_Db.php' method='POST'>
						<div class='panel panel-default'>
						  <!-- Default panel contents -->
						  <div class='panel-heading'>rudder_command_config</div>
						
						  <!-- Table -->
						  <table class='table'>
						    <tr>
							    <td>id:</td>
							    <td>".$row["id"]."</td>
							  </tr>
							<tr>
							    <td>extreme_command:</td>
							    <td>".$row["extreme_command"]."</td>
							    <td><input type='radio' name='selected_config' value='extreme_command'></td>
							  </tr>
							 <tr>
							    <td>midship_command:</td>
							    <td>".$row["midship_command"]."</td>
							    <td><input type='radio' name='selected_config' value='midship_command'></td>
							  </tr>
								  <table class='table'>
								  		<tr>
										<td>Input value:</td>
										<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
						 				</tr>
						 				<tr>
						 				<td>Password:</td>
						 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
						 				<input type='hidden' name='theTable' value='rudder_command_config'>
										<td><input type='submit' class='btn btn-success' value='Update'></td>
						 			</tr>
								  </table>
						  </table>
						</div>
						</form>
				       </div>";



    	}

?>