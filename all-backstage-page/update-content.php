<?php

    header('content-type:text/html;charset=utf8');
    //设置时区(中国标准时间)
    date_default_timezone_set('PRC');
    $content_upload_time = date('Y-m-d H:i:s', time());
    $edit_content_id = $_POST['edit_content_id'];
    $update_content = $_POST['content'] ;
    $update_content_escape = addcslashes($update_content, "'");
    $update_content_title = $_POST['content_title'];
    $update_content_abstract = $_POST['content_abstract'];
    $time = time();
    $filename = $time.substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));
    $tmp_name = $_FILES['photo']['tmp_name'];

    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    //$update_action = "update recommend_content_info set content_title='$update_content_title',content_abstract='$update_content_abstract',detail_content='$update_content_escape',content_time='$content_upload_time' where content_id='$edit_content_id'";
    if ($tmp_name == "") {
        $update_action = "update recommend_content_info set content_title='$update_content_title',content_abstract='$update_content_abstract',detail_content='$update_content_escape',content_time='$content_upload_time' where content_id='$edit_content_id'";
        $update_result = mysqli_query($conn, $update_action);
        if($update_result){
            echo 0;
        } else {
            echo 1;
        }
    }else{
        $insert_action = "insert into recommend_content_info (content_id, content_title, content_abstract, backgroundImg, detail_content, content_time) values ('$time', '$update_content_title', '$update_content_abstract', '$filename', '$update_content_escape', '$content_upload_time')";
        $insert_result = mysqli_query($conn, $insert_action);
        if($insert_result){
            if (move_uploaded_file($_FILES['photo']['tmp_name'], 'recommend-content-img/'.$filename)) {
                $delete = mysqli_query($conn, "delete from recommend_content_info where content_id='$edit_content_id'");
                unlink("recommend-content-img/".$edit_content_id.".jpg");
                echo 2;
            } else {
                echo 3;
            }
        }
    }





    // $response = array();
    // $response['content'] = $update_content_escape;
    // $response['content_title'] = $update_content_title;
    // $response['content_abstract'] = $update_content_abstract;
    // $response['filename'] = $tmp_name;
    // echo json_encode($response);

?>
