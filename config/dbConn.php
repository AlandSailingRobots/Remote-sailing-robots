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
<<<<<<< HEAD
?>
=======
>>>>>>> 3b14e0f2de5cffa0cc3521b5757742c249a47e13
