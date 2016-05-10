<?php
	require_once('dbConn.php');
	$sql = "SELECT * from sailing_robot_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {
				echo "<div class='col-md-4'>
				          <form name='sailing_robot_config_form' action='updateDb/updateDb2.php' method='POST'>
							<div class='panel panel-default'>
							  <!-- Default panel contents -->
							  <div class='panel-heading'>sailing_robot_config</div>

							  <!-- Table -->
							  <table class='table'>
							    <tr>
										<input type='hidden' name='theTable' value='sailing_robot_config'>
								    <td>id:</td>
								    <td>".$row["id"]."</td>
								  </tr>
								<tr>
								    <td>flag_heading_compass:</td>
								    <td>".$row["flag_heading_compass"]."</td>
								    <td><input type='text' class='form-control' name='flag_heading_compass' size='1'></td>
								  </tr>
								 <tr>
								    <td>loop_time:</td>
								    <td>".$row["loop_time"]."</td>
								    <td><input type='text' class='form-control' name='loop_time' size='1'></td>
								  </tr>
								   <tr>
								    <td>scanning:</td>
								    <td>".$row["scanning"]."</td>
								    <td><input type='text' class='form-control' name='scanning' size='1'></td>
								  </tr>
							  </table>
							</div>
							</form>
				        	</div>";
    	}

?>
