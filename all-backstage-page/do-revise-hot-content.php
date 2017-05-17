<?php

    header('content-type:text/html;charset=utf8');
    //设置时区(中国标准时间)
    date_default_timezone_set('PRC');
    $content_upload_time = date('Y-m-d H:i:s', time());
    $time = time();
    $technology_content_id = $_POST['technology_content_id'];
    $update_content_type = $_POST['technology_content_type'];
    $update_content_title = $_POST['technology_content_title'];
    $update_content_abstract = $_POST['technology_content_abstract'];
    $update_content = $_POST['technology_content'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $update_action = "update hot_technology_content set technology_content_type='$update_content_type',technology_content_abstract='$update_content_abstract',technology_content='$update_content',technology_content_time='$content_upload_time' where technology_content_id='$technology_content_id'";
    $update_result = mysqli_query($conn, $update_action);
    if($update_result) {
        echo 0;
    } else {
        echo 1;
    }

?>
