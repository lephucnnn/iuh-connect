<?php
session_start();
require 'Database.php';
$point = new Database();

$data = $_REQUEST['danhsach'];
$pieces = explode(",", $data);
$count = count($pieces) - 1;
$danhSachChuaXem = [];

//Kiểm tra mảng data nhận được, nếu có thông báo nào mới mà chưa xem == 0,
//  thì gán vào mảng danh sách chưa xem
for ($i = 0; $i < $count; $i++) {
    $tachMang = explode("/",$pieces[$i]);
    if($tachMang[1] == 0) {
        $danhSachChuaXem[] = $tachMang[0];
    }
}

// kiểm tra danh sách chưa xem đã có phần tử nào không, nếu không thì gán null để thông báo
// không có thông báo mới
if(count($danhSachChuaXem) != 0) {
    $implodedDanhSach = implode(",", $danhSachChuaXem);
}
else {
    $implodedDanhSach = 'null';
}

// lấy tên của chủ đề ra để làm thông báo
$sql = "select ten_chu_de from chude where id_chude in ($implodedDanhSach)";
$rs = mysqli_query($point->conn, $sql);
$num = mysqli_num_rows($rs);
if($_SESSION['user']['ten_quyen'] == "Sinh Viên") {
    if($num > 0) {
        while($row = mysqli_fetch_assoc($rs)) {
            $danhsach[] = $row['ten_chu_de'];
        }
        for($i = 0; $i < count($danhSachChuaXem); $i++) {
            echo '<a href="?controller=detailForum&id_chude='.$danhSachChuaXem[$i].'" onclick="checkNotiThread('.$danhSachChuaXem[$i].',\''.$data.'\')">
                    <li>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">'
                                .$danhsach[$i].
                            '</div>
                        </div>
                    </li>
                </a>';
        }
    }
    else {
        echo 'Không có thông báo mới';
    }
}
else if($_SESSION['user']['ten_quyen'] == "Giảng Viên") {
    if($num > 0) {
        while($row = mysqli_fetch_assoc($rs)) {
            $danhsach[] = $row['ten_chu_de'];
        }
        for($i = 0; $i < count($danhSachChuaXem); $i++) {
            echo '<a href="?controller=detailManageForum&id_chude='.$danhSachChuaXem[$i].'" onclick="checkNotiThread('.$danhSachChuaXem[$i].',\''.$data.'\')">
                    <li>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">'
                                .$danhsach[$i].
                            '</div>
                        </div>
                    </li>
                </a>';
        }
    }
    else {
        echo 'Không có thông báo mới';
    }
}