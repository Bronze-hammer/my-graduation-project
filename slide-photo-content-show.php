<!DOCTYPE html>
<html lang="zh_CN">
    <head>
        <meta charset="utf-8">
      	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
      	<meta http-equiv="X-UA-Compalible" content="IE=edge">

      	<title>Show</title>

      	<link rel="stylesheet" type="text/css" href="bootstrap/css/slide-photo-content-show-style.css">
      	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    </head>

    <body>

      	<!--main background photo-->
      	<img src="bootstrap/images/background1.jpg" class="bg">
      	<!-- 导航条-->
      	<div id="root-container" class="container">
      	    <div id="wrapper" class="columns">
      	        <div class="menu-nav">
      		         <nav class="nav navbar-default navbar-inverse" role="navigation">
          		         <div class="nav-container">
          			           <div class="collapse navbar-collapse" id="demo-navbar"></div>
                       </div>
      		         </nav>
      		      </div>
                <div style="margin-left:50px;margin-top: 25px;">
                    <a href="javascript:;" onclick="javascript:history.back(-1);"><kbd>返回</kbd></a>
                </div>
                <?php
                    $content_id = $_GET['content_id'];
                    //echo $content_id;
                    $servername = "localhost";
                    $username = "root";
                    $password = "xuzihui";
                    $conn = new mysqli($servername, $username, $password);  //连接数据库
                    mysqli_query($conn, "set names 'utf8'");
                    mysqli_select_db($conn, "graduation-data");  //打开数据库
                    $result = mysqli_query($conn, "select * from recommend_content_info where content_id=$content_id");
                    $row = mysqli_fetch_array($result);
                    echo '<div class="slide-photo-content">';
                    echo '<img style="width: 75%;" src="all-backstage-page/recommend-content-img/'.$row['backgroundImg'].'"alt=""/>';
                    echo '<h2>'.$row['content_title'].'</h2>';
                    echo '<p class="slide-photo-content-meta">'.$row['content_time'].'</p>';
                    echo '<p>'.$row['detail_content'].'</p>';
                    echo '</div>';
                ?>


    	    	    <!-- Copyright-->
      	        <div id="copyright">
        		        <div class="copyright-end">
        		            <span id="text">© Copyright © 2017  xuzihui</span>
        		        </div>
      	        </div>
	          </div>
      	</div>

      	<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
      	<script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
