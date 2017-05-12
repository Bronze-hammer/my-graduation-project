<?php

    header('content-type:text/html;charset=utf8');
    //设置时区(中国标准时间)
    date_default_timezone_set('PRC');
    $message_upload_time = date('Y-m-d H:i:s', time());
    $time = time();
    $commenter_name = $_POST['commenter_name'];
    $commenter_email = $_POST['commenter_email'];
    $message_content = $_POST['message_content'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $insert_action = "insert into message_info values ('$time', '$commenter_name', '$commenter_email', '$message_content', '$message_upload_time')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result){
        echo 0;
    } else {
        echo 1;
    }
?>
