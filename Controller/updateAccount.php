<?php
require '../Model/userModel.php';
require '../Model/classModel.php';

class updateAccount {
    function __construct() {
        $id_user = $_REQUEST['id'];
        $p = new UserModel();
        $pointClass = new ClassModel();

        //lay toan bo lop hoc
        $mangClass = $pointClass->allClass();

        $data = $p->getUser($id_user);
        if($data == false) {
            echo "<script>alert('that bai')</script>";
        }
        require("pages/updateAccount.php");

        if(isset($_REQUEST['luu'])) {
            if($_REQUEST['password'] != null) {
                $sql = "update user set 
                    ho_dem = '".$_REQUEST['ho_dem']."',
                    ten = '".$_REQUEST['ten']."', 
                    gioi_tinh = '".$_REQUEST['gioi_tinh']."', 
                    ngay_sinh = '".$_REQUEST['ngay_sinh']."',
                    email = '".$_REQUEST['email']."',
                    sdt = '".$_REQUEST['sdt']."',
                    password = '".md5($_REQUEST['password'])."'
                    where id_user = ".$_REQUEST['id']."";
            }
            else {
                $sql = "update user set 
                    ho_dem = '".$_REQUEST['ho_dem']."',
                    ten = '".$_REQUEST['ten']."', 
                    gioi_tinh = '".$_REQUEST['gioi_tinh']."', 
                    ngay_sinh = '".$_REQUEST['ngay_sinh']."',
                    email = '".$_REQUEST['email']."',
                    sdt = '".$_REQUEST['sdt']."'
                    where id_user = ".$_REQUEST['id']."";
            }
                    
            $point = new Database;
            mysqli_query($point->conn, $sql);
            echo "<script>window.location.href='?controller=profileAccount&id=$id_user'</script>";
        }
    }
}
?>