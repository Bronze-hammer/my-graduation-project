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
							  <!-- 留言管理 -->
								<div class="slide-photo-content-recommend">
									  <h2>留言管理</h2>
                    <div>
                        <table class="table table-hover">
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "xuzihui";
                            $conn = new mysqli($servername, $username, $password);  //连接数据库
                            mysqli_query($conn, "set names 'utf8'");
                            mysqli_select_db($conn, "graduation-data");  //打开数据库
                            $select = mysqli_query($conn, "select * from message_info");
                            while ($row = mysqli_fetch_array($select)) {
                                echo '<tr class="active">';
                                echo '<td class="active">'.$row['commenter_name'].'</td>';
                                echo '<td class="active" style="width:70%">'.$row['message_content'].'</td>';
                                echo '<td class="active">'.$row['message_time'].'</td>';
                                echo '<td class="active"><a onclick="Delete_message('.$row['message_id'].')">删除<a></td>';
                                echo '</tr>';
                                $select1 = mysqli_query($conn, "select * from reply_message_info");
                                while ($row1 = mysqli_fetch_array($select1)) {
                                    if ($row1['reply_object'] == $row['message_id']) {
                                        echo '<tr class="active">';
                                        echo '<td class="success">'.$row1['reply_commenter_name'].'</td>';
                                        echo '<td class="success" style="width:70%">'.$row1['reply_message_content'].'</td>';
                                        echo '<td class="success">'.$row1['reply_message_time'].'</td>';
                                        echo '<td class="success"><a onclick="Delete_reply('.$row1['reply_message_id'].')">删除<a></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                        ?>
                        </table>
                    </div>
								</div>
						</div>
				</div>


				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script>
            function Delete_reply(reply_message_id){
                $.ajax({
                    url: 'delete-reply-message.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        "reply_message_id": reply_message_id
                    }
                }).done(function(data){
                    switch (data) {
                      case 0:
                        alert("回复删除成功");
                        window.location.reload();
                        break;
                      case 1:
                        alert("回复删除失败");
                        break;

                    }
                })
            }
            function Delete_message(message_id){
                $.ajax({
                    url: 'delete-message.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        "message_id": message_id
                    }
                }).done(function(data){
                    switch (data) {
                      case 00:
                        alert("留言删除成功");
                        window.location.reload();
                        break;
                      case 11:
                        alert("留言删除失败");
                        break;

                    }
                })
            }
        </script>

		</body>

</html>
