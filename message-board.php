<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>Message board</title>

				<link rel="stylesheet" type="text/css" href="bootstrap/css/message-board.css">
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
                                    <li><a href="blog-catalog.html">归档</a></li>
                                    <li><a href="#">资源下载</a></li>
                                    <li><a href="message-board.html">留言</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">热门技术<span class="caret"></span></a>
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
								<div id="message-board-list">
                    <div>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "xuzihui";
                        //连接数据库
                        $conn = new mysqli($servername, $username, $password);
                        mysqli_query($conn, "set names 'utf8'");
                        mysqli_select_db($conn, "graduation-data");  //打开数据库
                        $result = mysqli_query($conn, "select * from message_info");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<div style="margin: 50px 10px 10px 10px">';
                            echo '<div class="row">';
                            echo '<div class="col-md-2" style="font-size:17px;"><strong>'.$row['commenter_name'].'</strong></div>';
                            echo '<div class="col-md-10">'.$row['message_time'].'</div>';
                            echo '</div>';
                            echo '<p style="margin-top: 15px;">'.$row['message_content'].'</p>';
                            echo '</div>';
                        }
                    ?>
                    </div>
								</div>
                <div id="result"></div>
								<!--message-board-->
								<div class="message-board">
										<div style="margin-top: 50px">
                        <form id="form" name="form">
                            <div class="form-group">
                                <label>姓名:</label>
                                <input name="commenter_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>邮箱:</label>
                                <input name="commenter_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>留言:</label>
                                <textarea name="message_content" class="form-control"></textarea>
                            </div>
                            <p><input type="button" value="提交" id="submit_message" class="btn btn-success"></p>
                        </form>

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
        <script>
            $("#submit_message").click(function(){
                var data = new FormData($("#form")[0]);
                $.ajax({
                    url: 'message-upload.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(ret){
                    switch (ret) {
                      case 0:
                        alert("留言成功！");
                        window.location.reload();
                        break;
                      case 1:
                        alert("留言失败！");
                        break;

                    }
                })
            });
        </script>

		</body>
</html>
