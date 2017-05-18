<?php

    header("Content-type: text/html; charset=utf-8");
    session_start();

    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    $response = array();
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    if (!$conn) {
        die('error'.mysqli_error);
    }
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $select_password = mysqli_query($conn, "select username,password,identity from userinfo where username='$useremail'");
    if ($select_password) {
        while ($row = mysqli_fetch_array($select_password)) {
            $pwd = $row['password'];
            $username = $row['username'];
            $identity = $row['identity'];
            if ($pwd == $userpassword) {
                $response['whether_login'] = 0;
                $response['username'] = $username;
                $response['identity'] = $identity;
            }else {
                $response['whether_login'] = 1;
            }
        }
    } else {
        $response['whether_login'] = 2;
    }

    echo json_encode($response);

?>
