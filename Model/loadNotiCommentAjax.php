<?php
session_start();
require 'Database.php';
$point = new Database();

$data = $_REQUEST['danhsach'];
$pieces = explode(",", $data);
$count = count($pieces) - 1;
$danhSachChuaXem = [];
$soCommentChuaXem = [];

//Kiểm tra mảng data nhận được, nếu có comment nào mới mà chưa xem => lớn hơn 0
//  thì gán vào mảng danh sách chưa xem
// và số comment chưa xem
for ($i = 0; $i < $count; $i++) {
    $tachMang = explode("/",$pieces[$i]);
    if($tachMang[1] != 0) {
        $danhSachChuaXem[] = $tachMang[0];
        $soCommentChuaXem[] = $tachMang[1];
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

if($num > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $danhsach[] = $row['ten_chu_de'];
    }
    for($i = 0; $i < count($danhSachChuaXem); $i++) {
        echo '<li>
                <a href="?controller=detailForum&id_chude='.$danhSachChuaXem[$i].'" onclick="checkNotiComment('.$danhSachChuaXem[$i].',\''.$data.'\')">
                    <div class="task-info clearfix">
                        <div class="desc pull-left">
                            <h5> Chủ đề: '.$danhsach[$i].'</h5>
                            <p>'.$soCommentChuaXem[$i].' lượt bình luận chưa xem</p>
                        </div>
                                <span class="notification-pie-chart pull-right" data-percent="45">
                        <span class="percent"></span>
                        </span>
                    </div>
                </a>
            </li>';
    }
}
else {
    echo 'Không có thông báo mới';
}