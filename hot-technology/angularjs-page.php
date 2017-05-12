<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>Hot Technology</title>

				<link rel="stylesheet" type="text/css" href="../bootstrap/css/hot-technology-style.css">
				<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		</head>

		<body>

				<!--main background photo-->
				<img src="../bootstrap/images/background1.jpg" class="bg">

				<div id="root-container" class="container">
						<div id="wrapper" class="columns">
                <!-- 导航条-->
								<div class="menu-nav">
										<nav class="nav navbar-default navbar-inverse" role="navigation">
												<div class="nav-container">
														<div class="collapse navbar-collapse" id="demo-navbar">
																<ul class="nav navbar-nav">
																	  <li><a href="../index.php">首页</a></li>
																		<li><a href="html5-page.php">HTML5</a></li>
																		<li><a href="javascript-page.php">JavaScript</a></li>
																		<li style="background: #0f6d46;"><a href="angularjs-page.html">Angular.js</a></li>
																		<li><a href="python-page.php">Python</a></li>
																		<li><a href="nodejs-page.php">Node.js</a></li>

																</ul>
														</div>

												</div>
										</nav>
								</div>

                <!--content-->
								<div class="hot-tachnology-article-catalog">
										<ul style="list-style: none;">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "xuzihui";
                        //连接数据库
                        $conn = new mysqli($servername, $username, $password);
                        mysqli_query($conn, "set names 'utf8'");
                        mysqli_select_db($conn, "graduation-data");  //打开数据库
                        $result = mysqli_query($conn, "select * from hot_technology_content");
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['technology_content_type'] == "angularjs"){
                                echo '<li style="margin: 40px 60px 0 0">';
                                echo '<a onclick="location.href=';
                                echo "'../hot-technology/hot-technology-article-show.php?technology_content_id=".$row['technology_content_id']."'";
                                echo '" target="_blank">';
                                echo '<h4 style="font-weight: bold">'.$row['technology_content_title'].'</h4>';
                                echo '</a>';
                                echo '<p>'.$row['technology_content_abstract'].'</p>';
                                echo '</li>';
                            }

                        }
                    ?>
										</ul>
								</div>

								<!-- Copyright-->
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
