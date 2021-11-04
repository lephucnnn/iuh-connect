<?php
class homeForumModel extends Database{
    
    private $db;
    function __construct() {
        $this->db = new Database();
    }
    function getChuDe($lophoc) {
        $sql = "select id_chude, user.ho_dem, user.ten, chude.ten_chu_de, chude.noi_dung, chude.ngay_dang
                from chude
                    join user on user.id_user = chude.id_user
                where user.id_lophoc = '$lophoc'
                    and trang_thai = 1
                order by chude.ngay_dang desc";
        if($rs = mysqli_query($this->db->conn, $sql)) {
            while($row = mysqli_fetch_assoc($rs)) {
                $data[] = $row;
            }
            return $data;
        }
        else {
            return false;
        }
    }
}