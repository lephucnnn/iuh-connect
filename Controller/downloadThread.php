<?php
$file = basename($_GET['file']);
$filename = basename($_GET['filename']);
$file_dir = '../Public/DocumentUpload/'.$file;

if(!file_exists($file_dir)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file_dir);
}