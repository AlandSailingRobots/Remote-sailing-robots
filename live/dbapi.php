<?php

//$options = array('location' => 'http://www.sailingrobots.com/testdata/live/dbconnection.php', 'uri' => 'http://localhost/');
$options = array('location' => 'http://localhost/Remote-sailing-robots/live/dbconnection.php', 'uri' => 'http://localhost/');
//create an instante of the SOAPClient (the API will be available)
$service = new SoapClient(NULL, $options);
//call an API method
switch ($_REQUEST['action']) {
	case 'idcheck':
		$id = $service->getLatestID();
		//$data = $service->getLatestData(end($id));
		echo json_encode($id);
		break;
	case 'getdata':
		$data = $service->getLatestData();
		echo json_encode($data);
		break;
	case 'getGpsData':
		$dataGps = $service->getLatestGpsData();
		echo json_encode($dataGps);
		break;
	case 'getCourseCalculationData':
		$dataCourse = $service->getLatestCourseCalculationData();
		echo json_encode($dataCourse);
		break;
	case 'getWindSensorData':
		$dataWindSensor = $service->getLatestWindSensorData();
		echo json_encode($dataWindSensor);
		break;
	case 'getSystemData':
		$dataSystem = $service->getLatestSystemData();
		echo json_encode($dataSystem);
		break;
	case 'getCompassData':
		$dataCompass = $service->getLatestCompassData();
		echo json_encode($dataCompass);
		break;
	case 'getLongitudeLatitudeData':
		$dataLatitudeLongitude = $service->getLatestLatitudeLongitudeData();
		echo json_encode($dataLatitudeLongitude);
		break;
	default:
		echo "!!! CONNY W T F !!!";
		break;
}
?>
