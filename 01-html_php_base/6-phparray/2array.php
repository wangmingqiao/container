<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-28 11:01:27
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-28 11:58:29
 */
//下标为自动填充的数字---->索引数组
$arr=array('a','b','c','d');

$a='a';
$b='b';
$c='c';
$d='d';
$arr=array($a,$b,$c,$d);
//输出数组echo只能输出字符串
print_r($arr);

// 自定义索引的关联数组
$arr=array('a'=>'a','b'=>'b','c'=>'c','d'=>'d');
echo "<hr>";
print_r($arr);
echo "<hr>";
//通过索引,查找,修改
$arr=array('a','b','c','d');
$arr[3]='o';//通过索引赋值，新值会覆盖旧值
$d=$arr[3];
echo $d;
echo "<hr>";


$arr=array('a'=>'a','b'=>'b','c'=>'c','d'=>'d');
$arr['d']='o';
$d=$arr['d'];
echo $d;
//混合数组,一半索引数字，一半索引字母
//数组的本质 key-value
$arr=array('a','b','c','d'=>'d','e'=>'e','f'=>'f');
echo "<hr>";
print_r($arr);


echo "<hr>";
$arr=[];
//动态创建
$arr[]='a';
$arr[]='b';
$arr[]='c';
$arr[]='d';
print_r($arr);
echo "<hr>";

//手动制定索引
$arr[20]='f';
$arr[-10]='g';
$arr['a']='h';
print_r($arr);
echo "<hr>";

//动态创建一个关联数组
//动态创建一个混合数组

$arr=[];
$arr['a']='a';
$arr['b']='b';
$arr['c']='c';
$arr['d']='d';
$arr['e']='e';
$arr['f']='f';
print_r($arr);

echo "<hr>";
$arr=[];
$arr[]='a';
$arr[]='b';
$arr[]='c';
$arr[]='d';
$arr['a']='e';
$arr['b']='f';
print_r($arr);