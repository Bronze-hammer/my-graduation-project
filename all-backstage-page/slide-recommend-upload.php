<?php

    header('content-type:text/html;charset=utf8');
    //设置时区(中国标准时间)
    date_default_timezone_set('PRC');
    $content_upload_time = date('Y-m-d H:i:s', time());

    $content_title = isset($_POST['content_title'])? $_POST['content_title'] : '';
    $content_abstract = isset($_POST['content_abstract'])? $_POST['content_abstract'] : '';
    $content = isset($_POST['content'])? $_POST['content'] : '';

    $tmp_name = $_FILES['photo']['tmp_name'];
    $filename = time().substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));

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
    $insert_action = "insert into recommend_content_info (content_title, content_abstract, backgroundImg, detail_content, content_time) values ('$content_title', '$content_abstract', '$filename', '$content', '$content_upload_time')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result) {
        if(move_uploaded_file($_FILES['photo']['tmp_name'], 'recommend-content-img/'.$filename)){
            echo 0;
        }else {
            echo 2;  //文件上传失败
        }
    } else {
        echo 1;
    }






    // $response = array();
    // if(move_uploaded_file($_FILES['photo']['tmp_name'], 'recommend-content-img/'.$filename)){
    //     $response['isSuccess'] = true;
    //     $response['content_title'] = $content_title;
    //     $response['content_abstract'] = $content_abstract;
    //     $response['content'] = $content;
    //     $response['photo'] = $filename;
    // }else{
    //     $response['isSuccess'] = false;
    // }
    // echo json_encode($response);


    // $url = "homepage-slidephoto-recommend.html";

    //print_r($_FILES);
    // $content_upload_time = date('Y-m-d H:i:s', time());
    // $content_title = $_POST['content_title'];
    // $content_abstract = $_POST['content_abstract'];
    // $content = $_POST['content'];
    // $filename = $_FILES['photo']['name'];
    // $type  = $_FILES['photo']['type'];
    // $tmp_name = $_FILES['photo']['tmp_name'];
    // $size = $_FILES['photo']['size'];
    // $error = $_FILES['photo']['error'];
    // echo $content;
    // if($content_title){
    //   echo '<script>alert("提交成功！");location.href="'.$url.'"</script>';
    // }else {
    //   echo '<script>alert("提交失败！");location.href="'.$url.'"</script>';
    // }

    // $servername = "localhost";
    // $username = "root";
    // $password = "xuzihui";
    // //连接数据库
    // $conn = new mysqli($servername, $username, $password);
    // if (!$conn) {
    //     die('error'.mysqli_error);
    // }
    // mysqli_query($conn, "set names 'utf8'");
    // mysqli_select_db($conn, "graduation-data");  //打开数据库
    // $insert_action = "insert into recommend_content_info (content_title, content_abstract, detail_content, content_time) values ('$content_title', '$content_abstract', '$content', '$content_upload_time')";
    // $insert_result = mysqli_query($conn, $insert_action);
    //
    // if($insert_result){
    //     echo '<script>alert("提交成功！");location.href="'.$url.'"</script>';  //文章上传成功
    // } else {
    //     echo '<script>alert("提交失败！");location.href="'.$url.'"</script>';  //文章上传失败
    // }
?>
