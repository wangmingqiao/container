<!-- php的开始标签和结束标签 -->
<?php
// --注释风格
// php注释风格支持C C++ shell 
/*
我是C的注释
多行注释
*/
#我是shell注释

// 基本表达式（php一行完整的代码） 使用;结束
echo "Hello World !!";
// php的输出到页面 echo

//PHP使用变量的形式来承载数据
//php变量声明
//变量规则：1.可以使用_字母 数字 来命名
//2.不能以数字开头
//3.必须使用$修饰
//4.区分大小写                                     
$name = "php7";//name 可自行更改
echo $name;
echo "<br>";
var_dump($name);//string(4) "php7" 

echo "<br>";
$age=10;
var_dump($age);//int(10)

echo "<br>";
$sex=true;
var_dump($sex);//bool(true) 

echo "<br>";
$weight=90.11;
var_dump($weight);//float(90.11)

// 数据存储原理
// 计算机的内存大小
// KB:1024 byte(字节)
// MB：1024 kb
// GB：1024 mb
// TB：1024 gb
// PB：1024 tb

// 一个字节 byte=8 位
//8 bit = 00000000   2^8=255
// int 整形 4个字节 32位2^32=21亿
//64位系统整型最大的9E18 9*10^18

// 0=00000000 0*2^0
// 1=00000001 1*2^0
// 2=00000010 0*2^0+1*2^1
// 3=00000011 1*2^0+1*2^1
// 4=00000100 0*2^0+0*2^1+1*2^2
// 5=00000101 1*2^0+0*2^1+1*2^2
// 6=00000110 0*2^0+1*2^1+1*2^2
// 7=00000111 1*2^0+1*2^1+1*2^2
// 8=00001000 0*2^0+0*2^1+0*2^2+0*2^3
// 9=00001001 1*2^0+0*2^1+0*2^2+1*2^3
// 10=00001010 0*2^0+1*2^1+0*2^2+1*2^3

echo "<br>";
$int=125452;
var_dump($int);

?>
<!-- 如果不是混合代码（php+html）是纯的PHP 结束标签可以不写 -->