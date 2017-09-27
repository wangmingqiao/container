<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-26 14:15:08
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-29 14:31:20
 */
// PHP的八大类型
// int
// int 4个字节 32位 2^32次方=42亿


// 二进制
// 00000001 1*2^0=1;
// 00000010 0*2^0+1*2^1=2;

// 十进制
// 1  1*10^0=1
// 2  2*10^0=2

// 八进制  8进制需要以0开头
// 01  1*8^0=1;
// 011 1*8^0+1*8^1=9;
echo 011;//9
echo "<br>";


//16进制 需要以0x开头
//1=0x1  1*16^0
//9=0x9
//10=0xa  10*16^0=10
//11=0xb
//12=0xc
//13=0xd
//14=0xe
//15=0xf
//16=0x10  0*16^0+1*16^1=16
echo 0xf;
echo "<br>";


// 练习
// 200
// 8进制 16进制
echo 0310;
echo "<br/>";
echo 0xc8;
echo "<br/>";

// 浮点
echo 1.1;
echo "<br/>";

var_dump(0xc8);
echo "<br/>";

var_dump(1.1);
echo "<br/>";

var_dump(1.1e300);
echo "<br/>";

// 浮点的最大值 1.8e308
// 浮点有两种表示法
// 1.10进制表示法
// 2.科学表示法
// 字母e和E  前面的数表示基数，后面表示10的幂
// [基数] E  [10的幂]=基数*10^幂数
echo 10e1;
echo "<br/>";

// 布尔
if (true) {
    echo "真";
}else{
    echo "假";
}
echo "<br/>";


if (false) {
    echo "真";
}else{
    echo "假";
}
echo "<br/>";

// string
echo"string";
echo "<br/>";
echo'string';
// Heredoc
echo "<br/>";

echo <<<ABC
我是内容,我光荣,哈哈哈!
随便写,想怎么写就怎么写。
ABC;
echo "<br/>";

// Nowdoc
echo <<<'ABC'
我是中间内容。
ABC;
echo "<br/>";


$a='hello';
echo "$a";//hello
echo '$a';//$a
echo "<br/>";

// 转义符号
echo "我 \n 学 \r 习 \n PHP \r";
echo "<br/>";

// 字符串链接 .不光可以连接字符还可以;链接整形,浮点,布尔

$a=<<<a
im is heredoc
a;
echo $a.'我是中文';
echo "<br/>";

$b=1;
echo $a.$b;
echo "<br/>";

$a='php';
//PHP引擎的处理方式：尽可能多的往后去取舍合法的字符，认为取舍的合法字符越多，变量的含义越明确
echo "{$a}bc";
echo "<br/>";

//{}可以修改字符串的单个字符

$a='php';
//查看字符
echo $a{0};//p
echo "<br/>";

echo $a{1};//h
echo "<br/>";

//改--只能替换一个字符，不能替换成中文
$a{0}='a';
echo "$a";
echo"<br>";
