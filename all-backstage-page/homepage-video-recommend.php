<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
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
                            <li style="padding-left: 46px;">
                                <a id="exit">Exit</a>
                            </li>
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
							  <!-- 页面页首热门视频推荐 -->
								<div class="slide-photo-content-recommend">
									  <h2>首页热门视频推荐</h2>
                    <div>
                        <form name="form" id="form">
                            <div class="form-group">
                                <label>热门视频主题:</label>
                                <input name="video_name" class="form-control" placeholder="视频主题">
                            </div>
                            <div class="form-group">
                                <label>热门视频摘要介绍:</label>
                                <textarea name="video_abstract" class="form-control" placeholder="视频摘要"></textarea>
                            </div>
                            <div class="form-group">
                                <label>选择上传的视频地址:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="video" value="video_address">视频地址
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="video" value="flash_address">flash地址
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="video" value="html_code">html代码
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="video" value="currency_code">通用代码
                                </label>
                                <div class="form-group">
                                    <input name="video_url" class="form-control" placeholder="视频链接代码">
                                </div>
                                <p><input type="button" value="提交" id="button_video" class="btn btn-success"></p>
                            </div>
                        </form>
                    </div>
								</div>
                <div style="text-align:center;width:70%;margin:auto;">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "xuzihui";
                //连接数据库
                $conn = new mysqli($servername, $username, $password);
                mysqli_query($conn, "set names 'utf8'");
                mysqli_select_db($conn, "graduation-data");  //打开数据库
                $video_result = mysqli_query($conn, "select * from recommend_video_info");
                $video_row = mysqli_fetch_array($video_result);
                echo '<h3>'.$video_row['video_name'].'</h3>';
                echo '<p style="text-indent: 30px; margin: 50px 60px;">'.$video_row['video_abstract'].'</p>';
                if($video_row['video_type'] === "video_address" || $video_row['video_type'] === "flash_address"){
                    echo '<video src="'.$video_row['video_url'].'"></video>';
                } else {
                    echo $video_row['video_url'];
                }
                ?>
                </div>
						</div>
				</div>


				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script>
            $("#exit").click(function(){
                localStorage.setItem("useremail", "");
                window.location.href="../login.html";

            });
            $("#button_video").click(function(){
                var data = new FormData($("#form")[0]);
                $.ajax({
                    url: 'video-recommend-upload.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(ret){
                    switch (ret) {
                        case 0:
                          alert("视频更新成功！");
                          window.location.reload();
                          break;
                        case 1:
                          alert("视频更新失败！");
                          break;
                        case 2:
                          alert("视频上传成功！");
                          window.location.reload();
                          break;
                        case 3:
                          alert("视频上传失败！");
                          break;

                    }
                })
            });
        </script>
		</body>

</html>
