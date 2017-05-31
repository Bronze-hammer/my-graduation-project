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
                <div style="margin-top:20px;">
                    <ul class="nav nav-tabs" role="tablist" id="tab-list">
                        <li class="active"><a href="#recommend-content-edit" role="tab" data-toggle="tab">上传推荐文章</a></li>
                        <li><a href="#recommend-content-list" role="tab" data-toggle="tab">推荐文章列表</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="recommend-content-edit">
                            <!-- 页面页首滑动图片内容推荐 -->
                            <div class="slide-photo-content-recommend">
                                <h2>首页滑动图片内容推荐</h2>
                                <form name="form" id="form">
                                    <div class="form-group">
                                        <label>详细内容：</label>
                                        <div id="content" style="min-height:150px;"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>图片上所显示的题目：</label>
                                        <input name="content_title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>图片上所显示的内容摘要：</label>
                                        <textarea name="content_abstract" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>选择文章顶头背景图片：</label>
                                        <input type="file" name="photo" id="photo">
                                    </div>
                                    <p><input type="button" value="提交" id="button_recommend_content"></p>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" style="margin:50px;" id="recommend-content-list">
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "xuzihui";
                                $conn = new mysqli($servername, $username, $password);  //连接数据库
                                mysqli_query($conn, "set names 'utf8'");
                                mysqli_select_db($conn, "graduation-data");  //打开数据库
                                $result = mysqli_query($conn, "select * from recommend_content_info");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<div style="margin: 20px;" class="row">';
                                    echo '<div class="col-md-4"><img style="width:75%;" src="recommend-content-img/'.$row['backgroundImg'].'"></div>';
                                    echo '<div class="col-md-6">';
                                    echo '<h6>'.$row['content_title'].'</h6>';
                                    echo '<p>'.$row['content_time'].'</p>';
                                    echo '<p>'.$row['content_abstract'].'</p>';
                                    echo '</div>';
                                    echo '<div class="col-md-2">';
                                    echo '<button style="margin-top:50%;" type="button" onclick="location.href=';
                                    echo "'edit-content.php?edit_content_id=".$row['content_id']."'";
                                    echo '">编辑</button>';
                                    echo '<button style="margin-top:50%;" type="button" onclick="delete_content('.$row['content_id'].')">'."删除".'</button>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>

                    </div>
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
            $("#button_recommend_content").click(function(){
                var data = new FormData($('#form')[0]);
                // data.append("content", $("#content").html());
                data.append("content", $("#content").html());
                $.ajax({
                    url: 'slide-recommend-upload.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(ret){
                    switch (ret) {
                        case 0:
                          alert("文章上传成功！");
                          window.location.reload();
                          break;
                        case 1:
                          alert("文章上传失败！");
                          break;
                        case 2:
                          alert("图片上传失败！");
                          break;
                        case 3:
                          alert("请补全要上传的信息！");
                          break;

                    }
                });
                return false;
            })

            function delete_content(content_id){
                $.ajax({
                    type: "POST",
                    url: "delete-content.php",
                    dataType: "JSON",
                    data: {
                        "delete_content_id": content_id
                    }
                }).done(function(data){
                    switch (data) {
                      case 00:
                        alert("文章删除成功！");
                        window.location.reload();
                        break;
                      case 11:
                        alert("文章删除失败！");
                        break;

                    }
                })
            }
        </script>
		</body>

</html>
