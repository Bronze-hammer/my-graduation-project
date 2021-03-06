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
        <link href="../wangeditor/css/wangEditor.min.css" rel="stylesheet">

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
							  <!-- 热门语言 -->
								<div class="slide-photo-content-recommend">
									  <h2>热门语言</h2>
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="tab-list">
                            <li class="active"><a href="#tab-html5" role="tab" data-toggle="tab">HTML5</a></li>
                            <li><a href="#tab-javascript" role="tab" data-toggle="tab">JavaScript</a></li>
                            <li><a href="#tab-angularjs" role="tab" data-toggle="tab">Angular.js</a></li>
                            <li><a href="#tab-python" role="tab" data-toggle="tab">Python</a></li>
                            <li><a href="#tab-nodejs" role="tab" data-toggle="tab">Node.js</a></li>
                            <li><a href="#tab-edit" role="tab" data-toggle="tab">编辑新文章</a></li>
                        </ul>

                        <div class="tab-content" style="margin: 50px 100px;">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "xuzihui";
                            $conn = new mysqli($servername, $username, $password);  //连接数据库
                            mysqli_query($conn, "set names 'utf8'");
                            mysqli_select_db($conn, "graduation-data");  //打开数据库

                            echo '<div class="tab-pane active" id="tab-html5">';
                            $select_html5 = mysqli_query($conn, "select * from hot_technology_content where technology_content_type='html5'");
                            while ($row = mysqli_fetch_array($select_html5)) {
                                echo '<div style="margin-top:20px;">';
                                echo '<a onclick="location.href=';
                                echo "'hot-technology-show.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '" target="_blank">';
                                echo '<h4 style="font-weight: bold;">'.$row['technology_content_title'].'</h4>';
                                echo '</a>';
                                echo '<h6>'.$row['technology_content_time'].'</h6>';
                                echo '<p>'.$row['technology_content_abstract'].'</p>';
                                echo '<a onclick="location.href=';
                                echo "'revise-hot-content.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '">修改</a>&nbsp;';
                                echo '<a onclick="Delete('.$row['technology_content_id'].')">删除</a>';
                                echo '</div>';
                            }
                            echo '</div>';

                            echo '<div class="tab-pane" id="tab-javascript">';
                            $select_javascript = mysqli_query($conn, "select * from hot_technology_content where technology_content_type='javascript'");
                            while ($row = mysqli_fetch_array($select_javascript)) {
                                echo '<div style="margin-top:20px;">';
                                echo '<a onclick="location.href=';
                                echo "'hot-technology-show.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '" target="_blank">';
                                echo '<h4 style="font-weight: bold;">'.$row['technology_content_title'].'</h4>';
                                echo '</a>';
                                echo '<h6>'.$row['technology_content_time'].'</h6>';
                                echo '<p>'.$row['technology_content_abstract'].'</p>';
                                echo '<a onclick="location.href=';
                                echo "'revise-hot-content.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '">修改</a>&nbsp;';
                                echo '<a onclick="Delete('.$row['technology_content_id'].')">删除</a>';
                                echo '</div>';
                            }
                            echo '</div style="margin-top:20px;">';

                            echo '<div class="tab-pane" id="tab-angularjs">';
                            $select_angularjs = mysqli_query($conn, "select * from hot_technology_content where technology_content_type='angularjs'");
                            while ($row = mysqli_fetch_array($select_angularjs)) {
                                echo '<div>';
                                echo '<a onclick="location.href=';
                                echo "'hot-technology-show.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '" target="_blank">';
                                echo '<h4 style="font-weight: bold;">'.$row['technology_content_title'].'</h4>';
                                echo '</a>';
                                echo '<h6>'.$row['technology_content_time'].'</h6>';
                                echo '<p>'.$row['technology_content_abstract'].'</p>';
                                echo '<a onclick="location.href=';
                                echo "'revise-hot-content.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '">修改</a>&nbsp;';
                                echo '<a onclick="Delete('.$row['technology_content_id'].')">删除</a>';
                                echo '</div>';
                            }
                            echo '</div>';

                            echo '<div class="tab-pane" id="tab-python">';
                            $select_python = mysqli_query($conn, "select * from hot_technology_content where technology_content_type='python'");
                            while ($row = mysqli_fetch_array($select_python)) {
                                echo '<div style="margin-top:20px;">';
                                echo '<a onclick="location.href=';
                                echo "'hot-technology-show.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '" target="_blank">';
                                echo '<h4 style="font-weight: bold;">'.$row['technology_content_title'].'</h4>';
                                echo '</a>';
                                echo '<h6>'.$row['technology_content_time'].'</h6>';
                                echo '<p>'.$row['technology_content_abstract'].'</p>';
                                echo '<a onclick="location.href=';
                                echo "'revise-hot-content.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '">修改</a>&nbsp;';
                                echo '<a onclick="Delete('.$row['technology_content_id'].')">删除</a>';
                                echo '</div>';
                            }
                            echo '</div>';

                            echo '<div class="tab-pane" id="tab-nodejs">';
                            $select_nodejs = mysqli_query($conn, "select * from hot_technology_content where technology_content_type='nodejs'");
                            while ($row = mysqli_fetch_array($select_nodejs)) {
                                echo '<div style="margin-top:20px;">';
                                echo '<a onclick="location.href=';
                                echo "'hot-technology-show.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '" target="_blank">';
                                echo '<h4 style="font-weight: bold;">'.$row['technology_content_title'].'</h4>';
                                echo '</a>';
                                echo '<h6>'.$row['technology_content_time'].'</h6>';
                                echo '<p>'.$row['technology_content_abstract'].'</p>';
                                echo '<a onclick="location.href=';
                                echo "'revise-hot-content.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '">修改</a>&nbsp;';
                                echo '<a onclick="Delete('.$row['technology_content_id'].')">删除</a>';
                                echo '</div>';
                            }
                            echo '</div>';
                            ?>

                            <div class="tab-pane" id="tab-edit">
                                <div>
                                    <form name="form" id="form">
                                        <div style="max-width: 450px">
                                            <p>选择文章的语言类型:</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="technology_content_type" value="html5">HTML5
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="technology_content_type" value="javascript">JavaScript
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="technology_content_type" value="angularjs">Angularjs
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="technology_content_type" value="python">Python
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="technology_content_type" value="nodejs">Node.js
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <label>文章题目:</label>
                                            <input name="technology_content_title" class="form-control" placeholder="题目">
                                        </div>
                                        <div class="form-group">
                                            <label>文章内容摘要:</label>
                                            <textarea name="technology_content_abstract" class="form-control" placeholder="摘要"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>详细内容:</label>
                                            <div id="technology_content" style="min-height: 150px;">
                                        </div>
                                        </div>
                                        <p><input type="button" value="提交" class="btn btn-success" id="button_hot_technology"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
								</div>
						</div>
				</div>


				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>

        <!-- 编辑器源码文件 -->
        <script src="../wangeditor/js/wangEditor.min.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            //实例化编辑器
            var editor = new wangEditor('technology_content');
            //editor.config.uploadImgUrl = '../all-backstage-page/recommend-content-img';
            editor.config.hideLinkImg = true;
            editor.create();

            $("#exit").click(function(){
                localStorage.setItem("useremail", "");
                window.location.href="../login.html";

            });

            $("#button_hot_technology").click(function(){
                var data = new FormData($("#form")[0]);
                data.append("technology_content", $("#technology_content").html());
                $.ajax({
                    url: 'hot-technology-upload.php',
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

                    }
                });
            });
            function Delete(technology_content_id){
                $.ajax({
                    url: 'delete-hot-content.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        'technology_content_id': technology_content_id
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
