<?php
	require_once('dbConn.php');
	$sql = "SELECT * from sail_command_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {
					echo "<div class='col-md-4'>
				          <form name='sail_command_config_form' action='updateDb/updateDb2.php' method='POST'>
							<div class='panel panel-default'>
							  <!-- Default panel contents -->
							  <div class='panel-heading'>sail_command_config</div>

							  <!-- Table -->
							  <table class='table'>
							    <tr>
										<input type='hidden' name='theTable' value='sail_command_config'>
								    <td>id:</td>
								    <td>".$row["id"]."</td>
								  </tr>
								<tr>
								    <td>close_reach_command:</td>
								    <td>".$row["close_reach_command"]."</td>
								    <td><input type='text' class='form-control' name='close_reach_command' size='1'></td>
								</tr>
								 <tr>
								    <td>run_command:</td>
								    <td>".$row["run_command"]."</td>
								    <td><input type='text' class='form-control' name='run_command' size='1'></td>
								  </tr>
							  </table>
							</div>
							</form>
				        	</div>";
    	}

?>
