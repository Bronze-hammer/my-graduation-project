<?php

    $filename = $_GET['filename'];
    $file_tmp_name = $_GET['file_tmp_name'];
    $identification = $_GET['identification'];

    //echo $filename.'</br>';
    //echo $file_tmp_name.'</br>';
    //echo $identification.'</br>';

    header('content-disposition: attachment; filename='.$filename);
    header('content-length:'.filesize($file_tmp_name.'/'.$identification));
    readfile($identification);

?>
