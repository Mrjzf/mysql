<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    session_start();  //开启数据持久化
    // if(!isset($_SESSION['username']) || !isset($_SESSION['user_id'])){
    //     jump('暂未登录系统，请先登录','Admin/login.php');
    // }
    checkLogin();
    initDb();

    if (!empty($_POST)) {
        //验证数据合法性
        if(empty($_POST['title'])) back('标题不能为空');
        if(empty($_POST['content'])) back('内容不能为空');
        
        //逻辑性验证
        $title = trim($_POST['title']);  //trim(); 去除两边的空格
        $content = trim($_POST['content']);
        $user_id = $_SESSION['user_id'];
        $time = time();

        $sql ="insert into news values (null,{$user_id},'{$title}','{$content}',{$time})";
        $query = mysql_query($sql);
        //$info = mysql_fetch_array($query,MYSQL_ASSOC);  //添加数据不用取出来值，设置或者更改需要此代码
        if($query){
            jump('发布成功','Admin/list.php',2);
        }else{
            jump('发布失败','Admin/addNews.php',2);
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>发布新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>发布新闻</h2>
  <span>欢迎<b>admin</b>登录后台</span>
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
  <form class="form" action="" method="post">
    <label for="txtname">标题：</label>
    <input type="text"  name="title" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"></textarea><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="发布" />
    </div>
  </form>
</div>
</body>
</html>