<?php
	class ASRService {

		private $db;
		function __construct() {
			require_once('../globalsettings.php');

			$servername = "localhost";
			$username = $GLOBALS['username'];
			$password = $GLOBALS['password'];
			$dbname = "ithaax_testdata";
			// username = ithaax_testdata , pass = test123data
			// Local: username = root, pass = ""

			$this->db = new mysqli($servername, $username, $password, $dbname);
			//$this->db = new mysqli("localhost","ithaax_testdata","test123data","ithaax_testdata");
		//	$this->db = new mysqli("localhost","root","","ithaax_testdata");
		}
		function __destruct() {
			$this->db->close();
		}
    function pushWaypoint($data){
      $data = json_decode($data,true);

      $size = count($data);

      $waypoint = $this->db->stmt_init();
      $waypoint->prepare("DELETE FROM waypoints");
      $waypoint->execute();
      $waypoint->prepare("INSERT INTO waypoints VALUES(?,?,?,?,NULL);");
      for($i=1; $i <= $size; $i++) {
        $waypoints = "waypoint_".$i;
        foreach($data[$waypoints] as $row) {
            $waypoint->bind_param("iddi",
              $row["id"],
              $row["latitude"],
              $row["longitude"],
              $row["radius"]
            );
              $waypoint->execute();
            }
          }
        $waypoint->close();
        return $data[0];
    }
  }
    //when in non-wsdl mode the uri option must be specified
    $options=array('uri'=>'http://localhost/');
    //create a new SOAP server
    $server = new SoapServer(NULL,$options);
    //attach the API class to the SOAP Server
    $server->setClass('ASRService');
    //start the SOAP requests handler
    $server->handle();
?>
