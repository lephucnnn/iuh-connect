<?php
session_start();
require 'Database.php';
$point = new Database();
$lophoc = $_SESSION['user']['id_lophoc'];

$sql = "select id_chude, user.ho_dem, user.ten, chude.ten_chu_de, chude.noi_dung, chude.ngay_dang
        from chude
            join user on user.id_user = chude.id_user
        where user.id_lophoc = '$lophoc'
            and trang_thai = 1
        order by chude.ngay_dang desc";
if($rs = mysqli_query($point->conn, $sql)) {
    while($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row;
    }
    foreach ($data as $bv) {
        echo '<a href="?controller=detailForum&id_chude='.$bv['id_chude'].'">
                    <div class="col-lg-12 panel">
                        <span style="color:blue; font-size: 25px">'.$bv['ten_chu_de'].'</span><hr>
                        <p>Được tạo bởi: <span style="color: black;">'. $bv['ho_dem'] ." ". $bv['ten'] .'</span></p>
                        <p>Thời gian: '.$bv['ngay_dang'].'</p>
                    </div>
                </a>';
    }
}
else {
    echo "that bai";
}