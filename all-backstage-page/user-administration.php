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
                    <a class="navbar-brand" href="personal-info.html">Back Stage</a>
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
                        <a class="active-menu" href="homepage-vedio-recommend.php">
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
							  <!-- 用户管理 -->
								<div class="slide-photo-content-recommend">
									  <h2>用户管理</h2>
                    <div>
                        <table class="table table-hover">
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "xuzihui";
                            $conn = new mysqli($servername, $username, $password);  //连接数据库
                            mysqli_query($conn, "set names 'utf8'");
                            mysqli_select_db($conn, "graduation-data");  //打开数据库
                            $select = mysqli_query($conn, "select * from user_info");
                            while ($row = mysqli_fetch_array($select)) {
                                echo '<tr class="active" id="one">';
                                echo '<td style="width:30%;" class="success">'.$row['useremail'].'</td>';
                                echo '<td style="width:30%;" class="info">'.$row['password'].'</td>';
                                echo '<td style="width:15%;" class="warning">'.$row['identity'].'</td>';
                                echo '<td style="width:25%;" class="danger">';
                                echo '<a onclick="Delete_user('.$row['user_id'].')">删除<a>&nbsp&nbsp';
                                echo '<a id="revise">修改<a>';
                                echo '</td>';
                                echo '<td style="width:25%;" class="danger"></td>';
                                echo '</tr>';
                                echo '<tr id="two" style="display:none;">';
                                echo '<form name="form" id="form">';
                                echo '<td style="width:30%;"><input name="useremail" class="form-control" value="'.$row['useremail'].'"></td>';
                                echo '<td style="width:30%;"><input name="password" class="form-control" value="'.$row['password'].'"></td>';
                                echo '<td style="width:15%;"><input name="identity" class="form-control" value="'.$row['identity'].'"></td>';
                                echo '<td style="width:25%;">';
                                echo '<a onclick="Save('.$row['user_id'].')">保存</a>&nbsp&nbsp';
                                echo '<a id="cancel">取消</a>';
                                echo '</td>';
                                echo '</form>';
                                echo '</tr>';
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
            function Delete_user(user_id){
                $.ajax({
                    url: 'delete-user.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        "user_id": user_id
                    }
                }).done(function(data){
                    switch (data) {
                      case 0:
                        alert("用户删除成功！");
                        window.location.reload();
                        break;
                      case 1:
                        alert("用户删除失败！");
                        break;
                    }
                })
            }
            $("#revise").click(function(){
                $("#one").hide();
                $("#two").show();
            })
            $("#cancel").click(function(){
                $("#one").show();
                $("#two").hide();
            })
            function Save(user_id){
                var data = new FormData($('#form')[0]);
                data.append("user_id", user_id);
                $.ajax({
                    url: 'revise-user.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(data){
                    switch (data) {
                      case 00:
                        alert("用户信息修改成功！");
                        window.location.reload();
                        break;
                      case 11:
                        alert("用户信息修改失败！");
                        break;
                    }
                })
            }
        </script>

		</body>

</html>
