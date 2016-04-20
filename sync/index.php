<?php
	/*
	* PHP SOAP - How to create a SOAP Server and a SOAP Client
	*/
	if(isset($_GET["id"]) && isset($_GET["pwd"])) {

	//	 $options = array('location' => 'http://www.sailingrobots.com/testdata/sync/server.php', 'uri' => 'http://localhost/');
		//this is for local usage of httpSync
		$options = array('location' => 'http://localhost/Remote-sailing-robots/sync/server.php', 'uri' => 'http://localhost/');
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
					case "getRoute":
						print_r($service->getRoute($_GET["id"]));
						break;
					case "getCourseCalculationConfig":
						print_r($service->getCourseCalculationConfig($_GET["id"]));
						break;


					case "pushLogs":
						print_r($service->pushLogs($_GET["id"], $_GET["data"]));
						break;
					case "pushGPSLogs":
						print_r($service->pushGPSLogs($_GET["data"]));
						break;
					case "pushCompassLogs":
						print_r($service->pushCompassLogs($_GET["data"]));
						break;
					case "pushCourseCalculationLogs":
						print_r($service->pushCourseCalculationLogs($_GET["data"]));
						break;
					case "pushSystemLogs":
						print_r($service->pushSystemLogs($_GET["id"], $_GET["data"]));
						break;
					case "pushWindSensorLogs":
						print_r($service->pushWindSensorLogs($_GET["data"]));
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
