<?php
require '../Model/userModel.php';
require '../Model/listStudentModel.php';

class detailStudent {
    function __construct() {
        $p_user = new UserModel();
        $p_study = new listStudentModel();

        $id_user = $_REQUEST['id_user'];
        $user = $p_user->getUser($id_user);
        $study = $p_study->infoStudy($id_user);

        require '../View/pages/detailStudentView.php';
    }
}
?>