<?php

    //$_FILES： 文件上传文件
    print_r($_FILES);

    $filename = $_FILES['myfile']['name'];
    $type  = $_FILES['myfile']['type'];
    $tmp_name = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $error = $_FILES['myfile']['error'];

    //将服务器上的临时文件移动指定目录下
    //copy($src, $dst):将文件拷贝到指定目录，拷贝成功返回true，否则返回false
    //copy($tmp_name, "uploads/".$filename);
    
    //move_uploaded_file($tmp_name, $destination):将服务器上的临时文件移动到指定目录下叫什么名字，移动成功返回true，否则返回false
    //move_uploaded_file($tmp_name, "uploads/".$filename);



?>
