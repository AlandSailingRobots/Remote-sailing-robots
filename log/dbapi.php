<?php

require('dbconnection.php');
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$table = $_SESSION['table'];
switch ($_REQUEST['action']) {
	case 'getAll':
		$tables = getAll($id,$name, $table);
		echo json_encode($tables);
		break;
	default:
		echo "!!! CONNY W T F !!!";
		break;
}
?>
