<?php
	require_once('dbConn.php');
	$sql = "SELECT * from rudder_command_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {

				echo "<div class='col-md-4'>
						<form name='rudder_command_config_form' action='updateDb/updateDb2.php' method='POST'>
						<div class='panel panel-default'>
						  <!-- Default panel contents -->
						  <div class='panel-heading'>rudder_command_config</div>

						  <!-- Table -->
						  <table class='table'>
						    <tr>
									<input type='hidden' name='theTable' value='rudder_command_config'>
							    <td>id:</td>
							    <td>".$row["id"]."</td>
							  </tr>
							<tr>
							    <td>extreme_command:</td>
							    <td>".$row["extreme_command"]."</td>
									<td><input type='text' class='form-control' name='extreme_command' size='1'></td>
							  </tr>
							 <tr>
							    <td>midship_command:</td>
							    <td>".$row["midship_command"]."</td>
							    <td><input type='text' class='form-control' name='midship_command' size='1'></td>
							  </tr>
						  </table>
						</div>
						</form>
				       </div>";
    	}

?>
