<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ithaax_testdata";
// username = ithaax_testdata , pass = test123data
// Local: username = root, pass = ""
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = "INSERT INTO waypoints VALUES ";
$array = json_decode($_POST['json']);
$waypointLat = 0;
$waypointLng = 0;

if (!empty($array)){
    foreach ($array as $key => $value){ //ENTRIES: [0][1]...
        foreach($value as $key2 => $value2){ //ENTRY: KEY ID, KEY POSITION
            //$stmt.="[".$key2."]:";
            if (is_array($value2) || is_object($value2)){
                foreach($value2 as $variable => $varvalue){ //POSITION: KEY LANG, KEY LAT
                    if ($variable == "longitude"){
                        $waypointLng = $varvalue;
                    }
                    if ($variable == "latitude"){
                        $waypointLat = $varvalue;
                    }
                }
            }
            if ($key2 == "id"){
                $waypointId = $value2;
            }
        }
    }
    $stmt.="(".$waypointId.",".$waypointLat.",".$waypointLng.",15,0);";
}

try {
    //$stmt = substr($stmt, 0, strlen($stmt)-1);
    $conn->query($stmt);
    //$message = $conn->query("SELECT * FROM waypoints;");
    echo $stmt;
    //echo $message;
} catch (PDOException $e) {
    die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
    echo "ERROR IN SQL STATEMENT";
}

//"INSERT INTO TABLE_NAME VALUES (value1,value2,value3,...valueN);"
//INSERT INTO waypoints VALUES ($id_waypoint, $longitude, $latutude, $radius, $harvested)

?>
