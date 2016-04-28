<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from sail_command_config WHERE id=1";
	$result = $conn->query($sql);	

	 while ($row = $result->fetch_assoc()) {
			/*	echo "
				<br>
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table>
	 			<tr>
	 			<td><h4>sail_command_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>close_reach_command:</td>
					    <td>".$row["close_reach_command"]."</td>
					    <td><input type='radio' name='selected_config' value='close_reach_command'></td>
					  </tr>
					  <tr>
					    <td>run_command:</td>
					    <td>".$row["run_command"]."</td>
					    <td><input type='radio' name='selected_config' value='run_command'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='sail_command_config'>
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
				  <div class='panel-heading'>sail_command_config</div>
				
				  <!-- Table -->
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					<tr>
					    <td>close_reach_command:</td>
					    <td>".$row["close_reach_command"]."</td>
					    <td><input type='radio' name='selected_config' value='close_reach_command'></td>
					</tr>
					 <tr>
					    <td>run_command:</td>
					    <td>".$row["run_command"]."</td>
					    <td><input type='radio' name='selected_config' value='run_command'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='sail_command_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>";





    	}

?>