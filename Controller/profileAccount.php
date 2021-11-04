<?php
require '../Model/userModel.php';
require '../Model/classModel.php';
require '../Model/listStudentModel.php';
class profileAccount {
    function __construct() {
        $id_user = $_REQUEST['id'];
        $p = new UserModel();
        $po = new ClassModel();
        $st = new listStudentModel();

        $info = $st->infoStudy($id_user);
        $data = $p->getUser($id_user);
        $class = $po->getClass($_SESSION['user']['id_lophoc']);
        if($data == false) {
            echo "<script>alert('that bai')</script>";
        }
        require 'pages/profileAccount.php';
    }
}
?>