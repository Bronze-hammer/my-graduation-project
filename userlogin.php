<?php

    header("Content-type: text/html; charset=utf-8");
    session_start();

    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    if (!$conn) {
        die('error'.mysqli_error);
    }
    mysqli_select_db($conn, "graduation_data");  //打开数据库
    $select = mysqli_query($conn, "select password from userinfo where username='$useremail'");
    while ($row = mysqli_fetch_array($select)) {
        if ($row['password'] == $userpassword) {
            echo 1;
        }else {
            echo 2;
        }
    }
    // $sql = "select * from userinfo where username='$useremail'";
    // $result = mysqli_query($conn, $sql);
    //
    // if($row = mysqli_fetch_array($result)){
    //     if($row['password'] == $userpassword){
    //         echo 1;  //登录成功
    //     } else {
    //         echo 2;  //密码错误
    //     }
    // } else {
    //     echo 3;  //用户不存在
    // }

?>
