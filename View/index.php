<?php
	session_start();
	// kiem tra session
	if(!isset($_SESSION['user'])) {
		header("location:../index.php");
	}
	else {
		if($_SESSION['user']['ten_quyen'] != "Giảng Viên" && $_SESSION['user']['ten_quyen'] != "Sinh Viên") {
			header("location:../index.php");
		}
	}
	require('../Model/Database.php');
	require('layout/header.php');
	$db = new Database();
	if(isset($_REQUEST['file'])) {
		require '../Controller/downloadThread.php';
	}
	else {
		
		require('layout/aside.php');
	
		if (isset($_GET['controller'])) {
			require '../Route/web.php';
		}
		else {
			require '../Controller/homeForum.php';
			$point = new homeForum();
		}
		require('layout/footer.php');
	}
	$db->closeDatabase();
?>