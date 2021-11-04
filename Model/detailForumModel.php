<?php
class detailForumModel extends Database{
    
    private $db;
    function __construct() {
        $this->db = new Database();
    }
    function getThread($id_chude) {
        $sqlChude = "select phanquyen.id_quyen,user.username, user.ho_dem, user.ten, chude.ten_chu_de,
                             chude.mang_tai_lieu, chude.mang_ten_tai_lieu, chude.noi_dung, chude.ngay_dang
                        from chude
                            join user on user.id_user = chude.id_user
                            join phanquyen on user.id_user = phanquyen.id_user
                        where chude.id_chude = '$id_chude'";

        if($rsChude = mysqli_query($this->db->conn, $sqlChude)) {
            $thread = mysqli_fetch_assoc($rsChude);
            return $thread;
        }
        else {
            return false;
        }
    }

    function getBinhluan($id_chude) {
        $sql = "select binhluan.noi_dung, binhluan.ngay_dang_binh_luan, user.ho_dem, user.ten, user.username,
                        phanquyen.id_quyen
                from binhluan 
                    join user on binhluan.id_user = user.id_user
                    join chude on chude.id_chude = binhluan.id_chude
                    join phanquyen on phanquyen.id_user = user.id_user
                where binhluan.id_chude = $id_chude
                ORDER by binhluan.ngay_dang_binh_luan";
        
        if($rs = mysqli_query($this->db->conn, $sql)) {
            if(mysqli_num_rows($rs) > 0) {
                while($row = mysqli_fetch_assoc($rs)) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
        else {
            return false;
        }
    }
}