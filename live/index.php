<?php
/*
	This page is used to get the latest info from the db in realtime.
	The page is updated every third second and when system_datalogs is updated.
*/
session_start();
include("header.php");

//

/*
$options = array('location' => 'http://localhost/sailbot/dbupdate/dbconnection.php', 'uri' => 'http://localhost/');
//create an instante of the SOAPClient (the API will be available)
$service = new SoapClient(NULL, $options);
//call an API method


	$id = $service->getLatestID();
	$data = $service->getLatestData(end($id));

	print_r($data);

	echo "<br/>";echo "<br/>";
	echo $data['boat_id'];
*/
include("body.php");


?>
