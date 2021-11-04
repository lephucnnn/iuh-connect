<?php
session_start();
require 'Database.php';

$point = new Database();
$conn = $point->conn;

$message = $_REQUEST['message'];
$id_user_send = $_SESSION['user']['id_user'];
$id_user_receive = $_REQUEST['id_user_receive'];
if($message != null) {
        $sql = "INSERT INTO `trochuyen`(`id_trochuyen`, `id_user_send`, `id_user_receive`, `noi_dung`) 
        VALUES (null,'$id_user_send','$id_user_receive','$message') ";
        mysqli_query($conn, $sql);
}
