<?php

    header('content-type:text/html;charset=utf8');
    $url = "homepage-slidephoto-recommend.html";

    //print_r($_FILES);
    $content_title = $_POST['_content_title'];
    //$tmp_name = $_FILES['photo']['tmp_name'];
    // echo $content_title;
    if($content_title){
      echo '<script>alert("提交成功！");location.href="'.$url.'"</script>';
    }else {
      echo '<script>alert("提交失败！");location.href="'.$url.'"</script>';
    }
    //$content_upload_time = date('Y-m-d H:i:s', time());

    // $content_title = $_POST['_content_title'];
    // $content_abstract = $_POST['_content_abstract'];
    // $content = $_POST['_content'];
    // $photoname = $_FILES['photo']['name'];
    // echo $content_title;
    // echo $photoname;
    // $photo_name = $_POST['photo_name'];
    // $photo_size = $_POST['photo_size'];
    // $photo_type = $_POST['photo_type'];
    // echo $content_title;
    // echo $content_abstract;
    // echo $content;
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
    //     echo 0;  //文章上传成功
    // } else {
    //     echo 1;  //文章上传失败
    // }
?>
