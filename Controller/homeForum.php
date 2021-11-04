<?php
require '../Model/homeForumModel.php';

class homeForum {
    function __construct() {
        $lophoc = $_SESSION['user']['id_lophoc'];

        $point = new homeForumModel();
        $data = $point->getChuDe($lophoc);
        require 'pages/home.php';
    }
}