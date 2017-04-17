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
                            <li><a href="#">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!--sidebar-->
            <nav class="navbar-side navbar-side-style" role="navigation">
                <ul class="nav">
                    <li>
                        <a class="active-menu" href="personal-info.html">
                            <i>个人信息</i>
                        </a>
                    </li>
                    <li>
                        <a class="active-menu" href="homepage-slidephoto-recommend.html">
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
                          <a class="active-menu" href="hot-technology-edit.html">
                              <i>热门语言</i>
                          </a>
                      </li>
                      <li>
                          <a class="active-menu" href="messages-administration.html">
                              <i>留言管理</i>
                          </a>
                      </li>
                      <li>
                          <a class="active-menu" href="resources-upload-download.html">
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
							  <!-- 资源上传下载 -->
								<div class="slide-photo-content-recommend">
									  <h2>资源上传下载</h2>
                    <div>
                        <form action="doAction.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="MAX_FILE_SIZE" value="176943" />
                                <label>选择要上传的资源文件:</label>
                                <input type="file" name="myfile" /></br />
                                <input type="submit" value="上传文件" />
                            </div>
                            <div class="form-group">
                                <label>上传文件的摘要介绍:</label>
                                <textarea class="form-control" placeholder="摘要"></textarea>
                            </div>
                            <div>
                                <table class="table table-hover">
                                    <tr class="active">
                                        <td class="active">1</td>
                                        <td class="success">2</td>
                                        <td class="warning">3</td>

                                    </tr>
                                    <tr class="active">
                                        <td class="active">1</td>
                                        <td class="success">2</td>
                                        <td class="warning">3</td>

                                    </tr>
                                    <tr class="active">
                                        <td class="active">1</td>
                                        <td class="success">2</td>
                                        <td class="warning">3</td>

                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
								</div>
						</div>
				</div>


				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>

		</body>

</html>
