<?php
	require_once('dbConn.php');
	

	$sql = "SELECT * from waypoint_routing_config
 WHERE id=1";
	$result = $conn->query($sql);	

	 while ($row = $result->fetch_assoc()) {
			/*	echo "
				<br>
	 		<form action='updateDb/update_Db.php' method='POST'>
	 			<table>
	 			<tr>
	 			<td><h4>waypoint_routing_config</h4></td>
	 			</tr>
					  <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					  </tr>
					  <tr>
					    <td>radius_ratio:</td>
					    <td>".$row["radius_ratio"]."</td>
					    <td><input type='radio' name='selected_config' value='radius_ratio'></td>
					  </tr>
					  <tr>
					    <td>sail_adjust_time:</td>
					    <td>".$row["sail_adjust_time"]."</td>
					    <td><input type='radio' name='selected_config' value='sail_adjust_time'></td>
					  </tr>
					  <tr>
					    <td>adjust_degree_limit:</td>
					    <td>".$row["adjust_degree_limit"]."</td>
					    <td><input type='radio' name='selected_config' value='adjust_degree_limit'></td>
					  </tr>
					  	<table>
							<tr>
								<td>Input value:</td>
								<td><input type='text' name='newConfigValue' size='10'></td>	
				 			</tr>
				 			<tr>
				 				<td>Password:</td>
				 				<td><input type='password' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='waypoint_routing_config'>
								<td><input type='submit' value='Submit'></td>
				 			</tr>
		 				</table> 
				</table> 
			</form>";




			echo "
			<form action='updateDb/update_Db.php' method='POST'>
				<div class='panel panel-default'>
				  <div class='panel-heading'>waypoint_routing_config</div>
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					</tr>
					<tr>
					    <td>radius_ratio:</td>
					    <td>".$row["radius_ratio"]."</td>
					    <td><input type='radio' name='selected_config' value='radius_ratio'></td>
					 </tr>
					 <tr>
					    <td>sail_adjust_time:</td>
					    <td>".$row["sail_adjust_time"]."</td>
					    <td><input type='radio' name='selected_config' value='sail_adjust_time'></td>
					 </tr>
					   <tr>
					    <td>adjust_degree_limit:</td>
					    <td>".$row["adjust_degree_limit"]."</td>
					    <td><input type='radio' name='selected_config' value='adjust_degree_limit'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='waypoint_routing_config'>
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
				  <div class='panel-heading'>waypoint_routing_config</div>
				  <table class='table'>
				    <tr>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					</tr>
					<tr>
					    <td>radius_ratio:</td>
					    <td>".$row["radius_ratio"]."</td>
					    <td><input type='radio' name='selected_config' value='radius_ratio'></td>
					 </tr>
					 <tr>
					    <td>sail_adjust_time:</td>
					    <td>".$row["sail_adjust_time"]."</td>
					    <td><input type='radio' name='selected_config' value='sail_adjust_time'></td>
					 </tr>
					   <tr>
					    <td>adjust_degree_limit:</td>
					    <td>".$row["adjust_degree_limit"]."</td>
					    <td><input type='radio' name='selected_config' value='adjust_degree_limit'></td>
					  </tr>
						  <table class='table'>
						  		<tr>
								<td>Input value:</td>
								<td><input type='text' class='form-control' name='newConfigValue' size='10'></td>	
				 				</tr>
				 				<tr>
				 				<td>Password:</td>
				 				<td><input type='password' class='form-control' name='password' size='10ph'></td>
				 				<input type='hidden' name='theTable' value='waypoint_routing_config'>
								<td><input type='submit' class='btn btn-success' value='Update'></td>
				 			</tr>
						  </table>
				  </table>
				</div>
				</form>
	        	</div>";



    	}

?>