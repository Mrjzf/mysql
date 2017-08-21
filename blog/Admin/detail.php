<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    checkLogin();
    initDb();

    $news_id = isset($_GET['news_id']) ? trim($_GET['news_id']) : 0;
    $sql = "select * from news where user_id = {$_SESSION['user_id']} and news_id = {$news_id}";
    $query = findOne($sql);
    //var_dump($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>新闻详情</title>
 <link rel="stylesheet" href="../Public/css/basic.css" />
 <link rel="stylesheet" href="../Public/css/Admin-detail.css" />
</head>
<body>
<div class="top"><h2>文章列表页面</h2></div>
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
  <h3><?php echo $query['title']?></h3>
  <p><font size="2">发布时间：<?php echo date('Y年-m月-d日 H:i:s',$query['addtime'])?></font></p>
  <hr width="100%" align="left" />
  <div class="con">
    <p><?php echo $query['content']?></p>
  </div>
</div>
</body>
</html>