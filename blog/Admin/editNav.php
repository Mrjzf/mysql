<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    checkLogin();
    initDb();

    $navId = isset($_GET['id']) ? $_GET['id'] : 0;
    if(empty($navId)){
        back('参数错误');
    }

    $sql = "select * from nav where id = {$navId}";
    //$result = mysql_query($sql);
    // $a = mysql_fetch_array($result,MYSQL_ASSOC);
    $result = findOne($sql);
    //var_dump($result);
    
    if(!empty($_POST)){
        if(empty($_POST['nav_name'])) back('名称不能为空');
        if(empty($_POST['nav_url'])) back('地址不能为空');
        $sql = "update nav set nav_name = '{$_POST['nav_name']}',nav_url = '{$_POST['nav_url']}',nav_order = {$_POST['nav_order']} where id = {$navId}";
        $rs = mysql_query($sql);
        if($rs){
            jump('修改成功','Admin/nav.php',2);
        }else{
            jump('修改失败','Admin/editNav.php',2);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改导航菜单</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改导航菜单</h2>
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
    <input type="hidden" name="id" value="<?php echo $result['id']?>">
    <label for="txtname">菜单名称：</label>
    <input type="text" name="nav_name" value="<?php echo $result['nav_name']?>" /><br>
    <label for="txtpswd">菜单地址：</label>
    <textarea name="nav_url"><?php echo $result['nav_url']?></textarea><br>
    <label for="txtpswd">菜单排序：</label>
    <input type="text" name="nav_order" value="<?php echo $result['nav_order']?>" />
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="修改" />
    </div>
  </form>
</div>
</body>
</html>