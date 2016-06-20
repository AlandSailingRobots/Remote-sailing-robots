<?php
	/*
		This folder is used for the httpsync and it has no "interface" so you cant go to url/sync.
		The location's that have something like http://localhost/ is used to test the sync localy and the
		location's that have something like http://www.sailingrobots.com/ is used to test the sync on the website.
	*/
	if(isset($_POST["id"]) && isset($_POST["pwd"])) {

		$optionsPushlogs = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushDatalogs.php', 'uri' => 'http://localhost/');
		 //$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushDatalogs.php', 'uri' => 'http://localhost/');
		$optionsGetConfigs = array('location' => 'http://localhost/Remote-sailing-robots/sync/getConfigs.php', 'uri' => 'http://localhost/');
		//$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/getConfigs.php', 'uri' => 'http://localhost/');
		$optionsPushConfigs = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushConfigs.php', 'uri' => 'http://localhost/');
		//$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushConfigs.php, 'uri' => 'http://localhost/');
		$optionsPushwaypoints = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushWaypoints.php', 'uri' => 'http://localhost/');
		//$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushWaypoints.php, 'uri' => 'http://localhost/');

		//$optionsPushlogs = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushDatalogs.php', 'uri' => 'http://localhost/');
		// $optionsPushlogs = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushDatalogs.php', 'uri' => 'http://localhost/');

	//	$optionsGetConfigs = array('location' => 'http://localhost/Remote-sailing-robots/sync/getConfigs.php', 'uri' => 'http://localhost/');
		//$optionsGetConfigs = array('location' => 'http://www.sailingrobots.com/testdata/sync/getConfigs.php', 'uri' => 'http://localhost/');

		//$optionsPushConfigs = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushConfigs.php', 'uri' => 'http://localhost/');
		//$optionsPushConfigs = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushConfigs.php', 'uri' => 'http://localhost/');
	//	$optionsPushwaypoints = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushWaypoints.php', 'uri' => 'http://localhost/');
		//$optionsPushwaypoints = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushWaypoints.php', 'uri' => 'http://localhost/');


		//create an instante of the SOAPClient (the API will be available)
		$pushLogsService = new SoapClient(NULL, $optionsPushlogs);
		$getConfigsService = new SoapClient(NULL, $optionsGetConfigs);
		$pushConfigsService = new SoapClient(NULL, $optionsPushConfigs);
		$pushPushWaypoints = new SoapClient(NULL, $optionsPushwaypoints);

		if(isset($_POST["serv"])) {
			try {
				switch($_POST["serv"]) {
					case "checkIfNewConfigs":
						echo $getConfigsService->checkIfNewConfigs();
						break;
					case "setConfigsUpdated":
						print_r($getConfigsService->setConfigsUpdated());
						break;
					case "getAllConfigs":
						print_r($getConfigsService->getAllConfigs($_POST["id"]));
						break;
					case "pushConfigs":
						print_r($pushConfigsService->pushConfigs($_POST["data"]));
						break;
					case "pushWaypoints":
						print_r($pushPushWaypoints->pushWaypoint($_POST["data"]));
						break;
					case "pushAllLogs":
						print_r($pushLogsService->pushAllLogs($_POST["id"], $_POST["data"]));
						break;
					default:
						break;
				}
			} catch(Exception $e) {
			print_r("ERROR: ".$e->getMessage());
			}
		}
	} else {
		echo "conny WTF!";
	}
?>
