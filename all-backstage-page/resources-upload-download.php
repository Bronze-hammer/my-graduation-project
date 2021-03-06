<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf8">
			  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <title>Back stage</title>

				<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<link href="../bootstrap/css/back-stage-share.css" rel="stylesheet">
				<link href="../bootstrap/css/back-stage-style.css" rel="stylesheet">
				<link href="../bootstrap/css/font-awesome.css" rel="stylesheet">

		</head>

		<body>
			  <div id="wrapper">
            <nav class="nav navbar-fixed-top top-navbar" role="navigation">
                <!-- navbar-header 当宽度小于一定值时显示的内容 -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#demo-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">返回前台</a>
                </div>

                <ul class="nav navbar-right information-prompt">
                    <li class="dropdown">
                        <a style="background-color: transparent;" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!--sidebar-->
            <nav class="navbar-side navbar-side-style" role="navigation">
                <ul class="nav">
                    <li>
                        <a class="active-menu" href="homepage-slidephoto-recommend.php">
                            <i>首页推荐</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="homepage-video-recommend.php">
                            <i>精彩视频</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="hot-technology-edit.php">
                            <i>分类文章</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="messages-administration.php">
                            <i>留言管理</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="resources-upload-download.php">
                            <i>资源上传下载</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="user-administration.php">
                            <i>用户管理</i>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- 右侧内容 -->
            <div class="page-wrapper">
							  <!-- 资源上传下载 -->
								<div class="slide-photo-content-recommend">
									  <h2>资源上传下载</h2>
                    <div>
                        <form action="do-upload-file.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- <input type="hidden" name="MAX_FILE_SIZE"/> -->
                                <label>选择要上传的资源文件:</label>
                                <input type="file" name="myfile" />

                            </div>
                            <div class="form-group">
                                <label>上传文件的摘要介绍:</label>
                                <textarea class="form-control" placeholder="摘要" name="upload_file_abstract"></textarea>
                            </div>
                            <input type="submit" value="上传文件" />
                        </form>
                        <hr>
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
                            echo '<div style="text-align:center;font-size: 15px">';
                            echo '<table style="margin: 0" class="table table-hover">';
                            echo '<tr>';
                            echo '<td class="active" style="width: 190px">';
                            echo '资源名称';
                            echo '</td>';
                            echo '<td class="success">';
                            echo '资源简介';
                            echo '</td>';
                            echo '<td class="warning" style="width: 100px">';
                            echo '资源大小';
                            echo '</td>';
                            echo '<td style="width: 100px">';
                            echo '上传时间';
                            echo '</td>';
                            echo '<td style="width: 50px">';
                            echo '操作';
                            echo '</td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</div>';
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<div style="font-size: 1px">';
                                echo '<table style="margin: 0" class="table table-hover">';
                                echo '<tr>';
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
                                echo '<a href="do_download_file.php?filename='.$row['filename'].'&file_tmp_name='.$row['file_tmp_name'].'&identification='.$row['identification'].'">下载</a>';
                                echo '<a onclick="Delete('.$row['file_id'].')">删除</a>';
                                echo '</td>';
                                echo '</tr>';
                                echo '</table>';
                                echo '</div>';
                            }
                        ?>
                    </div>
								</div>
						</div>
				</div>


				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script>
            function Delete(file_id){
                $.ajax({
                    url: 'delete-file.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        'file_id': file_id
                    }
                }).done(function(data){
                   switch (data) {
                      case 0:
                       alert("文件删除成功");
                       window.location.reload();
                       break;
                     case 1:
                       alert("文件删除失败");
                       break;

                   }
                })
            }
        </script>
		</body>

</html>
