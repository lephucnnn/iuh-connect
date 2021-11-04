<?php

$folder = "../Public/upload/";
reset($_FILES);
$temp = current($_FILES);

$file_name_array = explode(".", $temp['name']);
$extension = end($file_name_array);
$new_image_name = rand().'.'.$extension;

$filetowrite = $folder.$new_image_name;

$allow_extension = array ("jpg","png","gif");
if(in_array($extension,$allow_extension)) {
    move_uploaded_file($temp['tmp_name'],$filetowrite);

    echo json_encode(array('location' => $filetowrite));
}
else {
    echo "<script>alert('Chỉ được upload file .jpg .png .gif')</script>";
}