<?php

    $message_id = $_POST['message_id'];
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $delete_message = mysqli_query($conn, "delete from message_info where message_id='$message_id'");
    if ($delete_message) {
        $select = mysqli_query($conn, "select reply_message_id from reply_message_info where reply_object='$message_id'");
        while ($row = mysqli_fetch_array($select)) {
        $message=$row['reply_message_id'];
        mysqli_query($conn, "delete from reply_message_info where reply_message_id= '$message'");
        }
        echo 00;
    }else {
        echo 11;
    }
?>
