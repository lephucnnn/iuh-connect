<?php
require '../Model/classModel.php';
class listClass {
    function __construct() {
        $p = new ClassModel();
        $data = $p->allClass();
        if($data == false) {
            echo "<script>alert('that bai')</script>";
        }
        require("pages/listClass.php");
    }
}
?>