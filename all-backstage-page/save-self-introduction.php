<?php

    header("Content-type: text/html; charset=utf-8");

    $name = $_POST['_name'];
    $email = $_POST['_email'];
    $github_id = $_POST['_github_id'];
    $blog_id = $_POST['_blog_id'];
    $introduction = $_POST['_introduction'];
    $useremail = $_POST['_useremail'];

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
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $select_action = "select useremail from personalinfo where useremail = '$useremail'";
    $select_result = mysqli_query($conn, $select_action);
    if($select_result){
        $update_action = "update personalinfo set name='$name',email='$email',github_id='$github_id',blog_id='$blog_id',self_introduction='$introduction'";
        $update_result = mysqli_query($conn, $update_action);
        if($update_result){
            echo 2;  //信息更新成功
        } else {
            echo 3;  //信息更新失败
        }
    } else {
        $insert_action = "insert into personalinfo (name, email, github_id, blog_id, self_introduction, useremail) values ('$name', '$email', '$github_id', '$blog_id', '$introduction', '$useremail')";
        $insert_result = mysqli_query($conn, $insert_action);
        if($insert_result){
            echo 0;  //信息插入成功
        } else {
            echo 1;  //信息插入失败
        }
    }

?>
