<?php
//字符串类型
//编码
//asc编码 英文
//gbk    gb2312 中文编码
//Unicode 支持所有语言
//utf-8

//一个字符串。使用“”或者是‘’修饰的字符就是字符串
// 代码的解析顺序是自上而下的

// $age="11";
$age='11';
var_dump($age);//string(2) "11" 

echo "<br>";

$age=11;
var_dump($age);//int(11)
echo "<br>";

// 字符串 单引号‘’  双引号“”
// 1.“”双引号具有解析变量的功能
$a="php";
$b="学习 $a";
var_dump($b);//string(10) "学习 php" 

echo "<br>";

$b='学习 $a';
var_dump($b);//string(9) "学习 $a

//2.想在输出内容中显示“”可以用‘’
$b='学习"php",真简单，马上成大神了';
echo "<br>";
echo $b;//学习"php",真简单，马上成大神了

//3.想在输出内容中显示‘’，可以用“”
$b="学习'php'，真简单，马上成大神了";
echo "<br>";
echo $b;//学习'php'，真简单，马上成大神了

//4.如何在“”中显示“”和一些特殊的符号$
//使用转义符号\(转义符号作用，让一些特殊符号变成普通字符)
$b="你好 \"php\"大神";
echo "<br>";
echo $b;//你好"php"大神

//5.字符串的拼接 使用.进行字符串的拼接
$name="xiao ming";
$age=10;
$sex="男";

// $msg="wojiao $name $age $sex";
$msg=$name.$age.$sex;

echo "<br>".$msg;
?>