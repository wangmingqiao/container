<?php
//循环结构
//只要while表达式的值为true 会循环执行{}内的语句；
//没有办法结束的循环交死循环；

$a=0;
while ($a<=10) {
	$a++;
	echo "<br>第".$a."次循环";	
}
echo "<hr>";

//输出0-10 偶数 使用while
$a=0;
while ($a<=10) {
	echo "<br>--$a";	
	$a+=2;
}
echo "<hr>";

$a=10;
while ( $a>=0) {
	echo "<br>---$a";
	$a-=2;
}
echo "<hr>";

$a=0;
while ($a<= 10) {
	if ($a%2==0) {
		echo "<br>----$a";
	}
	$a+=2;
}
echo "<hr>";

$a=0;
$sum=0;
while ( $a<= 10) {
	if ($a%2==0) {
		$sum+=$a;
		$a=$a+2;
	}
}
echo "<br>------$sum";
echo "<hr>";


?>