<!DOCTYPE html>
<html lang="zh_CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <!-- 以下代码告诉IE浏览器，IE8/9及以后的版本都会以最高版本IE来渲染页面 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Home</title>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/index-style.css">

    </head>
    <body>

        <!-- main background photo -->
        <img src="bootstrap/images/background1.jpg" class="bg">

        <div id="root-container" class="container">
            <div id="wrapper" class="columns">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "xuzihui";
                    $conn = new mysqli($servername, $username, $password);  //连接数据库
                    mysqli_query($conn, "set names 'utf8'");
                    mysqli_select_db($conn, "graduation-data");  //打开数据库
                    //图片轮播
                    echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
                    //Indicators
                    echo '<ol class="carousel-indicators">';
                    $count_result = mysqli_query($conn, "select * from recommend_content_info");
                    for ($i=0; $i < mysqli_num_rows($count_result) || $i > 4; $i++) {
                        echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
                    }
                    echo '</ol>';
                    // Wrapper for slides
                    echo '<div class="carousel-inner" role="listbox">';
                    $content_result = mysqli_query($conn, "select * from recommend_content_info");
                    $a = 0;
                    while ($row = mysqli_fetch_array($content_result)) {
                        if ($a == 0) {
                            echo '<div class="item active">';
                            echo '<img src="all-backstage-page/recommend-content-img/'.$row['backgroundImg'].'" alt="">';
                            echo '<div class="carousel-caption">';
                            echo '<h1>'.$row['content_title'].'</h1>';
                            echo '<p>'.$row['content_abstract'].'</p>';
                            echo '<button type="button" class="btn btn-success" onclick="location.href=';
                            echo "'slide-photo-content-show.php?content_id=".$row['content_id']."'";
                            echo '">'."点击进入".'</button>';
                            echo '</div>';
                            echo '</div>';
                            $a = $a+1;
                        } else if($a > 4){
                            break;
                        } else {
                            echo '<div class="item">';
                            echo '<img src="all-backstage-page/recommend-content-img/'.$row['backgroundImg'].'" alt="">';
                            echo '<div class="carousel-caption">';
                            echo '<h1>'.$row['content_title'].'</h1>';
                            echo '<p>'.$row['content_abstract'].'</p>';
                            echo '<button type="button" class="btn btn-success" onclick="location.href=';
                            echo "'slide-photo-content-show.php?content_id=".$row['content_id']."'";
                            echo '">'."点击进入".'</button>';
                            echo '</div>';
                            echo '</div>';
                            $a = $a+1;
                        }

                    }
                    echo '</div>';
                    //Controls
                    echo '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
                    echo '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
                    echo '<span class="sr-only">Previous</span>';
                    echo '</a>';
                    echo '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">';
                    echo '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
                    echo '<span class="sr-only">Next</span>';
                    echo '</a>';
                    echo '</div>';

                    // <!-- 导航条 -->
                    echo '
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
                                                <li><a href="hot-technology/html5-page.php" target="_blank">HTML5</a></li>
                                                <li><a href="hot-technology/javascript-page.php" target="_blank">JavaScript</a></li>
                                                <li><a href="hot-technology/angularjs-page.php" target="_blank">Angular.js</a></li>
                                                <li><a href="hot-technology/python-page.php" target="_blank">Python</a></li>
                                                <li><a href="hot-technology/nodejs-page.php" target="_blank">Node.js</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </nav>
                    </div>
                    ';

                    // 视频
                    echo '<div class="grid-video">';
                    $video_result = mysqli_query($conn, "select * from recommend_video_info");
                    $video_row = mysqli_fetch_array($video_result);
                    echo '<h3>'.$video_row['video_name'].'</h3>';
                    echo '<p style="text-indent: 30px; margin: 50px 60px;">'.$video_row['video_abstract'].'</p>';
                    if($video_row['video_type'] === "video_address" || $video_row['video_type'] === "flash_address"){
                        echo '<video src="'.$video_row['video_url'].'"></video>';
                    } else {
                        echo $video_row['video_url'];
                    }
                    echo '</div>';
                    echo '<hr>';
                    echo '<div class="grid-container">';
                    $news_result = mysqli_query($conn, "select * from hot_technology_content order by technology_content_time desc");
                    $n = 0;
                    while ($new_row = mysqli_fetch_array($news_result)) {
                        if ($n < 3) {
                            echo '<div style="margin: 40px 100px">';
                            echo '<a onclick="location.href=';
                            echo "'hot-technology/hot-technology-article-show.php?technology_content_id=".$new_row['technology_content_id']."'";
                            echo '" target="_blank">';
                            echo '<h4 style="font-weight: bold;">'.$new_row['technology_content_title'].'</h4>';
                            echo '</a>';
                            echo '<kbd>'.$new_row['technology_content_type'].'</kbd>&nbsp&nbsp&nbsp';
                            echo '<span>'.$new_row['technology_content_time'].'</span>';
                            echo '<p style="margin-top:10px;">'.$new_row['technology_content_abstract'].'</p>';
                            echo '</div>';
                            $n += 1;
                        }
                    }
                    echo '</div>';
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
                                <a href="www.runoob.com" target="_blank"><p>RUNOOB.COM</p></a>
                                <a href="www.w3school.com.cn" target="_blank"><p>W3C</p></a>
                            </div>
                            <div class="col-md-3" style="margin: 20px 0">
                                <h4>个人操作</h4>
                                <a id="gotoBackstage" target="_blank"><p>进入控制台</p></a>
                                <a id="sign_out"><p>退出</p></a>
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
        <!-- 模态框（Modal） -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">
						<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel">请登录</h4>
										</div>
										<div class="modal-body">
                        <div style="margin:50px;">
                            <form class="form-horizontal" name="form" id="form">
                                <div class="form-group">
                                    <label>登录邮箱</label>
                                    <input name="email" class="form-control" id="useremail">
                                </div>
                                <div class="form-group">
                                    <label>登录密码</label>
                                    <input type="password" name="password" class="form-control" id="userpassword">
                                </div>
                                <div class="form-group">
                                    <div class="login-button">
                                        <button id="loginbutton" type="button" class="btn btn-success">Log in</button>
                                    </div>
                                </div>
                                <div class="goto-register">
                                    <a href="register.html"><p class="text-primary">No account? Please click me to register...</p></a>
                                </div>
                            </form>
                        </div>
                    </div>
								</div><!-- /.modal-content -->
						</div><!-- /.modal -->
				</div>

        <script src="bootstrap/js/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                var useremail = localStorage.getItem("useremail");
                if(useremail == null || useremail == ""){
                    $('#myModal').modal();
                }
            })
            $("#loginbutton").click(function(){
                var data = new FormData($("#form")[0]);
                $.ajax({
                    url: 'userlogin.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(data){
                    if (data['whether_login'] == 0) {
                        localStorage.setItem("useremail", data['username']);
                        localStorage.setItem("limit", data['identity']);
                        window.location.href="index.php";
                    } else if (data['whether_login'] == 1) {
                        alert("输入密码错误");
                    } else if (data['whether_login'] == 2) {
                        alert("用户不存在");
                    }
                })
            })
            $("#gotoBackstage").click(function(){
                if (localStorage.getItem("limit") == 0) {
                    window.location.href="all-backstage-page/homepage-slidephoto-recommend.php";
                } else {
                    alert("抱歉，你当前的权限不能进入后台进行操作！");
                }
            })
            $("#sign_out").click(function(){
                localStorage.setItem("useremail", "");
                window.location.href="index.php";
            })
        </script>

    </body>
</html>
