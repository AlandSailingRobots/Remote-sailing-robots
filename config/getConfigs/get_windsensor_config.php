<?php
	require_once('dbConn.php');
	$sql = "SELECT * from windsensor_config WHERE id=1";
	$result = $conn->query($sql);

	 while ($row = $result->fetch_assoc()) {

		echo "<div class='col-md-4'>
				 <form name='windsensor_config_form' action='updateDb/updateDb2.php' method='POST'>
					<div class='panel panel-default'>
					  <div class='panel-heading'>windsensor_config</div>
					  <table class='table'>
					    <tr>
								<input type='hidden' name='theTable' value='windsensor_config'>
						    <td>id:</td>
						    <td>".$row["id"]."</td>
						</tr>
						<tr>
						    <td>port:</td>
						    <td>".$row["port"]."</td>
						    <td><input type='text' class='form-control' name='port' size='1'></td>
						  </tr>
						  <tr>
						    <td>baud_rate:</td>
						    <td>".$row["baud_rate"]."</td>
						    <td><input type='text' class='form-control' name='baud_rate' size='1'></td>
						  </tr>
					  </table>
					</div>
					</form>
				   </div>";
    	}
?>
