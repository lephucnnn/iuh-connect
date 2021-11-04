<?php
require '../Model/listStudentModel.php';

class listAccount {
    function __construct() {
        $point = new listStudentModel();
        $id_lophoc = $_REQUEST['id_lophoc'];
        $data = $point->infoStudent($id_lophoc);
        require 'pages/listAccountView.php';
    }
}