<?php
class createClass {
    function __construct() {
        require 'pages/createClassView.php';
        if(isset($_REQUEST['luu'])) {
            $sql = "INSERT INTO `lophoc`(`id_lophoc`, `ten_lop`, `nien_khoa`) VALUES 
            (null,'".$_REQUEST['ten_lop']."','".$_REQUEST['nien_khoa']."')";
            $point = new Database;
            mysqli_query($point->conn, $sql);
            echo "<script>alert('Thêm lớp thành công')</script>";
        }
    }
}