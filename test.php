<?php
    $servername = "localhost";
    $username = "root";
    $password = "xuzihui";

    $conn = new mysqli($servername, $username. $password);

    if($conn) {
        echo 'ok';
    } else {
        echo 'error';
    }
?>
