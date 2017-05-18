<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>About me</title>

				<link rel="stylesheet" type="text/css" href="../bootstrap/css/hot-technology-article-style.css">
				<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		</head>

		<body>

				<!--main background photo-->
				<img src="../bootstrap/images/background1.jpg" class="bg">

				<div id="root-container" class="container">
						<div id="wrapper" class="columns">


								<!-- 导航条 -->
                <div class="menu-nav">
										<nav class="nav navbar-default navbar-inverse" role="navigation">
												<div class="nav-container" style="width: 510px;">
														<div class="collapse navbar-collapse" id="demo-navbar">
																<ul class="nav navbar-nav">
																	  <li><a href="../index.php">首页</a></li>
																		<!-- <li style="background: #0f6d46;"><a href="html5-page.php">HTML5</a></li> -->
                                    <li><a href="html5-page.php">HTML5</a></li>
																		<li><a href="javascript-page.php">JavaScript</a></li>
																		<li><a href="angularjs-page.php">Angular.js</a></li>
																		<li><a href="python-page.php">Python</a></li>
																		<li><a href="nodejs-page.php">Node.js</a></li>

																</ul>
														</div>
												</div>
										</nav>
								</div>
                <?php
                //content
                    $technology_content_id = $_GET['technology_content_id'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "xuzihui";
                    $conn = new mysqli($servername, $username, $password);  //连接数据库
                    mysqli_query($conn, "set names 'utf8'");
                    mysqli_select_db($conn, "graduation-data");  //打开数据库
                    $result = mysqli_query($conn, "select * from hot_technology_content where technology_content_id=$technology_content_id");
                    $row = mysqli_fetch_array($result);
                    echo '<div class=blog-content>';
                    echo '<div class="blog-item">';
                    echo '<h2 class="blog">'.$row['technology_content_title'].'</h2>';
                    echo '<p class="blog-item-meta">'.$row['technology_content_time'].'</p>';
                    echo '<blockquote class="post float-left"><p>'.$row['technology_content_abstract'].'</p></blockquote>';
                    echo '<p>'.$row['technology_content'].'</p>';
                    echo '</div>';
                    echo '</div>';
                ?>
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

				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>
		</body>
</html>
