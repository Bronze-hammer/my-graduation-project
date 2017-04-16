<?php

    if(isset($_POST["submit"]) && $_POST["submit"] == "Log in"){
        $em = $_POST["email"];
        $psw = $_POST["password"];
        if ($em == "" || $psw == "") {
            echo "<script>alert('请输入登录邮箱或密码！');history.go(-1);</script>";
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "xuzihui";
            //$graduation_data  = "graduation_data";

            //连接数据库
            $conn = new mysqli($servername, $username, $password, 'graduation_data');

            if($conn) {
                //echo 'ok';
                //mysql_query("set names 'utf-8'");
                mysqli_select_db($conn, "graduation_data");  //打开数据库

                $sql = 'select username,password from userinfo where username = $_POST["email"] and password = $_POST["password"]';  //SQL查询

                $result = mysqli_query($conn, $sql);  //查询

                if(!$result){
                    printf("Error:%s\n", mysqli_error($conn));
                    exit();
                }

                $num = mysql_num_rows($result);
                if($num) {
                    $row = mysqli_fetch_array($result);
                    echo "$row[0]";
                } else {
                    echo "<script>alert('用户名或密码不正确!'); history.go(-1);</script>";
                }

                mysqli_close($conn);

            } else {
                echo '数据库连接失败';
            }
        }
    } else {
      echo "<script>alert('提交未成功!'); history.go(-1);</script>";
    }

?>
