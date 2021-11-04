<?php
session_start();
require 'Database.php';

$point = new Database();
$conn = $point->conn;

$sql = "SELECT * FROM `user`
        WHERE id_lophoc = {$_SESSION['user']['id_lophoc']}
        and id_user != {$_SESSION['user']['id_user']}";
$rs = mysqli_query($conn, $sql);

echo '
        <li class="clearfix choose" data-arg1="0" onclick="modifyState(0)">
        <div class="about">
            <div class="name">Nhóm lớp</div>
            <div class="status"> <i class="fa fa-circle online"></i></div>                                            
        </div>
        </li>
        ';
while($row = mysqli_fetch_assoc($rs)) {
    echo '<li class="clearfix choose" onclick="modifyState('.$row['id_user'].')">
                <div class="about">
                    <div class="name">'.$row['ho_dem'].'&nbsp'.$row['ten'].'</div>
                    <div class="status">';
                    if($row['trang_thai_online'] == 1) {
                        echo '<i class="fa fa-circle online"></i> online';
                    }
                    else {
                        echo '<i class="fa fa-circle offline"></i> offline';
                    }
                echo'</div>                                            
                </div>
            </li>';
}