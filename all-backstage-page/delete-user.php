<?php
    $user_id = $_POST['user_id'];
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    $conn = new mysqli($servername, $username, $password);  //连接数据库
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $delete = mysqli_query($conn, "delete from user_info where user_id = '$user_id'");
    if ($delete) {
        echo 0;
    } else {
        echo 1;
    }
?>
