<?php
class manageForumModel extends Database{
    
    private $db;
    function __construct() {
        $this->db = new Database();
    }
    function getChuDeMoiTao($lophoc) {
        $sql = "select id_chude, user.ho_dem, user.ten, chude.ten_chu_de, chude.noi_dung, chude.ngay_dang
                from chude
                    join user on user.id_user = chude.id_user
                where user.id_lophoc = '$lophoc'
                    and trang_thai = 0
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

    function updateThread($id_chude, $trang_thai) {
        $sqlChude = "update chude
                    set trang_thai = $trang_thai
                    where chude.id_chude = '$id_chude'";

        if($rsChude = mysqli_query($this->db->conn, $sqlChude)) {
            return true;
        }
        else {
            return false;
        }
    }

    // thêm thông báo để thông báo cho các tài khoản khác ngoại trừ tài khoản giáo viên và tài khoản người tạo
    function themThongBao($id_lophoc, $id_chude) {
        $data = $id_chude . "/" . "0,";
        // tạo mảng thông báo có chủ đề mới
        $sqlCd = "UPDATE `thongbao`
                    JOIN user ON thongbao.id_user = user.id_user
                    JOIN phanquyen on phanquyen.id_user = user.id_user
                SET
                    `mang_id_thong_bao` = concat(`mang_id_thong_bao`,'$data')
                where user.id_lophoc = '$id_lophoc'
                    and phanquyen.id_quyen not in (1,3)
                    and thongbao.id_loaithongbao = 1";
        
        // tạo thông báo cho việc có bình luận mới
        $sqlBl = "UPDATE `thongbao`
                    JOIN user ON thongbao.id_user = user.id_user
                SET
                    `mang_id_thong_bao` = concat(`mang_id_thong_bao`,'$data')
                where user.id_lophoc = '$id_lophoc'
                    and thongbao.id_loaithongbao = 2";
                    
        if(mysqli_query($this->db->conn, $sqlCd)) {
            if(mysqli_query($this->db->conn, $sqlBl)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}