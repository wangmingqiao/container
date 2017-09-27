<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-26 10:05:53
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-26 10:50:31
 */
$aBoy;
// $1Boy;不行
// $@Boy;不行
// $this; 关键字不行
$_a_boy;

// $帅哥='我是帅哥';
// echo $帅哥;

$a;
$a=1;
$a=$b=$c=1;
echo $a,$b,$c;//,同时输出多个

// 错误
// echo $abc;
// 未定义错误
// Undefined(没有定义)
// variable(变量)
// Notice: Undefined variable: abc in D:\wampstack-5.6.19-0\apache2\htdocs\4-PHPBase\1var.php on line 23

// 解析错误：原因代码语法错误
// 1.没写;
// 2.少小();
// 3.少{};
//Parse error: syntax(语法) error, unexpected '$a' (T_VARIABLE) in D:\wampstack-5.6.19-0\apache2\htdocs\4-PHPBase\1var.php on line 18


// 可变变量
$a='b';
$b='c';
$c='d';
echo $$$a;//$c d
// ${$a}=$b;
// ${${$a}}=$c;


$a='hello';
$hello='你好';
$world='世界';
$$a='你不好';
echo $hello;//你不好

// 取地址符号&
$a='hello';
$b=&$a;
$c=&$a;
$d=&$a;
$d='你好';
echo $a;//你好

$a='hello';
$b=$a;
$b='你好';
echo $a;//你好

function test(&$var){
    $var='hello';
}
$a='你好';
test($a);
echo $a;//hello