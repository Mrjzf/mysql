<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    checkLogin();
    initDb();
    //定义一个导航数量的变量
    $maxNav = 7;
    if(!empty($_POST)){
       //验证数据的合法性
       if(empty($_POST['nav_name'])) back('名称不能为空');
       if(empty($_POST['nav_url'])) back('地址不能为空');
       //判断导航数量是否超过了7个
       $sql = "select count(*) as count from nav";
       $rs = findOne($sql);
       //var_dump($rs);
       if($rs['count'] >= $maxNav){
           $sql = "select * from nav where nav_name = '{$_POST['nav_name']}' limit 1";
           $navName = findOne($sql);
           if(empty($navName)){
               back('导航数量不能超过{$maxNav}个');
           }
       }

       $addtime = time();
       $sql = "replace into nav values (null,'{$_POST['nav_name']}','{$_POST['nav_url']}',{$_POST['nav_order']},{$addtime})";
       $result = mysql_query($sql);
       if($result){
           jump('添加成功','Admin/nav.php',2);
       }else{
           jump('添加失败','Admin/addNav.php',2);
       }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>添加官网导航菜单</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>添加官网导航菜单</h2>
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
    <label for="txtname">导航名称：</label>
    <input type="text"  name="nav_name"  /><br>
    <label for="txtpswd">导航地址：</label>
    <input type="text"  name="nav_url"  /><br>
    <label for="txtpswd">导航排序：</label>
    <input type="text"  name="nav_order" value="" placeholder="正序排序" /><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="添加" />
    </div>
  </form>
</div>
</body>
</html>