<?php

    $file_id = $_POST['file_id'];
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $select = mysqli_query($conn, "select * from upload_file_info where file_id='$file_id'");
    $row = mysqli_fetch_array($select);
    $delete = mysqli_query($conn, "delete from upload_file_info where file_id='$file_id'");
    if ($delete) {
        unlink("uploads/".$row['identification']);
        echo 0;
    } else {
        echo 1;
    }

?>
