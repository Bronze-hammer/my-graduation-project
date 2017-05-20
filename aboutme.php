<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>About me</title>

				<link rel="stylesheet" type="text/css" href="bootstrap/css/aboutme-style.css">
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
                                    <li><a href="index.php">首页</a></li>
                                    <li><a href="aboutme.php">关于</a></li>
                                    <li><a href="resource-download.php">资源下载</a></li>
                                    <li><a href="message-board.php">留言</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">归档<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#tab-html5">HTML5</a></li>
                                            <li><a href="#tab-javascript">JavaScript</a></li>
                                            <li><a href="#tab-angularjs">Angular.js</a></li>
                                            <li><a href="#tab-python">Python</a></li>
                                            <li><a href="#tab-nodejs">Node.js</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
								<!--my detail-->
                <div class="my-detail">
                    <div class="avatar">
                        <img style="width:150px;height:190px;" src="bootstrap/images/avatar.jpg" class="img-circle">
                    </div>
                    <div style="margin: 40px 0;">
                        <p>姓名：徐子辉</p>
                        <p>邮箱：zihui_xu@126.com</p>
                        <p>Github：https://github.com/Bronze-hammer</p>
                        <p>Blog：specterxu.iteye.com</p>
                        <div class="introduce">
                            <blockquote>
                                <p style="font-size:15px;">有时候，我多么希望能有一双睿智的眼睛能够看穿我，能够明白了解我的一切，包括所有的斑斓和荒芜。
                                  那双眼眸能够穿透我的最为本质的灵魂，
                                  直抵我心灵深处那个真实的自己，她的话语能解决我所有的迷惑，或是对我的所作所为能有一针见血的评价。</p>
                                <footer style="float:right;">三毛</fonter>
                            </blockquote>
                        </div>
                        <div style="margin-top:100px;">
                            <h5>项目1 <cite>个人博客网站</cite></h5>
                            <img style="width:70%;box-shadow:0 5px 20px #444;" src = "bootstrap/images/project.png">
                        </div>
                    </div>
                </div>
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
                                <a href="resource-download.php"<p>下载资料</p><a>
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
