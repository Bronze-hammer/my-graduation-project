<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <title>Back stage</title>

				<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<link href="../bootstrap/css/back-stage-share.css" rel="stylesheet">
				<link href="../bootstrap/css/back-stage-style.css" rel="stylesheet">
				<link href="../wangeditor/css/wangEditor.min.css" rel="stylesheet">
        <link href="editormd/css/editormd.css" rel="stylesheet"/>

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
                        <a class="active-menu" href="homepage-slidephoto-recommend.php">
                            <i>首页推荐</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="homepage-vedio-recommend.html">
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
                          <a class="active-menu" href="user-administration.html">
                              <i>用户管理</i>
                          </a>
                      </li>
                  </ul>
            </nav>
            <div class="page-wrapper">
                <!-- 页面页首滑动图片内容推荐 -->
                <div class="slide-photo-content-recommend">
                    <h2>页面页首滑动图片内容推荐</h2>
                    <form name="form" id="form">
                        <?php
                        $edit_content_id = $_GET['edit_content_id'];
                        $servername = "localhost";
                        $username = "root";
                        $password = "xuzihui";
                        $conn = new mysqli($servername, $username, $password);  //连接数据库
                        mysqli_query($conn, "set names 'utf8'");
                        mysqli_select_db($conn, "graduation-data");  //打开数据库
                        $result = mysqli_query($conn, "select * from recommend_content_info");
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['content_id'] === $edit_content_id){
                                echo '<div class="form-group">';
                                echo '<label>详细内容</label>';
                                echo '<div id="content" style="min-height:150px;">'.$row['detail_content'].'</div>';
                                echo '<div>';
                                echo '<div class="form-group">';
                                echo '<label>图片上显示的标题</label>';
                                echo '<input name="content_title" class="form-control" value="'.$row['content_title'].'">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label>图片上的内容摘要</label>';
                                echo '<textarea name="content_abstract" class="form-control">'.$row['content_abstract'].'</textarea>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label>选择文章顶头背景图片</label>';
                                echo '<input type="file" name="photo" id="photo">';
                                echo '</div>';
                                echo '<img style="width:50%;" src="recommend-content-img/'.$row['backgroundImg'].'"></br>';
                                echo '<p><input type="button" value="提交" onclick="update_content('.$row['content_id'].')"></p>';
                            }
                        }
                        ?>
                    </form>
                    <div id="result"></div>
                </div>
            </div>
				</div>

				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../wangeditor/js/wangEditor.min.js"></script>
        <script src="editormd/editormd.js"></script>
        <script src="editormd/marked.min.js"></script>

        <script type="text/javascript">
            //实例化编辑器
            var editor = new wangEditor('content');
            //editor.config.uploadImgUrl = '../all-backstage-page/recommend-content-img';
            editor.config.hideLinkImg = true;
            editor.create();

            $("#exit").click(function(){
                localStorage.setItem("useremail", "");
                window.location.href="../index.php";

            });
        </script>
        <script>
            function update_content(edit_content_id){
                var data = new FormData($("#form")[0]);
                data.append("content", $("#content").html());
                data.append("edit_content_id", edit_content_id);
                $.ajax({
                    url: 'update-content.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(ret){
                    switch (ret) {
                      case 0:
                        alert("文章更新成功！");
                        window.location.reload();
                        break;
                      case 1:
                        alert("文章更新失败！");
                        break;
                      case 2:
                        alert("文章更新成功！");
                        window.location.href="./homepage-slidephoto-recommend.php";
                        break;
                      case 3:
                        alert("文章更新失败！");
                        break;
                    }
                    // var result = '';
                    // result += 'content=' + ret['content'] + '<br>';
                    // result += 'content_title=' + ret['content_title'] + '<br>';
                    // result += 'content_abstract=' + ret['content_abstract'] + '<br>';
                    // result += 'filename=' + ret['filename'] + '<br>';
                    // $("#result").html(result);
                });
            }
        </script>
		</body>

</html>
