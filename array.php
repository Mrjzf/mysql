<?php
    
    header("Content-Type:text/html; charset=utf-8");  //解决中文乱码

    $arr1 = array('name' => '张三','age' => 23 );
    var_dump($arr1);

    $arr2 = ['1',2,'hello'];
    var_dump($arr2); 

    //二维数组
    $arr3 = array(
        array('name' =>'jim' , 'age'=>12),
        array('name' =>'tom' , 'age'=>22),
        array('name' =>'wl' , 'age'=>18)
    );
    echo '<pre>';
    print_r($arr3);
    echo json_encode($arr3);
    echo '<hr/>';

    $arr4 = array(1,2,3,4,5,6,7,8,9);
    foreach($arr4 as $v){
        echo $v,'<br/>';
    }