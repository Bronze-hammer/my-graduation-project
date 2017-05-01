<?php

    header("Content-type: text/html; charset=utf-8");

    $name = $_POST['_name'];
    $email = $_POST['_email'];
    $github_id = $_POST['_github_id'];
    $blog_id = $_POST['_blog_id'];
    $introduction = $_POST['_introduction'];

    //echo $name.'/'.$email.'/'.$github_id.'/'.$blog_id.'/'.$introduction;

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    if (!$conn) {
        die('error'.mysqli_error);
    }
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation_data");
    $insert_action = "insert into personalinfo values ('$name', '$email', '$github_id', '$blog_id', '$introduction')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result){
        echo 0;  //信息插入成功
    } else {
        echo 1;  //信息插入失败
    }

?>
