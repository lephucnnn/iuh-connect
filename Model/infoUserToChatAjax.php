<?php
session_start();
require 'Database.php';

$point = new Database();
$conn = $point->conn;
$id_user_receive = $_REQUEST['id_user_receive'];

if($id_user_receive != 0) {
$sql = "select ho_dem, ten from user
        where id_user = {$id_user_receive}";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs);

echo '<h6 class="m-b-0">'.$row['ho_dem']."&nbsp".$row['ten'].'</h6>';
}
else {
    echo '<h6 class="m-b-0">Nhóm lớp</h6>';
}
