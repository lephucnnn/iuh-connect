<?php
require '../Model/createThreadModel.php';

class createThread {
    function __construct() {
        require 'pages/createThreadView.php';
        require '../vendor/autoload.php';
        if(isset($_REQUEST['dang_chu_de'])) {
            $point = new createThreatModel();
            
            // lấy tiêu đề và nội dung của chủ đề
            $title = $_REQUEST['title'];
            $content = $_REQUEST['content'];
            $systemMangDocument = array();
            $nameMangDocument = array();
            // nếu có file đính kèm thì thực hiện upload file
            if(isset($_FILES['listFile'])) {
                $file = $this->reArrayFiles($_FILES['listFile']);
                $count = count($file);

                for($i = 0; $i < $count; $i++){
                    $file_tmp = $file[$i]['tmp_name'];
                    $file_name = $file[$i]['name'];
                    $file_name_array = explode(".", $file_name);
                    $extension = end($file_name_array);
                    $new_file_name = rand().'.'.$extension;
                    $allow_extension = array ("pdf","docx","doc","xls","xlsx","rar","zip","png","jpg");

                    if(in_array($extension, $allow_extension)) {
                        if(move_uploaded_file($file_tmp,"../Public/DocumentUpload/".$new_file_name)) {
                            $systemMangDocument[] = $new_file_name;
                            $nameMangDocument[] = $file_name;
                        }
                    }
                }
            }

            $systemImplodeDocument = implode(',',$systemMangDocument);
            $nameImplodeDocument = implode(',',$nameMangDocument);

            $point->themChuDe($title, $content, $systemImplodeDocument, $nameImplodeDocument);
            
            // them thong bao chu de
            $id_chude = $point->getIDChuDe($_SESSION['user']['id_user']);
            if(!$point->themThongBao($_SESSION['user']['id_lophoc'], $id_chude)) {
                echo "<script>alert('them thong bao that bai')</script>";
            }
            else {
                $app_id = '1287893';
                $app_key = '8284ad28a867466d3619';
                $app_secret = '92ef2255ae0e8b8e25ad';
                $app_cluster = 'ap1';
              
                $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);
                $pusher->trigger('request_thread', 'add_request_thread', "");
            }
        }
    }

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_ary;
    }
}