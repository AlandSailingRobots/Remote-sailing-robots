<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from xbee_config WHERE id=1";
	$result = $conn->query($sql);	

	 while ($row = $result->fetch_assoc()) {
/*
	 	echo "
				<br>
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table>
	 			<tr>
	 			<td><h4>xbee_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>send:</td>
					    <td>".$row["send"]."</td>
					    <td><input type='radio' name='selected_config' value='send'></td>
					  </tr>
					  <tr>
					    <td>recieve:</td>
					    <td>".$row["recieve"]."</td>
					    <td><input type='radio' name='selected_config' value='recieve'></td>
					  </tr>
					  <tr>
					    <td>send_logs:</td>
					    <td>".$row["send_logs"]."</td>
					    <td><input type='radio' name='selected_config' value='send_logs'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='xbee_config'>
								<td><input type='submit' value='Submit'></td>
				 			</tr>
		 				</table> 
				</table> 
			</form>";
*/




			echo "
			<form action='updateDb/update_Db.php' method='POST'>
				<div class='panel panel-default'>
				  <div class='panel-heading'>xbee_config</div>
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					</tr>
					<tr>
					    <td>send:</td>
					    <td>".$row["send"]."</td>
					    <td><input type='radio' name='selected_config' value='send'></td>
					  </tr>
					  <tr>
					    <td>recieve:</td>
					    <td>".$row["recieve"]."</td>
					    <td><input type='radio' name='selected_config' value='recieve'></td>
					  </tr>
					  <tr>
					    <td>send_logs:</td>
					    <td>".$row["send_logs"]."</td>
					    <td><input type='radio' name='selected_config' value='send_logs'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='xbee_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>";
    	}

?>