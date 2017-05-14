<!DOCTYPE html>
<html lang="zh_CN">
    <head>
			  <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
				<meta http-equiv="X-UA-Compalible" content="IE=edge">

				<title>Message board</title>

				<link rel="stylesheet" type="text/css" href="bootstrap/css/message-board.css">
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		</head>

		<body>

				<!--main background photo-->
				<img src="bootstrap/images/background1.jpg" class="bg">

				<div id="root-container" class="container">
						<div id="wrapper" class="columns">
							  <!--顶部图片展示-->
								<div class="top-photo">
									  <img src="bootstrap/images/messageboaed-top-photo.jpg">
								</div>

								<!-- 导航条 -->
                <div id="menu_nav" class="menu-nav">
                    <nav class="navbar navbar-inverse navigation">
                        <div class="nav-container">
                            <div class="collapse navbar-collapse" id="demo-navbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">首页</a></li>
                                    <li><a href="aboutme.php">关于</a></li>
                                    <li><a href="blog-catalog.html">归档</a></li>
                                    <li><a href="#">资源下载</a></li>
                                    <li><a href="message-board.html">留言</a></li>
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

								<!--message-board-list -->
								<div id="message-board-list">
                    <div>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "xuzihui";
                        //连接数据库
                        $conn = new mysqli($servername, $username, $password);
                        mysqli_query($conn, "set names 'utf8'");
                        mysqli_select_db($conn, "graduation-data");  //打开数据库
                        $result = mysqli_query($conn, "select * from message_info");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<div style="margin: 30px 10px 10px 10px">';
                            echo '<div class="row">';
                            echo '<div class="col-md-2" style="font-size:17px;"><strong>'.$row['commenter_name'].'</strong></div>';
                            echo '<div class="col-md-10">'.$row['message_time'].'</div>';
                            echo '</div>';
                            echo '<p style="margin-top: 15px;">'.$row['message_content'].'</p>';
                            $result1 = mysqli_query($conn, "select * from reply_message_info");
                            while ($reply_row = mysqli_fetch_array($result1)) {
                                if($reply_row['reply_object'] === $row['message_id']){
                                    echo '<blockquote>';
                                    echo '<div class="row">';
                                    echo '<div class="col-md-6" style="font-size:15px;"><strong>'.$reply_row['reply_commenter_name'].'</strong></div>';
                                    echo '<div class="col-md-6" style="font-size:14px;">'.$reply_row['reply_message_time'].'</div>';
                                    echo '</div>';
                                    echo '<p style="margin-top:10px;font-size:13px;">'.$reply_row['reply_message_content'].'</p>';
                                    echo '</blockquote>';
                                }
                            }
                            echo '<p id="'.$row['message_id'].'reply"><kbd>'."回复".'</kbd></p>';

                            echo '<p id="'.$row['message_id'].'submit" style="display:none;float:right;"><kbd>'."提交".'</kbd></p>';
                            echo '<p id="'.$row['message_id'].'cancel" style="display:none;float:right;"><kbd>'."取消".'</kbd></p><br>';
                            echo '<form id="'.$row['message_id'].'form" name="'.$row['message_id'].'form">';
                            //echo '<input name="reply_commenter_name" style="display: none;max-width: 200px;" class="'.$row['message_id'].' form-control" placeholder="姓名">';
                            echo '<textarea name="reply_message_content" style="display:none;margin-top:10px;" class="'.$row['message_id'].' form-control"></textarea>';
                            echo '</form>';
                            echo '</div>';
                        }
                    ?>
                    </div>
								</div>
								<!--message-board-->
								<div class="message-board">
										<div style="margin-top: 50px">
                        <form id="form1" name="form1">
                            <div class="form-group">
                                <label>姓名:</label>
                                <input name="commenter_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>邮箱:</label>
                                <input name="commenter_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>留言:</label>
                                <textarea name="message_content" class="form-control" style="min-height: 100px;"></textarea>
                            </div>
                            <p><input type="button" value="提交" id="submit_message" class="btn btn-success"></p>
                        </form>

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

        <script>

            <?php
            $result1 = mysqli_query($conn, "select * from message_info");
            while ($row1 = mysqli_fetch_array($result1)) {
                echo '$("#'.$row1['message_id'].'reply").click(function(){
                    $("#'.$row1['message_id'].'reply").hide();
                    $("#'.$row1['message_id'].'submit").show();
                    $("#'.$row1['message_id'].'cancel").show();
                    $(".'.$row1['message_id'].'").show();';
                    $result2 = mysqli_query($conn, "select * from message_info");
                    while ($row2 = mysqli_fetch_array($result2)) {
                        if($row2['message_id'] != $row1['message_id']){
                            echo '$("#'.$row2['message_id'].'reply").show();';
                            echo '$("#'.$row2['message_id'].'submit").hide();';
                            echo '$("#'.$row2['message_id'].'cancel").hide();';
                            echo '$(".'.$row2['message_id'].'").hide();';
                        }
                    }
                echo '});';

                echo '$("#'.$row1['message_id'].'cancel").click(function(){
                    $("#'.$row1['message_id'].'cancel").hide();
                    $("#'.$row1['message_id'].'submit").hide();
                    $(".'.$row1['message_id'].'").hide();
                    $("#'.$row1['message_id'].'reply").show();
                });';

                echo '$("#'.$row1['message_id'].'submit").click(function(){
                    var data = new FormData($("#'.$row1['message_id'].'form")[0]);
                    var reply_commenter_name = localStorage.getItem("useremail");
                    data.append("reply_commenter_name", reply_commenter_name);
                    $.ajax({
                        url: "reply-message-upload.php?reply_object='.$row1['message_id'].'",
                        type: "POST",
                        data: data,
                        dataType: "JSON",
                        cache: false,
                        processData: false,
                        contentType: false
                    }).done(function(data){
                        switch(data){
                          case 00:
                            alert("回复成功");
                            window.location.reload();
                            break;
                          case 11:
                            alert("回复失败");
                            break;
                        }
                    });
                });';
            }

            ?>
            $("#submit_message").click(function(){
                var data = new FormData($("#form1")[0]);
                $.ajax({
                    url: 'message-upload.php',
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(ret){
                    switch (ret) {
                      case 0:
                        alert("留言成功！");
                        window.location.reload();
                        break;
                      case 1:
                        alert("留言失败！");
                        break;

                    }
                })
            });
        </script>

		</body>
</html>
