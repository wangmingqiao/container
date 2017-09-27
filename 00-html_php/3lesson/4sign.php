<?php
//算术运算符
// + - * / %
$a=23;
$b=34;
$c=$a*$b;

//取模
$a=23;
$b=3;
$c=$a%$b;

echo $c;//2
echo "<br>";
//赋值运算符=;+=;.=
$a=10;
$a+=10;//等价于$a=$a+10;+=;-=;*=;/=
echo $a;//20
echo "<br>";

$c='hello';
$c.="php";//等价于$c=$c."php";
echo $c;//hellophp;
echo "<br>";

//比较运算符 > < >= ==
$a=10;
$b=9;
$c=$a>$b;
var_dump($c);//true
echo "<br>";

if ($a>$b) {
	echo "a值大";
}
echo "<br>";

//==等于如果类型转换后a等于b就是真
$a='1';
$b=1;
if ($a==$b) {
	
	echo "a和b值相等";
}
echo "<br>";

//===全等 如果$a等于$b并且，类型相等
$a='1';
$b=1;
if ($a===$b) {
	echo "a和b值相等";
}

echo "<hr>";
//4.递增 递减
//++ 递增
$a=1;
$a++;
echo $a;

$a=10;
//前置++$a; 先+1 在执行语句
echo "<br>前置".++$a;//

//后置 $a++; 先执行语句，在+1
echo "<br>后置".$a++;//
echo $a;

//--递减
$b=10;
echo "<br>后置".$b--;//10
echo "<br>前置".--$b;//8
echo "<br>";
//练习：
$a=6;
$b=7;
$c=$a++ + $a++;//a=7
$c=$a++ + ++$a;//a=10
$c=$a++ + ++$b;//a=10 b=8
$c=$a++ + $b++;//a=11 b=8
echo $c.'<br>';//19
echo $a.'<br>';//12
echo $b;//9
echo "<br>";
echo "<hr>";
//5.逻辑运算符 与（and &&） 或（or ||） 非（not ！）
$a=true;
if (!$a) {
	echo "取反的结果";
}else{
	echo "false";
}

//与 and 两个条件同时满足，整个逻辑条件才满足 一假必假
$a=true;
$b=false;

if($a && $b){
	echo "<br>a 和 b 都为true";
}

//或 or 两个条件只要满足一个，整个逻辑才满足 一真必真
if($a||$b){
	echo "<br>a 或者 b有一个条件满足";
}

echo "<br>";
//登陆例子
//------正确的数据库中的
$user='admin';
$pwd='123456';
//------用户输入的
$userInput='';
$pwdInput='';

// 登陆逻辑
if($userInput==$user && $pwdInput==$pwd){
	echo "登陆成功";
}else{
	echo "登录失败";
}
//完整的
echo "<br>";
if ($user==$userInput) {
	//用户已经存在
	if($pwd==$pwdInput){
		echo "登录成功";
	}else{
		echo "密码错误";
	}
}else{
	echo "用户不存在";
}

// 练习：根据不同的分数区间，给考试成绩评级
//0-59 学渣
//60-70 及格
//70-80 中等
//80-90 良好
// 90-100 学霸

//写一个逻辑根据用户输入的不同分数，给他返回不同评级

// if (condition) {
// 	# code...
// }else{
// 	# code...
// }

// $inputSource='';
?>