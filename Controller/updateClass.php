<?php
require '../Model/classModel.php';
// require '../Model/Database.php';
class updateClass {
    function __construct() {
        $id_lophoc = $_REQUEST['id'];
        $p = new ClassModel();

        $data = $p->getClass($id_lophoc);
        if($data == false) {
            echo "<script>alert('that bai')</script>";
        }
        require("pages/updateClass.php");

        if(isset($_REQUEST['luu'])) {
            $id_lophoc = $_REQUEST['id'];
            $ten_lop = $_REQUEST['ten_lop'];
            $nien_khoa = $_REQUEST['nien_khoa'];
            $p->updateClass($id_lophoc,$ten_lop,$nien_khoa);
            echo "<script>alert('Chỉnh sửa thành công')</script>";
        }
    }
}
?>