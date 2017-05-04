<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>About me</title>

				<link rel="stylesheet" type="text/css" href="bootstrap/css/aboutme.css">
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		</head>

		<body>

				<!--main background photo-->
				<img src="bootstrap/images/background1.jpg" class="bg">

				<div id="root-container" class="container">
						<div id="wrapper" class="columns">
							  <!--顶部图片展示-->
								<div class="top-photo">
									  <img src="bootstrap/images/aboutmepage-top-photo.jpg">
								</div>

								<!-- 导航条 -->
                <div id="menu_nav" class="menu-nav">
                    <nav class="navbar navbar-inverse navigation">
                        <div class="nav-container">
                            <div class="collapse navbar-collapse" id="demo-navbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.html">首页</a></li>
                                    <li><a href="aboutme.html">关于</a></li>
                                    <li><a href="blog-catalog.html">归档</a></li>
                                    <li><a href="#">资源下载</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#remind-no-content">留言</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">热门技术<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#tab-html5">HTML5</a></li>
                                            <li><a href="#tab-javascript">JavaScript</a></li>
                                            <li><a href="#tab-angularjs">Angular.js</a></li>
                                            <li><a href="#tab-python">Python</a></li>
                                            <!-- <li class="divider"></li> -->
                                            <li><a href="#tab-nodejs">Node.js</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </nav>
                </div>

								<!--my detail-->
								<!-- <div class="my-detail">
										<div class="avatar">
												<img style="width: 150px" src="bootstrap/images/avatar.png">
										</div>
										<div class="basic-info">
												<p>姓名: xuzihui</p>
												<p>邮箱: zihui_xu@126.com</p>
												<p>Github: https://github.com/Bronze-hammer</p>
												<p>Blog: http://specterxu.iteye.com</p>

										</div>
										<div class="introduce">
											  <p style="text-indent: 30px; margin: 40px 0">
												本人学生一枚，幽默风趣，易于交友，爱生活，爱学习，对计算机科学感兴趣，喜欢学习编程语言。
												有事喜欢读读书，有时喜欢去外面旅游，见识见识美好的事物。但总体上来说，我其实是个宅男。
												这样的表现我就得用一个词形容自己:程序猿+单身狗！！！好吧，这是两个词 -_-||</p>
										</div>
								</div> -->
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
                        echo '<div class="my-detail">';
                        echo '<div class="avatar">
    												  <img style="width: 150px" src="bootstrap/images/avatar.png">
    										      </div>';
                        echo '<div style="margin: 40px 0;">';
                        echo '<p>';
                        echo "姓名：".$row['name'];
                        echo '</p>';
                        echo '<p>';
                        echo "邮箱：".$row['email'];
                        echo '</p>';
                        echo '<p>';
                        echo "Github：".$row['github_id'];
                        echo '</p>';
                        echo '<p>';
                        echo "Blog：".$row['blog_id'];
                        echo '</p>';
                        echo '<div class="introduce">';
                        echo '<p style="margin: 40px 0;">';
                        echo $row['self_introduction'];
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
                <!-- footer -->
                <div id="footer">
                    <div class="footer-content">
                        <div class="row">
                            <div class="col-md-3" style="margin: 20px 0">
                                <h4>介绍</h4>
                                <p>Phone:17337712587</p>
                                <p>email:zihui_xu@126.com</p>
                            </div>
                            <div class="col-md-3" style="margin: 20px 0">
                                <h4>友情链接</h4>
                                <a href="www.runoob.com"><p>RUNOOB.COM</p></a>
                                <a href="www.w3school.com.cn"><p>W3C</p></a>
                            </div>
                            <div class="col-md-3" style="margin: 20px 0">
                                <h4>个人操作</h4>
                                <a id="gotoBackstage" target="_blank"><p>进入控制台</p></a>
                            </div>
                            <div class="col-md-3" style="margin: 20px 0">
                                <h4>共享资源</h4>
                                <p>下载资料</p>
                            </div>
                        </div>
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
		</body>
</html>