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
                    <a class="navbar-brand" href="homepage-slidephoto-recommend.html">Back Stage</a>
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
                <div style="margin-top: 25px;">
                    <a href="javascript:;" onclick="javascript:history.back(-1);"><kbd>返回</kbd></a>
                </div>
							  <!-- 热门语言 -->
								<div class="slide-photo-content-recommend">
									  <h2>热门语言</h2>
                    <div>
                        <form name="form" id="form">
                        <?php
                        $technology_content_id = $_GET['technology_content_id'];
                        $servername = "localhost";
                        $username = "root";
                        $password = "xuzihui";
                        //连接数据库
                        $conn = new mysqli($servername, $username, $password);
                        mysqli_query($conn, "set names 'utf8'");
                        mysqli_select_db($conn, "graduation-data");  //打开数据库
                        $select = mysqli_query($conn, "select * from hot_technology_content where technology_content_id='$technology_content_id'");
                        while ($row = mysqli_fetch_array($select)) {
                            echo '<div style="max-width: 450px">';
                            echo '<p>选择文章的语言类型：</p>';
                            echo '<label class="radio-inline">';
                            echo '<input type="radio" name="technology_content_type" id="html5" value="html5">HTML5';
                            echo '</label>';
                            echo '<label class="radio-inline">';
                            echo '<input type="radio" name="technology_content_type" id="javascript" value="javascript">JavaScript';
                            echo '</label>';
                            echo '<label class="radio-inline">';
                            echo '<input type="radio" name="technology_content_type" id="angularjs" value="angularjs">Angularjs';
                            echo '</label>';
                            echo '<label class="radio-inline">';
                            echo '<input type="radio" name="technology_content_type" id="python" value="python">Python';
                            echo '</label>';
                            echo '<label class="radio-inline">';
                            echo '<input type="radio" name="technology_content_type" id="nodejs" value="nodejs">Node.js';
                            echo '</label>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label>文章题目:</label>';
                            echo '<input name="technology_content_title" class="form-control" value="'.$row['technology_content_title'].'">';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label>文章内容摘要:</label>';
                            echo '<textarea name="technology_content_abstract" class="form-control">'.$row['technology_content_abstract'].'</textarea>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label>详细内容:</label>';
                            echo '<div id="technology_content" style="min-height: 150px;">'.$row['technology_content'].'</div>';
                            echo '</div>';
                            echo '<p><input type="button" value="提交" class="btn btn-success" onclick="Update_hot_content('.$row['technology_content_id'].')"></p>';
                        }
                        ?>
                        </form>
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

            function Update_hot_content(technology_content_id){
                var data = new FormData($("#form")[0]);
                data.append("technology_content", $("#technology_content").html());
                data.append("technology_content_id", technology_content_id);
                $.ajax({
                    url: 'do-revise-hot-content.php',
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

                    }
                });
            }
        </script>
        <?php
        $technology_content_id = $_GET['technology_content_id'];
        $select1 = mysqli_query($conn, "select * from hot_technology_content where technology_content_id='$technology_content_id'");
        $row = mysqli_fetch_array($select1);
        echo '<script>';
        echo '$("#'.$row['technology_content_type'].'").attr("checked",true);';
        echo '</script>';
        ?>

		</body>

</html>
