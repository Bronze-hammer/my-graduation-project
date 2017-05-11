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
								<!--content-->
                <!-- <div class="blog-content">
                    <div class="blog-item">
                        <img src="../bootstrap/images/blogshow-top-photo.jpg" alt="" />
                        <h2 class="blog">Duis aute irure dolor in reprehenderit in voluptate</h2>
                        <p class="blog-item-meta">
                            15 Jun 2012, by John Doe
                        </p>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        </p>
                        <blockquote class="post float-left">
                            <p>
                                Veritatis et quasi architecto beatae vitae dicta sunt explicabo in culpa qui est laborum.
                            </p>
                        </blockquote>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                        </p>
                        <p>
                            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                        </p>
                        <blockquote class="post float-right">
                            <p>
                                Veritatis et quasi architecto beatae vitae dicta sunt explicabo in culpa qui est laborum.
                            </p>
                        </blockquote>
                        <p>
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore
                        </p>
                        <p>
                            Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                        </p>


                    </div>
                </div> -->

                <!--comment-->
                <div class="comment">
                    <h4>Leave a Comment</h4>
                    <p>
                        Feel free to leave us a comment. Just simply enter the form below and click Submit.
                    </p>
                    <!--表单-->
                    <div style="margin-top: 50px">
                        <div class="form-group">
                            <label>姓名:</label>
                            <input class="form-control" id="commentInputname" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>邮箱:</label>
                            <input class="form-control" id="commentInputemail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>评论:</label><br>
                            <textarea style="width: 100%; height: 200px;" id="commentInput" placeholder="please input comment in here...">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="submit">
                                <button style="width: 100px" type="submit" class="btn btn-success">提交</button>
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

				<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
				<script src="../bootstrap/js/bootstrap.min.js"></script>
		</body>
</html>
