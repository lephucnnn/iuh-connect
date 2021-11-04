<?php
session_start();
require 'Database.php';

$point = new Database();
$conn = $point->conn;

$username = $_REQUEST['username'];
$password = 123456;
$sql = "update user
        set password = md5('$password')
        where username = '$username'";
if(mysqli_query($conn, $sql)) {
    echo true;
}
else {
    echo false;
}