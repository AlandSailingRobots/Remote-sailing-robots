<?php
	require_once('dbConn.php');
	$sql = "SELECT * from course_calculation_config WHERE id=1";
	$result = $conn->query($sql);
	 while ($row = $result->fetch_assoc()) {

				echo "
							<div class='col-md-3'>
				         <form name='course_calculation_form' action='updateDb/updateDb2.php' method='POST'>
								<div class='panel panel-default'>
								  <!-- Default panel contents -->
								  <div class='panel-heading'>course_calculation_config</div>

								  <!-- Table -->
								  <table class='table'>
								    <tr>
											<input type='hidden' name='theTable' value='course_calculation_config'>
									    <td>id:</td>
									    <td>".$row["id"]."</td>
									  </tr>
									<tr>
									    <td>tack_angle:</td>
									    <td>".$row["tack_angle"]."</td>
											<td><input type='text' class='form-control' name='tack_angle' size='1'></td>
									 </tr>
									 <tr>
 									    <td>tack_max_angle:</td>
 									    <td>".$row["tack_max_angle"]."</td>
 											<td><input type='text' class='form-control' name='tack_max_angle' size='1'></td>
 									 </tr>
									 <tr>
									    <td>tack_min_speed:</td>
									    <td>".$row["tack_min_speed"]."</td>
											<td><input type='text' class='form-control' name='tack_min_speed' size='1'></td>
									  </tr>
									  <tr>
									    <td>sector_angle:</td>
									    <td>".$row["sector_angle"]."</td>
											<td><input type='text' class='form-control' name='sector_angle' size='1'></td>
									  </tr>
								  </table>
								</div>
								</form>
				        	</div>";
    	}

?>
