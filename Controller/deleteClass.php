<?php
class DeleteClass {
    function __construct() {
        require("pages/updateClass.php");
        $id_lophoc = $_REQUEST['id'];
        $sql = "delete from lophoc where id_lophoc = '$id_lophoc' limit 1";
        $point = new Database;
        mysqli_query($point->conn, $sql);
        echo "<script>alert('Xóa lớp thành công')</script>";
    }
}
?>