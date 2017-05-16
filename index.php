<!DOCTYPE html>
<html lang="zh_CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <!-- 以下代码告诉IE浏览器，IE8/9及以后的版本都会以最高版本IE来渲染页面 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Home</title>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/index.css">

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
                    // $result = mysqli_query($conn, "select * from recommend_content_info");
                    // echo '<div>'.mysqli_num_rows($result).'</div>';
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
                                        <li><a href="blog-catalog.html">归档</a></li>
                                        <li><a href="resource-download.php">资源下载</a></li>
                                        <li><a href="message-board.php">留言</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">热门技术<span class="caret"></span></a>
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
                    // <div class="grid-video">
                    //
                    //     <p style="text-indent:30px; margin: 50px 60px;">2016苹果秋季新品发布会于美国当地时间9月7日上午10点（北京时间9月8日凌晨1点）在比尔·格雷厄姆市政礼堂举行。发布会宣布超级马里奥兄弟登录iPhone平台，iWork新增远程实时协作功能，精灵宝可梦GO登录Apple Watch。发布了Apple Watch 2、iPhone 7、iPhone 7 Plus、Apple AirPods等新产品</p>
                    //
                    //     <embed src="http://player.video.qiyi.com/8f791f95f0e41919a6528e8cc44047f9/0/0/v_19rrldgn5w.swf-albumId=494767400-tvId=494767400-isPurchase=0-cnId=30" quality="high" width="90%" height="500" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
                    //
                    // </div>
                    //
                    // <!-- 栅格布局，发表博客的展示 -->
                    // <div class="grid-container">
                    //     <div class="row">
                    //         <div class="col-md-4">
                    //             <img style="box-shadow: 8px 8px 5px #888888;" class="img-circle" src="bootstrap/images/grid_photo/grid-img1.jpg" alt="">
                    //             <h3 style="text-align: center;">Mac OS</h3>
                    //             <p style="text-indent:30px">Mac OS是一套运行于苹果Macintosh系列电脑上的操作系统，是首个在商用领域成功的图形用户界面操作系统。</p>
                    //         </div>
                    //         <div class="col-md-4">
                    //             <img style="box-shadow: 8px 8px 5px #888888;" class="img-circle" src="bootstrap/images/grid_photo/grid-img2.jpg" alt="">
                    //             <h3 style="text-align: center;">Linux</h3>
                    //             <p style="text-indent:30px">Linux是一套免费使用和自由传播的类Unix操作系统，是一个基于POSIX和UNIX的多用户、多任务、支持多线程和多CPU的操作系统</p>
                    //         </div>
                    //         <div class="col-md-4">
                    //             <img style="box-shadow: 8px 8px 5px #888888;" class="img-circle" src="bootstrap/images/grid_photo/grid-img3.jpg" alt="">
                    //             <h3 style="text-align: center;">Window</h3>
                    //             <p style="text-indent:30px">Microsoft Windows,是美国微软公司研发的一套操作系统，它问世于1985年。</p>
                    //         </div>
                    //     </div>
                    // </div>
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
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
								<div class="modal-content">

										<div class="modal-header">
												<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
												<h4 class="modal-title" id="myModalLabel">请登录</h4>
										</div>

										<div class="modal-body">
                        <div style="margin:50px;">
                            <form class="form-horizontal" action="logincheck.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">登录邮箱</label>
                                    <input type="email" name="email" class="form-control" id="useremail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">登录密码</label>
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="login-button">
                                        <button id="loginbutton" type="button" class="btn btn-success">Log in</button>
                                    </div>
                                    <!-- <div class="login-button">
                                        <button id="gotohomepage" type="button" class="btn btn-success">Back HomePage</button>
                                    </div> -->
                                </div>
                                <div class="goto-register">
                                    <a href="register.html"><p class="text-primary">No account? Please click me to register...</p></a>
                                </div>
                            </form>
                        </div>
                    </div>

										<div class="modal-footer">
												<!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> -->
												<button type="button" class="btn btn-primary">提交更改</button>
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
            });
            $("#loginbutton").click(function(){
                var useremail = $("#useremail").val();
                var userpassword = $("#userpassword").val();
                if( useremail != "" && userpassword != "") {
                    //localStorage.setItem("username", useremail);
                    //localStorage.setItem("password", userpassword);
                    //window.location.href="all-backstage-page/homepage-slidephoto-recommend.html";

                    $.ajax({
                        type: "POST",
                        url: "userlogin.php",
                        dataType: "JSON",
                        data: {
                            "useremail": useremail,
                            "userpassword": userpassword
                        },
                        success: function(data){
                            switch(data){
                                case 1:  //登录成功
                                    //$.cookie("useremail", useremail);
                                    //$.cookie("limit", 0);
                                    localStorage.setItem("useremail", useremail);
                                    localStorage.setItem("limit", 0);
                                    // window.location.href="all-backstage-page/homepage-slidephoto-recommend.html";
                                    window.location.href="index.php"
                                    break;
                                case 2:
                                    alert("密码错误！");
                                    break;
                                case 3:
                                    alert("用户不存在！")
                                    break;
                            }
                        }
                    })
                } else {
                    //$("#tishi").text("密码错误！");
                    alert('请检查你的输入！');
                    $("#userpassword").val("");
                };
            });
            $("#gotoBackstage").click(function(){
                window.location.href="all-backstage-page/homepage-slidephoto-recommend.php";
            })
            // $("#gotoBackstage").click(function(){
            //     var useremail = localStorage.getItem("useremail");
            //
            //     if (useremail == null || useremail == "") {
            //
            //         window.location.href="login.html";
            //     } else {
            //         window.location.href="all-backstage-page/homepage-slidephoto-recommend.html";
            //     }
            //
            // });
        </script>

    </body>
</html>
