<?php
    header('content-type:text/html;charset=utf8');
    //$_FILES： 文件上传文件
    //print_r($_FILES);
    $file_abstract = $_POST['upload_file_abstract'];
    $file_upload_time = date('Y-m-d H:i:s', time());

    $filename = $_FILES['myfile']['name'];
    $type  = $_FILES['myfile']['type'];
    $tmp_name = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $error = $_FILES['myfile']['error'];

    $maxSize = 2097152;  //允许上传文件的最大值

    /*错误信息说明
    UPLOAD_ERR_OK: 其值为0，没有错误发生，文件上传成功
    UPLOAD_ERR_INI_SIZE: 其值为1，上传的文件超过了php.ini中upload_max_filesize选项限制的值
    UPLOAD_ERR_FORM_SIZE: 其值为2，上传文件的大小超过了HTML表单中 MAX_FILE_SIZE选项指定的值
    UPLOAD_ERR_PARTIAL: 其值为3，文件只是部分被上传
    UPLOAD_ERR_NO_FILE: 其值为4，没有文件被上传
    UPLOAD_ERR_NO_TMP_DIR: 其值为6，找不到临时文件夹
    UPLOAD_ERR_CANT_WRITE: 其值为7，文件写入失败
    UPLOAD_ERR_EXTENSION:  其值为8，上传的文件被PHP扩展程序中断
    */

    //将服务器上的临时文件移动指定目录下
    //copy($src, $dst):将文件拷贝到指定目录，拷贝成功返回true，否则返回false
    //copy($tmp_name, "uploads/".$filename);

    //move_uploaded_file($tmp_name, $destination):将服务器上的临时文件移动到指定目录下叫什么名字，移动成功返回true，否则返回false
    //move_uploaded_file($tmp_name, "uploads/".$filename);



    if($error == UPLOAD_ERR_OK){
        if($size > $maxSize){
            exit('上传文件过大！');
        }
        if(!is_uploaded_file($tmp_name)){
            exit('文件不是通过HTTP POST方式上传来的！');
        }

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $path = 'uploads';
        //确保文件名唯一，防止重名产生覆盖
        $uniName = md5(uniqid(microtime(true), true)).'.'.$ext;
        $destination = $path.'/'.$uniName;
        if(move_uploaded_file($tmp_name, $destination)){
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
            $insert_action = "insert into upload_file_info (identification, filename, filetype, file_tmp_name, filesize, fileabstract, file_upload_time) values ('$uniName', '$filename', '$type', '$path', '$size', '$file_abstract', '$file_upload_time')";
            $insert_result = mysqli_query($conn, $insert_action);

            if($insert_result){
                echo "文件".$filename."上传成功！";
            } else {
                echo "文件信息录入数据库失败！";
                printf("Error:%s\n", mysqli_error($conn));
                exit();
            }

        } else {
            echo "文件".$filename."上传失败！";
        }
    } else {
        switch($error){
            case 1:
                echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
                break;
            case 2:
                echo "超过了表单 MAX_FILE_SIZE 限制的大小";
                break;
            case 3:
                echo "文件部分被上传";
                break;
            case 4:
                echo "没有文件被上传";
                break;
            case 6:
                echo "找不到临时文件夹";
                break;
            case 7:
                echo "文件写入失败";
                break;
            case 8:
                echo "上传的文件被PHP扩展程序中断";
                break;
        }
    }



    /*服务器端配置
    file_uploads = On, 支持HTTP上传
    upload_tmp_dir = , 临时文件保存的目录
    upload_max_filesize = 2M, 允许上传文件的最大值
    max_file_uploads = 20, 允许一次上传的最大文件数
    post_max_size = 8M, POST方式发送数据的最大值

    max_execution_time = -1, 设置了脚本被解析器终止之前允许的最大执行时间，单位为秒，
    防止程序写得不好而占尽服务器资源
    max_input_time = 60, 脚本解析输入数据允许的最大时间，单位是秒
    max_input_nesting_level = 64, 设置输入变量的嵌套深度

    */

?>
