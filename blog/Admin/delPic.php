<?php
    header("Content-Type:text/html; charset=utf-8");
    include '../Common/function.php';
    include '../Common/mysql.php';
    initDb();

    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    // if($id<=0){
    //     back('参数错误');
    // }

    $sql = "select * from pics where id = {$id} limit 1"; //获取一条
    $pic = findOne($sql);
    
    //删除源文件
    unlink('../Public/Upload/'.$pic['pic_url']);
    //删除数据库地址
    $sql = "delete from pics where id = {$id}";
    $res = mysql_query($sql);
    if ($res) {
        jump('删除成功','Admin/picList.php',2);
    }else{
        jump('删除失败','Admin/picList.php',2);
    }
?>
