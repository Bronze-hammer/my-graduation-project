<?php

    header('content-type:text/html;charset=utf8');
    //设置时区(中国标准时间)
    date_default_timezone_set('PRC');
    $message_upload_time = date('Y-m-d H:i:s', time());
    $time = time();
    $reply_object = $_GET['reply_object'];
    $reply_commenter_name = $_POST['reply_commenter_name'];
    $reply_message_content = $_POST['reply_message_content'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $insert_action = "insert into reply_message_info values ('$time', '$reply_commenter_name', '$reply_message_content', '$reply_object', '$message_upload_time')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result) {
        echo 00;
    } else {
        echo 11;
    }

?>
