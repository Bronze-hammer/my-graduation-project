<?php
    date_default_timezone_set('PRC');
    $user_id = time();
    $email = $_POST['email'];
    //$v_email = test_input($email);
    $pwd = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $identity = "1";
    if($email == "" || $pwd == "" || $confirm_password == ""){
        echo 3;
    } else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
        echo 4;
    } else {
        if ($pwd == $confirm_password) {
            $servername = "localhost";
            $username = "root";
            $password = "xuzihui";
            $conn = new mysqli($servername, $username, $password);  //连接数据库
            mysqli_query($conn, "set names 'utf8'");
            mysqli_select_db($conn, "graduation-data");  //打开数据库
            $insert = mysqli_query($conn, "insert into user_info values ('$user_id', '$email', '$pwd', '$identity')");
            if($insert){
                echo 0;
            } else {
                echo 1;
            }
        } else {
            echo 2;
        }
    }
    // if ($pwd == $confirm_password) {
    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "xuzihui";
    //     $conn = new mysqli($servername, $username, $password);  //连接数据库
    //     mysqli_query($conn, "set names 'utf8'");
    //     mysqli_select_db($conn, "graduation-data");  //打开数据库
    //     $insert = mysqli_query($conn, "insert into user_info values ('$user_id', '$email', '$pwd', '$identity')");
    //     if($insert){
    //         echo 0;
    //     } else {
    //         echo 1;
    //     }
    // } else {
    //     echo 2;
    // }

?>
