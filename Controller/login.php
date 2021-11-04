<?php
require 'Model/Database.php';
require 'Model/loginModel.php';

class login {
    function __construct($username, $password) {
        $point = new loginModel($username, $password);
        if($point->check) {
            $quyen = $_SESSION['user']['ten_quyen'];
            if($quyen == 'Admin') {
                header("location:View/admin");
            }
            else if($quyen == 'Sinh Viên') {
                header("location:View");
            }
            else if($quyen == 'Giảng Viên') {
                header("location:View");
            }
        }
    }
}