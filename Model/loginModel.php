<?php
class loginModel {
    public $check;
    function __construct($username, $password) {
        $MD5_password = md5($password);
        $sql = "select user.id_user, lophoc.id_lophoc, quyen.ten_quyen, user.ho_dem, user.ten
                from user
                    inner join lophoc on user.id_lophoc = lophoc.id_lophoc
                    inner join phanquyen on user.id_user = phanquyen.id_user
                    inner join quyen on quyen.id_quyen = phanquyen.id_quyen
                where user.username = '$username' and
                    user.password = '$MD5_password'";
        $point = new Database;
        $rs= mysqli_query($point->conn, $sql);
        $num = mysqli_num_rows($rs);
        if($num != 0) {
            $row = mysqli_fetch_assoc($rs);
            $_SESSION['user'] = array(
                'id_user' => $row['id_user'],
                'ho_dem' => $row['ho_dem'],
                'ten' => $row['ten'],
                'id_lophoc' => $row['id_lophoc'],
                'ten_quyen' => $row['ten_quyen']
            );
            $this->check = true;

            $sql_online = "update user
                            set trang_thai_online = 1
                            where id_user = ".$row['id_user'];
            mysqli_query($point->conn, $sql_online);
            header('location:index.php');
        }
        else {
            $this->check = false;
        }
    }
}