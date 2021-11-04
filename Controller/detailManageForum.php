<?php
require '../Model/manageForumModel.php';
class detailManageForum {
    function __construct() {
        require '../vendor/autoload.php';
        $point = new manageForumModel();
        $id_chude = $_REQUEST['id_chude'];
        $id_lophoc = $_SESSION['user']['id_lophoc'];
        
        if(isset($_REQUEST['page']) && $_REQUEST['page'] != 1) {
            $page = $_REQUEST['page'];

            $thread = $point->getThread($id_chude);
            $systemMangDocument = explode(',',$thread['mang_tai_lieu']);
            $nameMangDocument = explode(',',$thread['mang_ten_tai_lieu']);
        }
        else {
            $thread = $point->getThread($id_chude);
            $systemMangDocument = explode(',',$thread['mang_tai_lieu']);
            $nameMangDocument = explode(',',$thread['mang_ten_tai_lieu']);
        }

        if(isset($_REQUEST['browseThread'])) {
            $point->updateThread($id_chude, 1);
            if($point->themThongBao($id_lophoc, $id_chude)) {
                $app_id = '1287893';
                $app_key = '8284ad28a867466d3619';
                $app_secret = '92ef2255ae0e8b8e25ad';
                $app_cluster = 'ap1';
              
                $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);
                $pusher->trigger('demo_pusher', 'add_student', "");
            }
            echo"<script>window.location.href='index.php?controller=manageForum'</script>";
        }
        else if(isset($_REQUEST['cancleThread'])) {
            $point->updateThread($id_chude, 2);
            echo"<script>window.location.href='index.php?controller=manageForum'</script>";
        }

        require 'pages/detailManageForumView.php';
    }
    
}