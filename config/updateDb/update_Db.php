<?php

	$servername = "localhost";
	$username = "ithaax_testdata";
	$password = "test123data";
	$dbname = "ithaax_testdata";
	// username = ithaax_testdata , pass = test123data
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

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
		    header('Location: http://localhost/Remote-sailing-robots/config/test.php');
				//header('Location: http://www.sailingrobots.com/testdata/configLog/');
		} else {
		    echo "Error updating record: " . $conn->error;

			$conn->close();
		}

	}
	else {
		header("location:http://localhost/Remote-sailing-robots/config/test.php");

	}

?>
