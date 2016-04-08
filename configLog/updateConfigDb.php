<?php



	$servername = "localhost";
	$username = "ithaax_testdata";
	$password = "test123data";
	$dbname = "ithaax_testdata";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}



	$selectedConfig = $_POST['configInput'];
	$inputValue = $_POST['configs'];


	$sql = "UPDATE configs SET $inputValue = $selectedConfig where id=1";

	if ($conn->query($sql) === TRUE) {
	    header('Location: http://localhost/Remote-sailing-robots/configLog/');
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();



?>
