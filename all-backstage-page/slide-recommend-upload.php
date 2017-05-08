<?php

    header('content-type:text/html;charset=utf8');
    if (isset($_POST['upload'])) {
        var_dump($_FILES);
        $content_title = $_POST['_content_title'];
        $filename = $_FILES['upfile']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['upfile']['tmp_name'], 'recommend-content-img/'.time().'.'.$ext);
        //header('location: test.php');
        exit;
    }






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
