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
                            <i class="glyphicon glyphicon-envelope"></i>
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a style="background-color: transparent;" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="glyphicon glyphicon-bell"></i>
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </a>
                    </li>
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
                        <a class="active-menu" href="personal-info.php">
                            <i>个人信息</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="homepage-slidephoto-recommend.html">
                            <i>首页推荐</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="homepage-vedio-recommend.php">
                            <i>精彩视频</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="file-arrangement.html">
                            <i>归档</i>
                        </a>
                      </li>
                      <li>
                          <a class="active-menu" href="hot-technology-edit.php">
                              <i>热门语言</i>
                          </a>
                      </li>
                      <li>
                          <a class="active-menu" href="messages-administration.html">
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
							  <!-- 个人信息-->
								<div class="slide-photo-content-recommend">
									  <h2>个人信息</h2>
                    <div style="max-width: 700px;">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <button id="do_update" type="button" style="float: right;margin-top:50px" class="btn btn-success">编辑</button>
                                <button id="do_save" type="button" style="float: right;margin-top:50px" class="btn btn-success">保存</button>
                                <button id="cancel" type="button" style="float: right;margin-top:50px" class="btn btn-success">取消</button>
                            </div>
                            <div id="showdate">
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
                                $select_action = "select * from personalinfo";
                                $select_result = mysqli_query($conn, $select_action);
                                while ($row = mysqli_fetch_array($select_result)) {
                                    echo '<div class="form-group">';
                                    echo '<label class="col-md-2">姓名：</label>';
                                    echo '<div class="col-md-10">'.$row['name'].'</div>';
                                    echo '</div>';
                                    echo '<div class="form-group">';
                                    echo '<label class="col-md-2">邮箱：</label>';
                                    echo '<div class="col-md-10">'.$row['email'].'</div>';
                                    echo '</div>';
                                    echo '<div class="form-group">';
                                    echo '<label class="col-md-2">Github：</label>';
                                    echo '<div class="col-md-10">'.$row['github_id'].'</div>';
                                    echo '</div>';
                                    echo '<div class="form-group">';
                                    echo '<label class="col-md-2">Blog：</label>';
                                    echo '<div class="col-md-10">'.$row['blog_id'].'</div>';
                                    echo '</div>';
                                    echo '<div class="form-group">';
                                    echo '<label class="col-md-2">自我简介：</label>';
                                    echo '<div class="col-md-10">'.$row['self_introduction'].'</div>';
                                    echo '</div>';
                                }
                            ?>
                            </div>
                            <div id="update">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">姓名:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">邮箱</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Github:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="github_id">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Blog:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="blog_id">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">自我简介:</label>
                                  <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="introduction"></textarea>
                                  </div>
                                </div>
                            </div>
                        </form>
                    </div>
								</div>
						</div>
				</div>


				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function(){
                $("#do_save").hide();
                $("#cancel").hide();
                $("#update").hide();

            });
            $("#do_update").click(function(){
                $("#do_save").show();
                $("#cancel").show();
                $("#update").show();
                $("#do_update").hide();
                $("#showdate").hide();
            });
            $("#do_save").click(function(){
                $("#do_update").show();
                $("#showdate").show();
                $("#do_save").hide();
                $("#cancel").hide();
                $("#update").hide();
            });
            $("#cancel").click(function(){
                $("#do_update").show();
                $("#showdate").show();
                $("#do_save").hide();
                $("#cancel").hide();
                $("#update").hide();
            });
            $("#do_save").click(function(){
                var name = $("#name").val();
                var email = $("#email").val();
                var github_id = $("#github_id").val();
                var blog_id = $("#blog_id").val();
                var introduction = $("#introduction").val();
                var useremail = localStorage.getItem("useremail");

                $.ajax({
                    type: "POST",
                    url: "save-self-introduction.php",
                    dataType: "JSON",
                    data: {
                        "_name": name,
                        "_email": email,
                        "_github_id": github_id,
                        "_blog_id": blog_id,
                        "_introduction": introduction,
                        "_useremail": useremail
                    },
                    success: function(data){
                        switch (data) {
                          case 0:
                              alert("信息插入成功！");
                              window.location.reload();
                              break;
                          case 1:
                              alert("信息插入失败！");
                              break;
                          case 2:
                              alert("信息更新成功！");
                              window.location.reload();
                              break;
                          case 3:
                              alert("信息更新失败！");
                              break;
                        }
                    }
                })
            });
        </script>

        <script type="text/javascript">
            $("#exit").click(function(){
                localStorage.setItem("useremail", "");
                window.location.href="../login.html";

            });
        </script>

		</body>

</html>
