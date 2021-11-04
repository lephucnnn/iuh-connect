<?php
require '../Model/manageForumModel.php';

class manageForum {
    function __construct() {
        $lophoc = $_SESSION['user']['id_lophoc'];

        $point = new manageForumModel();
        $data = $point->getChuDeMoiTao($lophoc);
        require 'pages/manageForumView.php';
    }
}