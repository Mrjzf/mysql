<?php
    /*
    *删除新闻
    */

    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    checkLogin();
    initDb();

    $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : 0;
    if(empty($news_id)){
        back('参数错误');
    }
    $sql = "delete from news where news_id = {$news_id}";
    $result = mysql_query($sql);
    if($result){
        jump('删除成功','Admin/list.php',2);
    }else{
        jump('删除失败','Admin/list.php',2);
    }