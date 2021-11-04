<?php
class createThreatModel extends Database {
    private $db;
    function __construct() {
        $this->db = new Database();
    }
    function getIDChuDe($user) {
        $sql = "select id_chude from chude
                where id_user = '$user'
                order by id_chude desc
                limit 1";
        if($rs = mysqli_query($this->db->conn, $sql)) {
            $id = mysqli_fetch_assoc($rs)['id_chude'];
            return $id;
        }
        else {
            return false;
        }
    }
    // thêm chủ đề mới
    function themChuDe($title, $content, $implodeDocument, $nameImplodeDocument) {
        $slug = $this->vn_to_str($title);
        $user = $_SESSION['user']['id_user'];
        if($_SESSION['user']['ten_quyen'] == "Sinh Viên") {
            $sql = "INSERT INTO `chude`(`id_chude`, `id_user`, `ten_chu_de`, `slug_chu_de`, `noi_dung`,
            `mang_tai_lieu`, `mang_ten_tai_lieu`, `ngay_dang`, `trang_thai`)
                    VALUES (null,$user,'$title','$slug','".$content."','$implodeDocument','$nameImplodeDocument',null,'0')";
        }
        else {
            $sql = "INSERT INTO `chude`(`id_chude`, `id_user`, `ten_chu_de`, `slug_chu_de`, `noi_dung`,
                                        `mang_tai_lieu`, `mang_ten_tai_lieu`, `ngay_dang`, `trang_thai`)
                    VALUES (null,$user,'$title','$slug','".$content."','$implodeDocument','$nameImplodeDocument',null,'1')";
        }
        
        if(mysqli_query($this->db->conn, $sql)) {
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
                    and phanquyen.id_quyen = 3
                    and thongbao.id_loaithongbao = 1";
                    
        if(mysqli_query($this->db->conn, $sqlCd)) {
            return true;
        }
        else {
            return false;
        }
    }
    function vn_to_str ($str){
 
        $unicode = array(
         
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
         
        'd'=>'đ',
         
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
         
        'i'=>'í|ì|ỉ|ĩ|ị',
         
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
         
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
         
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
         
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
         
        'D'=>'Đ',
         
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
         
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
         
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
         
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
         
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
         
        );
         
        foreach($unicode as $nonUnicode=>$uni){
         
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
         
        }
        $str = str_replace(' ','_',$str);
         
        return $str;
         
        }
}