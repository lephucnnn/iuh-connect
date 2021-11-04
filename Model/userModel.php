<?php
class UserModel extends Database {
    private $db;
    function __construct(){
        $this->db = new Database();
    }
    
    function getUser($id) {
        $sql = "select * from user where id_user = $id";
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
}
?>