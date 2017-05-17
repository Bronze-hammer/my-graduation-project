<?php

    $delete_content_id = $_POST['delete_content_id'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $delete = mysqli_query($conn, "delete from recommend_content_info where content_id='$delete_content_id'");
    if ($delete) {
        unlink("recommend-content-img/".$delete_content_id.".jpg");
        echo 00;
    } else {
        echo 11;
    }

?>
