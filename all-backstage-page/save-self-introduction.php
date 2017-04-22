<?php

    header("Content-type: text/html; charset=utf-8");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $github_id = $_POST['github_id'];
    $blog_id = $_POST['blog_id'];
    $introduction = $_POST['introduction'];

    echo $name.'/'.$email.'/'.$github_id.'/'.$blog_id.'/'.$introduction;

?>
