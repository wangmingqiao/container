<?php

// header('content-type:text/html;charset=gb2312');
/**
 * @Author: WMQ
 * @Date:   2017-07-27 11:01:11
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-27 15:19:53
 */
$a=1;
echo -$a;
echo "<hr>";

$a=87;
$b=$a%7;
echo $b;
echo "<hr>";

// += -+ /= *= %=
$a += 5;
$a = $a + 5;


$b %= 7;
echo $b;
echo "<hr>";

// 00000001 = 1;
// <<左移 往高位
// 00000010 = 2
// >>右移 往低位

$a=1;
$b=$a<<2;
echo "$b";
echo "<hr>";

// 取反
$a=1;
$b=~$a;
echo $b;
echo "<hr>";

//&与
$a=3;//00000011
$b=2;//00000010
$c=$a&$b;
echo $c;
echo "<hr>";

//|或
$a=3;//00000011
$b=4;//00000100
$c=$a|$b;
echo $c;
echo "<hr>";

//^异或
$a=3;//00000011
$b=2;//00000010
$c=$a^$b;
echo $c;
echo "<hr>";

// 判断的事情，比较运算符
$a='1';
$b=1;
if ($a==$b) {
    echo "相等";
}


// 类型和数值都相等
if ($a===$b) {
    echo"全等";
}
echo "<hr>";

$a='a';
$b='b';
//比较的asc码 a:65 b:66
if ($a>$b) {
    echo"成立";
}else{
    echo "不成立";
}
echo "<hr>";

//不等
$a=1;
$b=2;
if ($a<>$b) {
    echo "a和b不相等";
}

//错误控制
//@抑制报错
$a=array();

@$b=$a['a'];

if (@$a['a']) {

}

// 执行运算符
echo `ipconfig`;
// 通过函数的方式执行命令
shell_exec('ipconfig');

//自增，自减
echo"<hr>";
$a=0;
$a++;//自己增加1
 $a--;//自己减1
echo $a;

echo"<hr>";
// 前置,直接+1
$b=10;
echo ++$b;//11

echo"<hr>";
// 后置，执行完语句在+1
$b=10;
echo $b++;//10
echo"<hr>";
echo $b;

// 逻辑运算符
// and && 逻辑与
// or ||  逻辑或
// xor    逻辑异或
// not !  逻辑非

echo"<hr>";
var_dump(true and true);//true
var_dump(false and true);//false
var_dump(true && false);//false
var_dump(false && true);//false

echo"<hr>";
var_dump(true or true);//true
var_dump(true or false);//true
var_dump(false or false);//false

echo"<hr>";
var_dump(true xor true);//false
var_dump(true xor false);//true
var_dump(false xor false);//false

echo "<hr>";
var_dump(!true);//false
var_dump(!false);//true

// 字符串l链接符号
echo"<hr>";
$a='我是一个字符串';
$b=10;
$c=$a.$b;
echo $c;

//164和165等效
$c .='我是又追加的字符串';
$c=$c.'我是又追加的字符串';
echo $c;