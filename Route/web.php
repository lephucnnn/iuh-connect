<?php
    $controller = $_GET['controller'];
	if($_SESSION['user']['ten_quyen'] == "Admin"){
		require('../Controller/admin/' . $controller . '.php');
	}
	else{
		require('../Controller/' . $controller . '.php');
	}
	$request = new $controller;
?>