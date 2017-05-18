<?php

    $reply_message_id = $_POST['reply_message_id'];
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $delete = mysqli_query($conn, "delete from reply_message_info where reply_message_id='$reply_message_id'");
    if ($delete) {
        echo 0;
    } else {
        echo 1;
    }

?>
