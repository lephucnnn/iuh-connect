<?php
class listStudentModel extends Database {
    private $db;
    function __construct(){
        $this->db = new Database();
    }

    function infoStudent($id_lophoc) {
        $sql = "select * from thongtinhoctap
                join user on user.id_user = thongtinhoctap.id_user
                where user.id_lophoc = $id_lophoc";
        $rs= mysqli_query($this->db->conn, $sql);
        $num = mysqli_num_rows($rs);
        $i=0;
        if($num > 0) {
            while($row = mysqli_fetch_assoc($rs)){
                $i++;
                $data[$i] = $row;
            }
        }
        else {
            $data = array();
        }
        return $data;
    }

    function infoStudy($id) {
        $sql = "select * from thongtinhoctap where id_user = $id";
        $rs= mysqli_query($this->db->conn, $sql);
        $num = mysqli_num_rows($rs);
        if($num > 0) {
            $data = mysqli_fetch_assoc($rs);
        }
        else {
            $data = false;
        }
        return $data;
    }

    function infoUpdate($id) {
        $sql = "select * from thongtinhoctap where id_thongtinhoctap = $id";
        $rs= mysqli_query($this->db->conn, $sql);
        $num = mysqli_num_rows($rs);
        if($num > 0) {
            $data = mysqli_fetch_assoc($rs);
        }
        else {
            $data = false;
        }
        return $data;
    }

    function updateStudy($id,$mssv,$he4,$he10,$tongtc,$dahoc,$toeic,$xep_loai){
        $sql = "update thongtinhoctap set 
                mssv = '$mssv',
                diem_tich_luy_4 = '$he4',
                diem_tich_luy_10 = '$he10',
                tong_sotc = '$tongtc',
                sotc_da_hoc = '$dahoc',
                toeic = '$toeic',
                xep_loai = '$xep_loai'
                where id_thongtinhoctap = '$id'";
        mysqli_query($this->db->conn, $sql);
    }
}
?>