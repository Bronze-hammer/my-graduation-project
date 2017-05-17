<?php

    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $identity = "1";
    if ($pwd == $confirm_password) {
        $servername = "localhost";
        $username = "root";
        $password = "xuzihui";
        $conn = new mysqli($servername, $username, $password);  //连接数据库
        mysqli_query($conn, "set names 'utf8'");
        mysqli_select_db($conn, "graduation-data");  //打开数据库
        $insert = mysqli_query($conn, "insert into userinfo (username,password,identity) values ('$email', '$pwd', '$identity')");
        if($insert){
            echo 0;
        } else {
            echo 1;
        }
    } else {
        echo 2;
    }

?>
