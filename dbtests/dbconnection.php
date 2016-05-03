<?php

	try {
    //	username: ithaax_testdata & pass: test123data
    $userName = "root";
    $passWord = "";
		$conn = new PDO('mysql:host=localhost;dbname=ithaax_testdata',$userName, $passWord);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$total  = $conn->query("SELECT COUNT(*) as rows FROM system_dataLogs") ->fetch(PDO::FETCH_OBJ);

		$perpage = 50;
		$posts  = $total->rows;
		$pages  = ceil($posts / $perpage);
		# default
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
		$range  = $perpage * ($number - 1);

		$prev = $number - 1;
		$next = $number + 1;


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

?>
