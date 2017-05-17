<?php

    $technology_content_id = $_POST['technology_content_id'];
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    $conn = new mysqli($servername, $username, $password);  //连接数据库
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $delete = mysqli_query($conn, "delete from hot_technology_content where technology_content_id='$technology_content_id'");
    if($delete) {
        echo 00;
    } else {
        echo 11;
    }

?>
