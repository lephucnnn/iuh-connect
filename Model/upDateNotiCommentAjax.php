<?php
session_start();
require 'Database.php';
$point = new Database();

$id_lophoc = $_SESSION['user']['id_lophoc'];
$id_user = $_SESSION['user']['id_user'];
$id_chude = $_REQUEST['id_chude'];

$data = $id_chude . "/" . "0,";
$sql_thongbao = "select thongbao.id_user, thongbao.mang_id_thong_bao
                from thongbao
                    join user on user.id_user = thongbao.id_user
                where user.id_lophoc = '$id_lophoc'
                    and thongbao.id_loaithongbao = 2
                    and user.id_user != '$id_user'";
$rs_thongbao = mysqli_query($point->conn, $sql_thongbao);

while($row = mysqli_fetch_assoc($rs_thongbao)) {
    $data = '';
    $explodeComma = explode(",", $row['mang_id_thong_bao']);
    $count = count($explodeComma) - 1;

    for($i = 0; $i < $count; $i++) {
        $explodeSlash = explode("/", $explodeComma[$i]);
        if($explodeSlash[0] == $id_chude) {
            $explodeSlash[1] += 1;
        }
        $data .= $explodeSlash[0]."/".$explodeSlash[1].",";
    }

    $sql = "UPDATE `thongbao`
                JOIN user ON thongbao.id_user = user.id_user
            SET
                `mang_id_thong_bao` = '$data'
            where user.id_lophoc = '$id_lophoc'
                and user.id_user != '$id_user'
                and thongbao.id_loaithongbao = 2";
    if(mysqli_query($point->conn, $sql)) {
        echo "thanh cong updateNoticomment: ".$data;
    }
    else {
        echo "that bai trong viec updateNotiComment";
    }
}
