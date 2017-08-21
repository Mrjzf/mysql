<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    checkLogin();
    initDb();

    $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : 0;
    if(empty($news_id)){
      back('参数错误');
    }
    //先把数据库里的新闻添加过来
    $sql = "select * from news where news_id = {$news_id}";
    $res = findOne($sql);
    var_dump($res);


    //修改新闻
    if(!empty($_POST)){
       //验证数据的合法性
       if(empty($_POST['news_id'])) back('参数错误');
       if(empty($_POST['title'])) back('标题不能为空');
       if(empty($_POST['content'])) back('内容不能为空');
       $sql = "update news set title = '{$_POST['title']}', content = '{$_POST['content']}' 
          where news_id = {$_POST['news_id']} ";
       $rs = mysql_query($sql);
       if($rs){
         jump('修改成功','Admin/list.php',2);
       }else{
         jump('修改失败','Admin/editNews.php',1);
       }
    }


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改新闻</h2>
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
    <input type="hidden" name="news_id" value="<?php echo $res['news_id']; ?>">
    <label for="txtname">标题：</label>
    <input type="text" name="title" value="<?php echo $res['title']; ?>" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"><?php echo $res['content']; ?></textarea><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="修改" />
    </div>
  </form>
</div>
</body>
</html>