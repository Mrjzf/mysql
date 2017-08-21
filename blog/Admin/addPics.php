<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    initDb();

  if(!empty($_FILES) && $_FILES['pic']['error'] ==0){
    //获取图片名称，改后缀名，生成一个随机的图片名称
    $ext = strrchr($_FILES['pic']['name'],'.');
    $newPic = time().mt_rand(1000,9999).$ext;  //时间戳+随机数+后缀名 = 图片新名称
    //上传图片
    $uploadDir = '../Public/Upload/';
    move_uploaded_file($_FILES['pic']['tmp_name'],$uploadDir.$newPic);
    //var_dump($_FILES);
    $addtime = time();
    $sql = "insert into pics values(null,'{$newPic}','{$addtime}')";
    $res = mysql_query($sql);
    if ($res) {
       jump('图片上传成功','Admin/picList.php',2);
    }else{
       jump('图片地址写入失败','Admin/addPics.php',2);     
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>图片上传</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
 <h2>图片上传页</h2>
</div>
<div class="nav">
 <ul>
   <li><a href="index.php">后台首页</a></li>
   <li><a href="addNews.php">发布文章</a></li>
   <li><a href="list.php">文章列表</a></li>
   <li><a href="addNav.php">导航添加</a></li>
   <li><a href="nav.php">导航列表</a></li>
   <li><a href="addPics.php">上传图片</a></li>
   <li><a href="picList.php">相册列表</a></li>
   <li><a href="logout.php">退出后台</a></li>
 </ul>
</div>
<div class="main">
  <form class="form" action="" method="post" enctype="multipart/form-data">
    <label for="txtname">选择图片：</label>
    <input type="file" multiple name="pic"><br>
    <div class="btn"><input type="submit"></div>
  </form>
</div>
</body>
</html>