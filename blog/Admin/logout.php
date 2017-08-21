<?php
    /*
    *退出功能代码
    */
    header("Content-Type:text/html; charset=utf-8");

    @session_start();
    include '../Common/function.php';
    $_SESSION = array();
    jump('退出成功','Admin/login.php',2);
?>