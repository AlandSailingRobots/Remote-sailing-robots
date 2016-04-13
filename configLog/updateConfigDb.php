<?php



	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ithaax_testdata";
	// username = ithaax_testdata , pass = test123data
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	$selectedConfig = $_POST['configInput'];
	$inputValue = $_POST['configs'];
	$pw = $_POST['password'];
	if($pw == "pophaax"){

		$sql = "UPDATE configs SET $inputValue = $selectedConfig where id=1";

		if ($conn->query($sql) === TRUE) {
		    header('Location: http://localhost/Remote-sailing-robots/configLog/?msg=success');
		} else {
		    echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}
	else {
		header("location:http://localhost/Remote-sailing-robots/configLog/?msg=failed");
	}


?>
