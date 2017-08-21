<?php
    header("Content-Type:text/html; charset=utf-8");
    //链接数据库
    $link = @mysql_connect('localhost','root','123456') or die('数据连接失败');

    //选择数据库
    mysql_select_db('blog',$link);   //mysql_query('use blog')

    
