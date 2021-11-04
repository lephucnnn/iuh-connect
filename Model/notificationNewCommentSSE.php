<?php
session_start();
require 'Database.php';
$point = new Database();
$id_user = $_SESSION['user']['id_user'];

// lấy mảng id thông báo trong thông báo của user đang dùng
$sql = "select mang_id_thong_bao
        from thongbao
        where id_user = '$id_user'
            and id_loaithongbao = 2";

$rs = mysqli_query($point->conn, $sql);
$num = mysqli_num_rows($rs);
$data = mysqli_fetch_assoc($rs)['mang_id_thong_bao'];

$pieces = explode(",", $data);
$count = count($pieces) - 1;

// tạo 2 biến chưa xem và đã xem để duyệt mảng thông báo
// cái nào chưa xem để hiển thị số thông báo chưa xem.
$chuaxem = 0;
for ($i = 0; $i < $count; $i++) {
    $tachMang = explode("/",$pieces[$i]);
    if($tachMang[1] != 0) {
        $chuaxem += $tachMang[1];
    }
}

// SSE gửi dữ liệu đến client
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

if($num > 0) {
    echo "id: ".$chuaxem."\n";
    echo "retry 500\n";
    echo "data: $data\n\n";
}
flush();