<?php
    $user_id = $_POST['user_id'];
    $useremail = $_POST['useremail'];
    $pwd = $_POST['password'];
    $identity = $_POST['identity'];
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    $conn = new mysqli($servername, $username, $password);  //连接数据库
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $update = mysqli_query($conn, "update user_info set useremail='$useremail',password='$pwd',identity='$identity' where user_id='$user_id'");
    if ($update) {
        echo 00;
    } else {
        echo 11;
    }

?>
