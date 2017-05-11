<?php
    $video_name = isset($_POST['video_name'])? $_POST['video_name'] : '';
    $video_abstract = isset($_POST['video_abstract'])? $_POST['video_abstract']: '';
    $video_type = isset($_POST['video'])? $_POST['video'] : '';
    $video_url = isset($_POST['video_url'])? $_POST['video_url'] : '';
    $time = time();
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";
    //连接数据库
    $conn = new mysqli($servername, $username, $password);
    mysqli_query($conn, "set names 'utf8'");
    mysqli_select_db($conn, "graduation-data");  //打开数据库
    $insert_action = "insert into recommend_video_info values ('$time', '$video_name', '$video_abstract', '$video_type', '$video_url')";
    $insert_result = mysqli_query($conn, $insert_action);
    if($insert_result) {
        echo 0;
    } else {
        echo 1;
    }


  // $response = array();
  // $response['video_name'] = $video_name;
  // $response['video_abstract'] = $video_abstract;
  // $response['video_type']= $video_type;
  // $response['video_url'] = $video_url;
  // echo json_encode($response);
?>
