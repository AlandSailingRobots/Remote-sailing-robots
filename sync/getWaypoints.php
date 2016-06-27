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
    }
    function __destruct() {
        $this->db->close();
    }
    //Update check needs its own entries
    function checkIfNewConfigs() {
        $sql = "SELECT updated FROM config_updated";
        $preResult = $this->db->query($sql);
        if (!$preResult) {
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }
        $result = $preResult->fetch_assoc();
        return $result['updated'];
    }
    function setConfigsUpdated() {
        $sql = "UPDATE config_updated SET updated = 0 where id=1";
        $result = $this->db->query($sql);
    }
    function getWaypoints() {
        $preResult = $this->db->query("SELECT * FROM waypoints");
        if (!$preResult) {
        	throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        }

        $result = [];
        while ($row = $preResult->fetch_row()) {
            $result[] = $row;
        }



        //$result = $preResult->fetch_array();
        $array = array("waypoints" => 0);
        $array["waypoints"] = $result;
        return json_encode($array);
        //return $result;
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
