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
            <!-- 右侧内容 -->
            <div class="page-wrapper">
                <div style="margin-top:20px;">
                    <ul class="nav nav-tabs" role="tablist" id="tab-list">
                        <li class="active"><a href="#recommend-content-list" role="tab" data-toggle="tab">上传推荐文章</a></li>
                        <li><a href="#recommend-content-edit" role="tab" data-toggle="tab">推荐文章列表</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="recommend-content-list">
                            <!-- 页面页首滑动图片内容推荐 -->
                            <div class="slide-photo-content-recommend">
                                <h2>页面页首滑动图片内容推荐</h2>
                                <form name="form" id="form">
                                    <div class="form-group">
                                        <label>详细内容：</label>
                                        <div id="test-editormd">
                                            <textarea class="editormd-markdown-textarea" style="display:none;"></textarea>
                                        </div>
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
                                    <button id=""
                                <form>
                            </div>
                        </div>
                        <div class="tab-pane" style="margin:50px;" id="recommend-content-edit">


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
            var testEditor = editormd("test-editormd", {
                width: "100%",
                height: 300,
                saveHTMLToTextarea: true,
                value: "### hello"
            });
            // testEditor.getMarkdown();       // 获取 Markdown 源码
            // testEditor.getHTML();           // 获取 Textarea 保存的 HTML 源码
            // testEditor.getPreviewedHTML();  // 获取预览窗口里的 HTML，在开启 watch 且没有开启 saveHTMLToTextarea 时使用
        </script>
        <script type="text/javascript">
            //实例化编辑器
            // var editor = new wangEditor('content');
            //editor.config.uploadImgUrl = '../all-backstage-page/recommend-content-img';
            // editor.config.hideLinkImg = true;
            // editor.create();
            $("#exit").click(function(){
                localStorage.setItem("useremail", "");
                window.location.href="../login.html";
            });
            $("#button_recommend_content").click(function(){
                var data = new FormData($('#form')[0]);
                // data.append("content", $("#content").html());
                data.append("content", editor.$txt.html());
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
        </script>
		</body>

</html>
