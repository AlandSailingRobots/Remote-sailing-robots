<?php
	require_once('dbConn.php');
	$sql = "SELECT * from waypoint_routing_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {

		echo "<div class='col-md-4'>
	          <form name='waypoint_routing_form' action='updateDb/updateDb2.php' method='POST'>
				<div class='panel panel-default'>
				  <div class='panel-heading'>waypoint_routing_config</div>
				  <table class='table'>
				    <tr>
							<input type='hidden' name='theTable' value='waypoint_routing_config'>
					    <td>id:</td>
					    <td>".$row["id"]."</td>
					</tr>
					<tr>
					    <td>radius_ratio:</td>
					    <td>".$row["radius_ratio"]."</td>
					    <td><input type='text' class='form-control' name='radius_ratio' size='1'></td>
					 </tr>
					 <tr>
 					    <td>max_command_angle:</td>
 					    <td>".$row["max_command_angle"]."</td>
 					    <td><input type='text' class='form-control' name='max_command_angle' size='1'></td>
 					 </tr>
					 <tr>
 					    <td>rudder_speed_min:</td>
 					    <td>".$row["rudder_speed_min"]."</td>
 					    <td><input type='text' class='form-control' name='rudder_speed_min' size='1'></td>
 					 </tr>
					 <tr>
					    <td>sail_adjust_time:</td>
					    <td>".$row["sail_adjust_time"]."</td>
					    <td><input type='text' class='form-control' name='sail_adjust_time' size='1'></td>
					 </tr>
					   <tr>
					    <td>adjust_degree_limit:</td>
					    <td>".$row["adjust_degree_limit"]."</td>
					    <td><input type='text' class='form-control' name='adjust_degree_limit' size='1'></td>
					  </tr>
				  </table>
				</div>
				</form>
	        	</div>";
    	}

?>
