<?php
session_start();
require 'Database.php';
$point = new Database();

$id_user = $_SESSION['user']['id_user'];
$id_chude = $_REQUEST['id_chude'];
$data = $_REQUEST['data'];

$pieces = explode(",", $data);
$count = count($pieces) - 1;
$newData = null;
for ($i = 0; $i < $count; $i++) {
    $tachMang = explode("/",$pieces[$i]);
    if($tachMang[0] == $id_chude) {
        $tachMang[1] = 0;
    }
    $newData = $newData.$tachMang[0]."/".$tachMang[1].",";
}

$sql = "UPDATE `thongbao` SET
            mang_id_thong_bao = '$newData'
        where id_user = '$id_user'
            and id_loaithongbao = 2";
mysqli_query($point->conn, $sql);