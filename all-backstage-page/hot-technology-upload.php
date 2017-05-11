<?php

    header('content-type:text/html;charset=utf8');
    //设置时区(中国标准时间)
    date_default_timezone_set('PRC');
    $content_upload_time = date('Y-m-d H:i:s', time());
    $time = time();
    $content_title = isset($_POST['content_title'])? $_POST['content_title'] : '';
    $content_abstract = isset($_POST['content_abstract'])? $_POST['content_abstract'] : '';
    $content = isset($_POST['content'])? $_POST['content'] : '';

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $insert_action = "insert into hot_technology_content values ('$time', '$content_title', '$content_abstract', '$content', '$content_upload_time')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result) {
        echo 0;
    } else {
        echo 1;
    }
?>
