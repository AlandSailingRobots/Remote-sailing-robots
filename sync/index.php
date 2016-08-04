<?php
    require_once('../globalsettings.php');
	/*
		This folder is used for the httpsync and it has no "interface" so you cant go to url/sync.
		The location's that have something like http://localhost/ is used to test the sync localy and the
		location's that have something like http://www.sailingrobots.com/ is used to test the sync on the website.
	*/
	if(isset($_POST["id"]) && isset($_POST["pwd"])) {

		$optionsPushlogs = array('location' => $GLOBALS['server'].'/sync/pushDatalogs.php', 'uri' => 'http://localhost/');
		$optionsGetConfigs = array('location' => $GLOBALS['server'].'/sync/getConfigs.php', 'uri' => 'http://localhost/');
		$optionsPushConfigs = array('location' => $GLOBALS['server'].'/sync/pushConfigs.php', 'uri' => 'http://localhost/');
		$optionsPushwaypoints = array('location' => $GLOBALS['server'].'/sync/pushWaypoints.php', 'uri' => 'http://localhost/');
		$optionsGetWaypoints = array('location' => $GLOBALS['server'].'/sync/getWaypoints.php', 'uri' => 'http://localhost/');
		//create an instante of the SOAPClient (the API will be available)
		$pushLogsService = new SoapClient(NULL, $optionsPushlogs);
		$getConfigsService = new SoapClient(NULL, $optionsGetConfigs);
		$pushConfigsService = new SoapClient(NULL, $optionsPushConfigs);
		$pushPushWaypoints = new SoapClient(NULL, $optionsPushwaypoints);
		$getWaypointsService = new SoapClient(NULL, $optionsGetWaypoints);

		if(isset($_POST["serv"])) {
			try {
				switch($_POST["serv"]) {
					case "checkIfNewConfigs":
						echo $getConfigsService->checkIfNewConfigs();
						break;
                    case "checkIfNewWaypoints":
                        echo $getWaypointsService->checkIfNewWaypoints();
                        break;
					case "setConfigsUpdated":
						print_r($getConfigsService->setConfigsUpdated());
						break;
					case "getAllConfigs":
						print_r($getConfigsService->getAllConfigs($_POST["id"]));
						break;
					case "getWaypoints":
						print_r($getWaypointsService->getWaypoints());
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
				print_r("ERROR: (exception thrown in sync/index.php): ".$e->getMessage());
			}
		}
	} else {
		echo "conny WTF!";
	}
?>
