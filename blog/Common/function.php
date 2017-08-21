<?php
    /**
    *公共函数文件
    */

    //返回上一步
    function back($msg=''){
        echo $msg;
        $back = <<<eof
		    <script type="text/javascript">
			    window.history.go(-1);
		    </script>
eof;
        echo $back;
        exit();
    }

    //跳转函数
                 //提示信息，跳转地址，延迟时间
    function jump($msg,$url,$time=1){
        $url = 'http://www.blog.com/'.$url;
        //跳转提示功能
        header("Refresh:{$time};url='{$url}'");
        echo $msg."系统将在{$time}秒之后自动跳转到{$url}";
        //终止脚本
        exit();
    }

    //登录函数
    function checkLogin(){
        @session_start();
        if(!isset($_SESSION['username']) || !isset($_SESSION['user_id'])){
            jump('您还未登录系统，请先登录','Admin/login.php',2);
         }
    }

