<?php

	session_start();
	
	require_once "functions.php";

	$model = new Model();
	$model->notify($_REQUEST);

	require_once "renders.php";

	$view = new View($model);
	$view->render();  

?>