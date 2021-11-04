<?php
require '../Model/detailForumModel.php';
require '../Controller/createThread.php';
class detailForum extends createThread {
    function __construct() {
        
        $point = new detailForumModel();
        $id_chude = $_REQUEST['id_chude'];
        
        if(isset($_REQUEST['page']) && $_REQUEST['page'] != 1) {
            $page = $_REQUEST['page'];

            $thread = $point->getThread($id_chude);
            $systemMangDocument = explode(',',$thread['mang_tai_lieu']);
            $nameMangDocument = explode(',',$thread['mang_ten_tai_lieu']);

            $data = $point->getBinhluan($id_chude);
        }
        else {
            $thread = $point->getThread($id_chude);
            $systemMangDocument = explode(',',$thread['mang_tai_lieu']);
            $nameMangDocument = explode(',',$thread['mang_ten_tai_lieu']);

            $data = $point->getBinhluan($id_chude);
        }

        require 'pages/detailForumView.php';
    }
    
}