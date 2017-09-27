<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-28 16:42:31
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-08-01 19:37:14
 */
//数组指针的操作

$arr=range(1,10);
//指针的默认位置-最顶头初始位置
echo current($arr);//1
echo next($arr);//2
echo current($arr);//2
echo prev($arr);//1

echo end($arr);//10
echo next($arr);//null
echo reset($arr);//1
//使用指针操作法遍历一个数组，并输出数组中每个院素的key-value

//除了使用$arr这个变量，不准使用其他变量
echo'<hr>';
$arr=range('a','z');
do{
    echo current($arr).'---'.key($arr).'<br/>';
}while ( next($arr)!=null );
echo'<hr>';
//list
$arr=['admin','123456','23'];
list($user,$pwd,$age)=$arr;
var_dump($arr);
echo $user.'<br>';
echo $pwd.'<br>';
echo $age.'<br>';
echo'<hr>';

// each($arr);
// echo'<hr>';

$arr=['user'=>'admin','pwd'=>'1234'];
print_r(each($arr));
echo'<hr>';

//如何使用list 和each结合遍历数组
$arr=range('a','z');
//使用while循环
while (list($key,$value)=each($arr)) {
    echo $key.'------'.$value.'<br>';
}