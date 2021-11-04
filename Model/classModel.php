<?php
class ClassModel extends Database {
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    
    function allClass() {
        $sql = "select * from lophoc";
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
            $data = false;
        }
        return $data;
    }

    function getClass($id) {
        $sql = "select * from lophoc where id_lophoc = $id";
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
    function updateClass($id_lophoc,$ten_lop,$nien_khoa) {
        $sql = "update lophoc set 
                    ten_lop = '$ten_lop',
                    nien_khoa = '$nien_khoa'
                where id_lophoc = '$id_lophoc'";
        mysqli_query($this->db->conn, $sql);
    }
}
?>