<?php
session_start();
require 'Database.php';
$point = new Database();

$id_user = $_SESSION['user']['id_user'];
$noidung = $_REQUEST['noidung'];
$id_chude = $_REQUEST['id_chude'];

$sql = "insert into binhluan(id_user, id_chude, noi_dung)
        values ('$id_user','$id_chude','$noidung')";
if(mysqli_query($point->conn, $sql)) {
    echo "<script>alert('Đăng bình luận thành công!')</script>";
}
else {
    echo "that bai";
}
