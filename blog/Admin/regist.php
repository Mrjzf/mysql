<?php

  header("Content-Type:text/html; charset=utf-8");
  include '../Common/function.php';
  include '../Common/mysql.php';

  // //连接数据库
  // $link = @mysql_connect('localhost','root','123456') or die('数据库连接失败');
  // //选择数据库
  // mysql_select_db('blog',$link);
  // //设置数据库编码
  // mysql_query('set names utf8');
  initDb();

  if (!empty($_POST)) {
    if (empty($_POST['username'])) {
      back('用户名不能为空');
    }
    if (empty($_POST['password']) || empty($_POST['password1'])) {
      back('密码或确认密码不能为空');
    }
    if (empty($_POST['password']) !== empty($_POST['password1'])) {
      back('两次密码必须一致');
    }
    if (empty($_POST['email'])) {
      back('邮箱不能为空');
    }
    if (empty($_POST['mobile'])) {
      back('手机号不能为空');
    }


  $sql = "select * from user where username = '{$_POST['username']}'";
  $query = mysql_query($sql);
  $result = mysql_fetch_array($query,MYSQL_ASSOC);
  //var_dump($result);
  if (!empty($result)) {
    back('用户名已存在，请更改');
  }

  $password = md5($_POST['password']);
  $time = time();

  $sql = "insert into user values (null,'{$_POST['username']}','{$password}', '{$_POST['email']}', '{$_POST['mobile']}', '{$time}')";
  //echo $sql;die;
  $res = mysql_query($sql);
  //var_dump($res);
  if ($res) {
    jump('注册成功','Admin/login.php',3);
  }else{
    echo mysql_error();
    jump('注册失败','Admin/regist.php',3);
  }

  }

  


 
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台注册页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
  <div class="top"><h2>注册页面</h2></div>
  <div class="main">
    <form class="form" action="" method="post">
      <label for="txtname">用&ensp;户&ensp;名：</label>
      <input type="text" name="username" /><br>
      <label for="txtpswd">密&#12288;&#12288;码：</label>
      <input type="password" name="password" /><br>
      <label for="txtpswd">确认密码：</label>
      <input type="password" name="password1" /><br>  
      <label for="txtpswd">邮&#12288;&#12288;箱：</label>
      <input type="text" name="email" /><br>
      <label for="txtpswd">手&ensp;机&ensp;号：</label>
      <input type="text" name="mobile" /><br>
      <div class="btn">
        <input type="reset" />
        <input type="submit" value="注册" />
        <a href="login.php">已有账号？点击登录</a>
      </div>
    </form>
  </div>
</body>
</html>