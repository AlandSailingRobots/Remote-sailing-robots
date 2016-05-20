<?php
<<<<<<< HEAD
	/*
	* PHP SOAP - How to create a SOAP Server and a SOAP Client
	*/
	if(isset($_POST["id"]) && isset($_POST["pwd"])) {

		 //$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/server.php', 'uri' => 'http://localhost/');

		 //$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/server.php', 'uri' => 'http://localhost/');
		//this is for local usage of httpSync
		$options = array('location' => 'http://localhost/Remote-sailing-robots/sync/server.php', 'uri' => 'http://localhost/');
	if(isset($_POST["id"]) && isset($_POST["pwd"])) {
		$optionsPushlogs = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushDatalogs.php', 'uri' => 'http://localhost/');
		 //$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushDatalogs.php', 'uri' => 'http://localhost/');
		$optionsGetConfigs = array('location' => 'http://localhost/Remote-sailing-robots/sync/getConfigs.php', 'uri' => 'http://localhost/');
		//$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/getConfigs.php', 'uri' => 'http://localhost/');
		$optionsPushConfigs = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushConfigs.php', 'uri' => 'http://localhost/');
		//$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushConfigs.php, 'uri' => 'http://localhost/');
		$optionsPushwaypoints = array('location' => 'http://localhost/Remote-sailing-robots/sync/pushWaypoints.php', 'uri' => 'http://localhost/');
		//$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/pushWaypoints.php, 'uri' => 'http://localhost/');


		//create an instante of the SOAPClient (the API will be available)
		$pushLogsService = new SoapClient(NULL, $optionsPushlogs);
		$getConfigsService = new SoapClient(NULL, $optionsGetConfigs);
		$pushConfigsService = new SoapClient(NULL, $optionsPushConfigs);
		$pushPushWaypoints = new SoapClient(NULL, $optionsPushwaypoints);

		if(isset($_POST["serv"])) {

			error_log($_POST["id"], 0);
			error_log($_POST["data"], 0);
			try {
				switch($_POST["serv"]) {
					case "getSetup":
						print_r($service->getSetup($_POST["id"]));
						break;
					case "getConfig":
						print_r($service->getConfig($_POST["id"]));
			try {
				switch($_POST["serv"]) {
					case "checkIfNewConfigs":
						echo $getConfigsService->checkIfNewConfigs();
						break;
					case "setConfigsUpdated":
						print_r($getConfigsService->setConfigsUpdated());
						break;
					case "getAllConfigs":
						print_r($service->getAllConfigs($_POST["id"]));
						break;
					case "getRoute":
						print_r($service->getRoute($_POST["id"]));
						break;
					case "getCourseCalculationConfig":
						print_r($service->getCourseCalculationConfig($_POST["id"]));
						break;
					case "getMaestroControllerConfig":
						print_r($service->getMaestroControllerConfig($_POST["id"]));
						break;
					case "getRudderCommandConfig":
						print_r($service->getRudderCommandConfig($_POST["id"]));
						break;
					case "getRudderServoConfig":
						print_r($service->getRudderServoConfig($_POST["id"]));
						break;
					case "getSailingRobotConfig":
						print_r($service->getSailingRobotConfig($_POST["id"]));
						break;
					case "getSailCommandConfig":
						print_r($service->getSailCommandConfig($_POST["id"]));
						break;
					case "getSailServoConfig":
						print_r($service->getSailServoConfig($_POST["id"]));
						break;
					case "getWaypointRoutingConfig":
						print_r($service->getWaypointRoutingConfig($_POST["id"]));
						break;
					case "getWindSensorConfig":
						print_r($service->getWindSensorConfig($_POST["id"]));
						break;
					case "getWindVaneConfig":
						print_r($service->getWindVaneConfig($_POST["id"]));
						break;

					case "checkIfNewConfigs":
						echo $service->checkIfNewConfigs();
						break;
					case "setConfigsUpdated":
						print_r($service->setConfigsUpdated());
						break;
					case "pushWaypoints":
						print_r($service->pushWaypoint($_POST["data"]));
						break;
					case "pushAllLogs":
						print_r($service->pushAllLogs($_POST["id"], $_POST["data"]));

						break;
					case "pushLogs":
						print_r($service->pushLogs($_POST["id"], $_POST["data"]));
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
		echo "Does not work";
	}
?>
