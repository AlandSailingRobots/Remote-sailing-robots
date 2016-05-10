<?php
	require_once('dbConn.php');
	$sql = "SELECT * from xbee_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {
				echo "<div class='col-md-4'>
				 <form name='xbee_config_form' action='updateDb/updateDb2.php' method='POST'>
					<div class='panel panel-default'>
					  <div class='panel-heading'>xbee_config</div>
					  <table class='table'>
					    <tr>
								<input type='hidden' name='theTable' value='xbee_config'>
						    <td>id:</td>
						    <td>".$row["id"]."</td>
						</tr>
						<tr>
						    <td>send:</td>
						    <td>".$row["send"]."</td>
						    <td><input type='text' class='form-control' name='send' size='1'></td>
						  </tr>
						  <tr>
						    <td>recieve:</td>
						    <td>".$row["recieve"]."</td>
						    <td><input type='text' class='form-control' name='recieve' size='1'></td>
						  </tr>
						  <tr>
						    <td>send_logs:</td>
						    <td>".$row["send_logs"]."</td>
						    <td><input type='text' class='form-control' name='send_logs' size='1'></td>
						  </tr>
					  </table>
					</div>
					</form>
				   </div>";
    	}
?>
