# my-graduation-project

> bootstrap version 3.3.7-dist

> jquery version 3.1.1

> ueditor version 1_4_3_3-utf8-php（已放弃使用）

> wangEditor version 2.1.23

### 2017.03.28



### 2017.05.04
```html
<form enctype="multipart/form-data">
```
##### 表单中enctype="multipart/form-data"的意思，是设置表单的MIME编码。默认情况，这个编码格式是application/x-www-form-urlencoded，不能用于文件上传；只有使用了multipart/form-data，才能完整的传递文件数据，进行下面的操作.

### 2017.05.05
```mysql
ALTER TABLE `recommend_content_info` ADD PRIMARY KEY(`content_title`);
```
###### mysql数据库把数据表recommend_content_info中的content_title列设置为主键

### 2017.05.07
```php
if($content_title){
  echo '<script>alert("提交成功！");location.href="'.$url.'"</script>';
}else {
  echo '<script>alert("提交失败！");location.href="'.$url.'"</script>';
}
```
### 2017.05.08
##### 原生jQuery实现文件上传功能
```html
<!doctype html>
<html lang="zh">
    <head>
        <meta charset="utf-8">
        <title>HTML5 Ajax Uploader</title>
        <script src="jquery-3.1.1.min.js"></script>
    </head>

    <body>
        <p><input type="file" id="upfile" name="upfile"></p>
        <p><input type="button" id="upJQuery" value="用jQuery上传"></p>
        <script>

            $('#upJQuery').on('click', function() {
               var fd = new FormData();
               fd.append("upload", 1);
               fd.append("upfile", $("#upfile").get(0).files[0]);
               $.ajax({
                   url: "index.php",
                   type: "POST",
                   processData: false,
                   contentType: false,
                   data: fd,
                   success: function(d) {
                      console.log(d);
                   }
               });
            });
        </script>
    </body>
</html>
```

```php
if (isset($_POST['upload'])) {
    var_dump($_FILES);
    $ext = pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['upfile']['tmp_name'], 'up_tmp/'.time().'.dat');
    //header('location: test.php');
    exit;
}
```
