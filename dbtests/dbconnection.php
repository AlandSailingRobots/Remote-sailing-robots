<?php

function dbConn() {
	//	username: ithaax_testdata & pass: test123data
	$userName = "root";
	$passWord = "";
	$conn = new PDO('mysql:host=localhost;dbname=ithaax_testdata',$userName, $passWord);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $conn;
}
function getPerPage(){
	$perpage = 50;
	return $perpage;
}

function getPages($table) {
	$conn = dbConn();
	$total  = $conn->query("SELECT COUNT(*) as rows FROM $table") ->fetch(PDO::FETCH_OBJ);
	$perpage = getPerPage();
	$posts  = $total->rows;
	$pages  = ceil($posts / $perpage);
	return $pages;
}

function getNumber() {
	# default
	$pages = 0;
	$get_pages = isset($_GET['page']) ? $_GET['page'] : 1;
	$data = array(

		'options' => array(
			'default'   => 1,
			'min_range' => 1,
			'max_range' => $pages
			)
	);

	$number = trim($get_pages);
	$number = filter_var($number, FILTER_VALIDATE_INT, $data);
	return $number;
}

function getNext(){
	$number = getNumber();
	$next = $number + 1;
	return $next;
}

function getPrev(){
	$number = getNumber();
	$prev = $number - 1;
	return $prev;
}



function getData($table){
	$conn = dbConn();
	try {
		$pages = getPages($table);
		$perpage = getPerPage();
		$number = getNumber();
		$range  = $perpage * ($number - 1);
    $stmt = $conn->prepare("SELECT * FROM $table LIMIT :limit, :perpage;");

		$stmt->bindParam(':perpage', $perpage, PDO::PARAM_INT);
		$stmt->bindParam(':limit', $range, PDO::PARAM_INT);
		$stmt->execute();

		$result = $stmt->fetchAll();

	} catch(PDOException $e) {
		$error = $e->getMessage();
	}

	$conn = null;
	return $result;
}


/*
function getAll(){
	$conn = dbConn();
	try {
		$pages = getGpsPages();
		$perpage = getPerPage();
		$number = getNumber();
		$range  = $perpage * ($number - 1);

    $stmt = $conn->prepare("SELECT * FROM system_dataLogs
            JOIN gps_dataLogs
            ON system_dataLogs.id_system=gps_dataLogs.id_gps
            JOIN course_calculation_dataLogs
            ON system_dataLogs.id_system=course_calculation_dataLogs.id_course_calculation
            JOIN windsensor_dataLogs
            ON system_dataLogs.id_system=windsensor_dataLogs.id_windsensor
            JOIN compass_dataLogs
            ON system_dataLogs.id_system=compass_dataLogs.id_compass_model
            LIMIT :limit, :perpage;");

		$stmt->bindParam(':perpage', $perpage, PDO::PARAM_INT);
		$stmt->bindParam(':limit', $range, PDO::PARAM_INT);
		$stmt->execute();

		$result = $stmt->fetchAll();

	} catch(PDOException $e) {
		$error = $e->getMessage();
	}

	$conn = null;
	return $result;
}*/

?>
