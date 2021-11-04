<?php
session_start();
require 'Database.php';
$point = new Database();
$lophoc = $_SESSION['user']['id_lophoc'];
$id_chude = $_REQUEST['id_chude'];

$sql = "select binhluan.noi_dung, binhluan.ngay_dang_binh_luan, user.ho_dem, user.ten, user.username,
                        phanquyen.id_quyen
                from binhluan 
                    join user on binhluan.id_user = user.id_user
                    join chude on chude.id_chude = binhluan.id_chude
                    join phanquyen on phanquyen.id_user = user.id_user
                where binhluan.id_chude = '$id_chude'
                ORDER by binhluan.ngay_dang_binh_luan";

$rs = mysqli_query($point->conn, $sql);
$num = mysqli_num_rows($rs);
if($num > 0) {
    while($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row;
    }
    foreach ($data as $bl) {
        echo '<tr>
              <td style="width: 200px">';
                  if($bl['id_quyen'] == 3) {
                    echo "<p><b><span style='color: red;'>".$bl['ho_dem'] . " " . $bl['ten']."</span></b></p>";
                    echo "<p>Giảng viên</p>";
                  }
                  else {
                    echo "<p><b>".$bl['ho_dem'] . " " . $bl['ten']."</b></p>";
                    echo "<p>".$bl['username']."</p>";
                  }
        echo '<br><p>'.$bl['ngay_dang_binh_luan'].'</p>
              </td>
              <td style="height:auto; max-width: 100px">
                <div style="width: 100%; min-height:auto; max-height:300px; overflow-x:auto; overflow-y:auto">
                  <span style="color:black">
                    <p>'.$bl['noi_dung'].'</p>
                  <span style="color:black">
                </div>
              </td>
          </tr>';
    }
    
}