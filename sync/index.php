<?php
	/*
	* PHP SOAP - How to create a SOAP Server and a SOAP Client
	*/
	if(isset($_GET["id"]) && isset($_GET["pwd"])) {

		 //$options = array('location' => 'http://www.sailingrobots.com/testdata/sync/server.php', 'uri' => 'http://localhost/');

		 $options = array('location' => 'http://www.sailingrobots.com/testdata/sync/server.php', 'uri' => 'http://localhost/');
		//this is for local usage of httpSync
		//$options = array('location' => 'http://localhost/Remote-sailing-robots/sync/server.php', 'uri' => 'http://localhost/');
		//create an instante of the SOAPClient (the API will be available)
		$service = new SoapClient(NULL, $options);
		//call an API method

		/*if(!($service->getUser($_GET["id"], $_GET["pwd"]) === 1)) {
			return;
		}*/

		if(isset($_GET["serv"])) {
			try {
				switch($_GET["serv"]) {
					case "getSetup":
						print_r($service->getSetup($_GET["id"]));
						break;
					case "getConfig":
						print_r($service->getConfig($_GET["id"]));
						break;

					case "getAllConfigs":
						print_r($service->getAllConfigs($_GET["id"]));
						break;
					case "getRoute":
						print_r($service->getRoute($_GET["id"]));
						break;
					case "getCourseCalculationConfig":
						print_r($service->getCourseCalculationConfig($_GET["id"]));
						break;
					case "getMaestroControllerConfig":
						print_r($service->getMaestroControllerConfig($_GET["id"]));
						break;
					case "getRudderCommandConfig":
						print_r($service->getRudderCommandConfig($_GET["id"]));
						break;
					case "getRudderServoConfig":
						print_r($service->getRudderServoConfig($_GET["id"]));
						break;
					case "getSailingRobotConfig":
						print_r($service->getSailingRobotConfig($_GET["id"]));
						break;
					case "getSailCommandConfig":
						print_r($service->getSailCommandConfig($_GET["id"]));
						break;
					case "getSailServoConfig":
						print_r($service->getSailServoConfig($_GET["id"]));
						break;
					case "getWaypointRoutingConfig":
						print_r($service->getWaypointRoutingConfig($_GET["id"]));
						break;
					case "getWindSensorConfig":
						print_r($service->getWindSensorConfig($_GET["id"]));
						break;
					case "getWindVaneConfig":
						print_r($service->getWindVaneConfig($_GET["id"]));
						break;

					case "checkIfNewConfigs":
						echo $service->checkIfNewConfigs();
						break;
					case "setConfigsUpdated":
						print_r($service->setConfigsUpdated());
						break;
					case "pushWaypoints":
						print_r($service->pushWaypoint($_GET["data"]));
						break;
					case "pushAllLogs":
						print_r($service->pushAllLogs($_GET["id"], $_GET["data"]));
						break;
					case "pushLogs":
						print_r($service->pushLogs($_GET["id"], $_GET["data"]));
						break;
					default:
						break;
				}
			} catch(Exception $e) {
			print_r("ERROR: ".$e->getMessage());

			}
		}
	} else {
		echo "CONNY";
	}
?>
