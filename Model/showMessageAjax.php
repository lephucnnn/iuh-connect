<?php
session_start();
require 'Database.php';

$point = new Database();
$conn = $point->conn;
$id_user_receive = $_REQUEST['id_user_receive'];
$id_user_send = $_SESSION['user']['id_user'];
$id_both = $id_user_send.",".$id_user_receive;
$sql = "select * from trochuyen
        where id_user_send in ({$id_both})
            and id_user_receive in ({$id_both})
            order by ngay_dang asc";
$rs = mysqli_query($conn, $sql);
$num = mysqli_num_rows($rs);
while($row = mysqli_fetch_assoc($rs)) {
    if($row['id_user_send'] == $id_user_send) {
        echo '<li class="clearfix">
                <div class="message-data text-right">
                    <span class="message-data-time">'.$row['ngay_dang'].'</span>
                </div>
                <div class="message other-message float-right"> '.$row['noi_dung'].' </div>
            </li>';
    }
    else {
        echo '<li class="clearfix">
                <div class="message-data">
                    <span class="message-data-time">'.$row['ngay_dang'].'</span>
                </div>
                <div class="message my-message"> '.$row['noi_dung'].' </div>                                    
            </li>';
    }
}
if($num == 0) {
    echo '<li class="clearfix">
            <div class="message other-message float-right"> Hãy bắt đầu đoạn chat </div>
        </li>';
}
echo '<input type="hidden" name="" id="id_user_receive" value="'.$id_user_receive.'">';