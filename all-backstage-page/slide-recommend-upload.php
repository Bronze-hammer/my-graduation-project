<?php

    header('content-type:text/html;charset=utf8');

    $content_upload_time = date('Y-m-d H:i:s', time());

    $filename = $_FILES['myfile']['name'];
    $type  = $_FILES['myfile']['type'];
    $tmp_name = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $error = $_FILES['myfile']['error'];

    $content_title = $_POST['_content_title'];
    $content_abstract = $_POST['_content_abstract'];
    $content = $_POST['_content'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    if (!$conn) {
        die('error'.mysqli_error);
    }
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $insert_action = "insert into recommend_content_info (content_title, content_abstract, detail_content, content_time) values ('$content_title', '$content_abstract', '$content', '$content_upload_time')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result){
        echo 0;  //文章上传成功
    } else {
        echo 1;  //文章上传失败
    }
?>
