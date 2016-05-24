<?php
session_start();
require('dbconnection.php');

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$table = $_SESSION['table'];
$number = $_SESSION['number'];
switch ($_REQUEST['action']) {
	case 'getAll':
		$tables = getAll($id,$name, $table);
		echo json_encode($tables);
		break;
	case 'getRoute':
		$tables = getRoute($id);
		echo json_encode($tables);
		break;
	default:
		echo "!!! CONNY W T F !!!";
		break;
}

?>
