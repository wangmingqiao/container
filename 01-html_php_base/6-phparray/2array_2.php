<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-28 14:30:37
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-28 14:57:41
 */
//二维数组
//数组的使用
//通过索引获取到值
echo "<pre>";
//$arr=array();
$arr=['a','b','c'];
$arr[0]='aa';
print_r($arr);

//删除数组数据
$arr[0]=null;//null只是置空
print_r($arr);
//使用unset 释放变量
//用过isset 检测变量是否存在
unset($arr[0]);
print_r($arr);

unset($arr);
print_r($arr);
//Notice:  Undefined variable: arr in D:\wampstack-5.6.19-0\apache2\htdocs\6-phparray\2array_2.php on line 26

//二维数组：数组里面有数组
$xiaom=['小明','22','12345614','郑州'];
$xiaow=['小王','23','12345624','郑州'];
$xiaoz=['小张','26','12345631','郑州'];
$xiaol=['小李','28','12345642','郑州'];
$students=compact('xiaom','xiaow','xiaoz','xiaol');

print_r($students);
echo "<hr>";
//取出小李的电话
$xiaol=$students['xiaol'];
echo $xiaol[2];
echo "<hr>";

//等效写法
print_r($students['xiaol'][2]);
echo "<hr>";

//修改 小张 到 北京
$students['xiaoz'][3]='北京';
print_r($students);

//just test
$arr[][][][][][]='juet test';
print_r($arr);







echo "</pre>";