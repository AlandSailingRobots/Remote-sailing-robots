<?php
	require('../dbConn.php');

	$table = $_POST['theTable'];
	$selectedConfig = $_POST['selected_config'];
	$inputValue = $_POST['newConfigValue'];
	$pw = $_POST['password'];

	echo $table;
	echo $selectedConfig;
	echo $inputValue;


	if($pw == "pophaax"){

		$sql = "UPDATE $table SET $selectedConfig = '$inputValue'  where id=1";

		$sqlquery = "UPDATE config_updated SET updated = 1 where id=1";
		$conn->query($sqlquery);

		if ($conn->query($sql) === TRUE) {
		    header('Location: http://localhost/Remote-sailing-robots/config');
				//header('Location: http://www.sailingrobots.com/testdata/configLog/');
		} else {
		    echo "Error updating record: " . $conn->error;

			$conn->close();
		}

	}
	else {
		header("location:http://localhost/Remote-sailing-robots/config");

	}

?>
