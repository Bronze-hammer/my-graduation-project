<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>About me</title>

				<link rel="stylesheet" type="text/css" href="bootstrap/css/resource-down.css">
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		</head>

		<body>

				<!--main background photo-->
				<img src="bootstrap/images/background1.jpg" class="bg">

				<div id="root-container" class="container">
						<div id="wrapper" class="columns">
							  <!--顶部图片展示-->
								<div class="top-photo">
									  <img src="bootstrap/images/messageboaed-top-photo.jpg">
								</div>

								<!-- 导航条 -->
                <div id="menu_nav" class="menu-nav">
                    <nav class="navbar navbar-inverse navigation">
                        <div class="nav-container">
                            <div class="collapse navbar-collapse" id="demo-navbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">首页</a></li>
                                    <li><a href="aboutme.php">关于</a></li>
                                    <li><a href="resource-down.php">资源下载</a></li>
                                    <li><a href="message-board.php">留言</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">归档<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="hot-technology/html5-page.php" target="_blank">HTML5</a></li>
                                            <li><a href="hot-technology/javascript-page.php" target="_blank">JavaScript</a></li>
                                            <li><a href="hot-technology/angularjs-page.php" target="_blank">Angular.js</a></li>
                                            <li><a href="hot-technology/python-page.php" target="_blank">Python</a></li>
                                            <li><a href="hot-technology/nodejs-page.php" target="_blank">Node.js</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </nav>
                </div>

								<!--message-board-list -->
								<div id="resource-down-list">
									  <div class="row a-message" v-for="message in messages">
                    <?php
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
                        $sql = "select * from upload_file_info";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            printf("error:%s\n", mysqli_error($conn));
                            exit();
                        }
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<div style="font-size: 1px">';
                            echo '<table style="margin: 0" class="table table-hover">';
                            echo '<tr>';
                            echo '<td style="width: 30px">';
                            echo $row['id'];
                            echo '</td>';
                            echo '<td class="active" style="width: 190px">';
                            echo $row['filename'];
                            echo '</td>';
                            echo '<td class="success">';
                            echo $row['fileabstract'];
                            echo '</td>';
                            echo '<td class="warning" style="width: 100px">';
                            echo $row['filesize']."byte";
                            echo '</td>';
                            echo '<td style="width: 100px">';
                            echo $row['file_upload_time'];
                            echo '</td>';
                            echo '<td style="width: 50px">';
                            echo '<a href="all-backstage-page/do_download_file.php?filename='.$row['filename'].'&file_tmp_name='.$row['file_tmp_name'].'&identification='.$row['identification'].'">下载</a>';
                            echo '</td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</div>';
                        }
                    ?>
										</div>
								</div>



								<!-- Copyright -->
                <div id="copyright">
                    <div class="copyright-end">
                        <span id="text">
                            © Copyright © 2017  xuzihui
                        </span>
                    </div>

                </div>
						</div>
				</div>

				<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="bootstrap/js/bootstrap.min.js"></script>

		</body>
</html>
