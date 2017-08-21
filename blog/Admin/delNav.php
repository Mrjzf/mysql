<?php
    /*
    *删除导航
    */

    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    checkLogin();
    initDb();

    $nav_id = isset($_GET['id']) ? $_GET['id'] : 0;
    if(empty($nav_id)){
        back('参数错误');
    }
    $sql = "delete from nav where id = {$nav_id}";
    $result = mysql_query($sql);
    if($result){
        jump('删除成功','Admin/nav.php',2);
    }else{
        jump('删除失败','Admin/nav.php',2);
    }